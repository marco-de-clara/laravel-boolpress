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
            <p>Tags:
                @forelse ($post->tags as $tag)
                    {{ $tag->name }}{{ $loop->last ? '.' : ', '}}
                @empty
                    -
                @endforelse
            </p>
        </div>
    </div>
</div>
@endsection