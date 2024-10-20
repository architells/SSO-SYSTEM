@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>{{ __('Total Time Rendered This Month') }}</h3>
                    <p><strong>{{ $totalHours }} hours, {{ $totalMinutes }} minutes, {{ $totalSeconds }} seconds</strong></p>

                    <h4>{{ __('Time Entries for the Month') }}</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Total Duration</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($entries as $entry)
                                <tr>
                                    <td>{{ $entry->start_time }}</td>
                                    <td>{{ $entry->end_time ?? 'In Progress' }}</td>
                                    <td>
                                        @if($entry->end_time)
                                            @php
                                                $start = \Carbon\Carbon::parse($entry->start_time);
                                                $end = \Carbon\Carbon::parse($entry->end_time);
                                                $durationInSeconds = $start->diffInSeconds($end);
                                                $hours = floor($durationInSeconds / 3600);
                                                $minutes = floor(($durationInSeconds % 3600) / 60);
                                                $seconds = $durationInSeconds % 60;
                                            @endphp
                                            {{ $hours }} hours, {{ $minutes }} minutes, {{ $seconds }} seconds
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $entry->description }}</td>
                                    <td>
                                        <form action="{{ route('delete.entry', $entry->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        <form action="{{ route('start.timer') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Start Timer</button>
                        </form>

                        <form action="{{ route('stop.timer') }}" method="POST" class="mt-2">
                            @csrf
                            <button type="submit" class="btn btn-danger">Stop Timer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Login and Register Buttons for unauthenticated users -->
    @if (!Auth::check())
        <div class="row justify-content-center mt-4">
            <div class="col-md-8 text-center">
                <h5>{{ __('Please log in or register to track your time.') }}</h5>
                <a href="{{ route('login') }}" class="btn btn-secondary">{{ __('Log In') }}</a>
                <a href="{{ route('register') }}" class="btn btn-success">{{ __('Register') }}</a>
            </div>
        </div>
    @endif
</div>
@endsection
