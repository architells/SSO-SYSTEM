@extends('layouts.main-page') <!-- Change this line to match your new layout -->

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;"> <!-- Center content vertically -->
        <!-- Card 1 -->
        <div class="col-10 col-sm-6 col-md-4 mb-4"> <!-- Adjusted width for responsiveness -->
            <div class="card text-center rounded-3 shadow" style="border: 1px solid #dee2e6; height: 300px;"> <!-- Fixed height for box effect -->
                <div class="card-body d-flex flex-column justify-content-between"> <!-- Flexbox to center content vertically -->
                    <h5 class="card-title">SSO</h5>
                    <p class="card-text">This is a simple card with some text.</p>
                    <a href="{{ route('sso-login-page') }}" class="btn btn-primary mt-auto">Go somewhere</a> <!-- Push button to the bottom -->
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-10 col-sm-6 col-md-4 mb-4"> <!-- Adjusted width for responsiveness -->
            <div class="card text-center rounded-3 shadow" style="border: 1px solid #dee2e6; height: 300px;"> <!-- Fixed height for box effect -->
                <div class="card-body d-flex flex-column justify-content-between"> <!-- Flexbox to center content vertically -->
                    <h5 class="card-title">Card 2</h5>
                    <p class="card-text">This is another simple card with different text.</p>
                    <a href="#" class="btn btn-primary mt-auto">Go somewhere</a> <!-- Push button to the bottom -->
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-10 col-sm-6 col-md-4 mb-4"> <!-- Adjusted width for responsiveness -->
            <div class="card text-center rounded-3 shadow" style="border: 1px solid #dee2e6; height: 300px;"> <!-- Fixed height for box effect -->
                <div class="card-body d-flex flex-column justify-content-between"> <!-- Flexbox to center content vertically -->
                    <h5 class="card-title">Card 3</h5>
                    <p class="card-text">This card contains more text and information.</p>
                    <a href="#" class="btn btn-primary mt-auto">Go somewhere</a> <!-- Push button to the bottom -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection