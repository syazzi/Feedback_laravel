@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column align-items-center">
    <img src="{{ asset('img/logo.png') }}" alt="" class="w-25 mb-3">
    <h2>welcome @auth {{ auth()->user()->name }} @endauth @guest guest @endguest,</h2>
    @auth
    <form action="{{ route('posts') }}" class="mt-4 w-75" method="POST">
        @csrf
        <div class="mb-3">
            <label for="body" class="form-label">Feedback</label>
            <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" placeholder="Enter your feedback"></textarea>

            @error('body')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <input type="submit" value="Send" class="btn btn-dark w-100" id="feedback_submit">
        </div>
    </form>
    @endauth

    <div class="mt-3">
        <h1>Past Feedbacks</h1>
        <div class="bg-light px-3 border border-dark rounded">

            @if ($posts->count())
            @foreach ($posts as $post)
            <div class="d-flex  w-100">
                <div class="">
                    <span class="text-dark"><strong>{{ $post->user->name }}</strong></span><span class="p-1 text-muted"> {{ $post->created_at->diffForHumans() }}</span>

                    <p class="mt-4">{{ $post->body }}</p>
                </div>

                @can('delete', $post)
                <div class="ms-auto align-self-center">
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
                @endcan

            </div>
            @endforeach

            @else
            <p>no post</p>
            @endif

        </div>
    </div>
</div>


@endsection