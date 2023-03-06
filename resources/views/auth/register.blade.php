@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column align-items-center">
        <h2>Register</h2>
        <form action="{{ route('register') }}" class="mt-4 w-75" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label ">name</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter your name" value="{{ old('name') }}">

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label ">email</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" value="{{ old('email') }}">

                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input type="password" id="password" name="password" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your password" >

                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Re-enter your password">
            </div>
            <div class="mb-3">
                <input type="submit" name="sign_up" value="sign up" class="btn btn-dark w-100">
            </div>
        </form>
    </div>
@endsection