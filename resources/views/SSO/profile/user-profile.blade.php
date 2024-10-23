@extends('SSO.layouts.header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Edit Name and Email Section -->
            <div class="card shadow-sm mt-4">
                <div class="card-body">
                    <form method="POST" action="#">
                        @csrf
                        @method('PUT')
                        <!-- Name Field -->
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control rounded border-gray-300" id="name" name="name" placeholder="Enter your name" value="">
                        </div>
                        <!-- Email Field -->
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control rounded border-gray-300" id="email" name="email" placeholder="Enter your email" value="">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Update</button>
                    </form>
                </div>
            </div>

            <!-- Update Password Section -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <form method="POST" action="#">
                        @csrf
                        @method('PUT')
                        <!-- Password Field -->
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" class="form-control rounded border-gray-300" id="password" name="password" placeholder="Enter new password">
                        </div>
                        <!-- Confirm Password Field -->
                        <div class="form-group mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control rounded border-gray-300" id="password_confirmation" name="password_confirmation" placeholder="Confirm new password">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Update Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection