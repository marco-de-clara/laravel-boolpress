@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="mt-3 mb-3">Posts</h1>
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                        New Post
                    </a>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Actions</th>
                            <th>Tags</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @forelse ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->slug }}</td>
                                    <td>{{ $post->category->name ?? '-' }}</td>
                                    <td>
                                        @forelse ($post->tags as $tag)
                                            {{ $tag->name }}{{ $loop->last ? '' : ', '}}
                                        @empty
                                            -
                                        @endforelse
                                    </td>
                                    <td>
                                        <a class="btn btn-small btn-info" href="{{ route('admin.posts.show', ['post' => $post->id]) }}">Details</a>
                                        <a class="btn btn-small btn-warning" href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">Edit</a>
                                    <form class="d-inline" action="{{ route('admin.posts.destroy',['post' => $post->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-small btn-danger" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        No content available
                                    </td>
                                </tr>
                            @endforelse
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection