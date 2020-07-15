@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->content }}</p>
            @if ($post->category)
                <p>Category:
                    <a href="{{ route('categories.show', ['slug' => $post->category->slug]) }}">
                        {{ $post->category->name }}
                    </a>
                </p>
            @endif
        </div>
    </div>
</div>
@endsection