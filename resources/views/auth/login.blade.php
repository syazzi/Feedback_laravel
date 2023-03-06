@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column align-items-center">
    <h2>Login</h2>
    @if (session('status'))
    <div class="text-danger">
        {{ session('status') }}
    </div>
    @endif
    <form action="{{ route('login') }}" class="mt-4 w-75" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email">

            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">password</label>
            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password">

            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>

            @enderror
        </div>
        <div class="mb-3">
            <a href="{{ route('register') }}" class="">Register Now</a>
        </div>
        <div class="mb-3">
            <input type="submit" name="sign_in" value="sign in" class="btn btn-dark w-100">
        </div>
    </form>
</div>
@endsection