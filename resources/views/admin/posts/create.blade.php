@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center">
                    <h1 class="mt-3 mb-3">Posts</h1>
                </div>

                <form action="{{ route('admin.posts.store') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="string" name="title" class="form-control" id="title" placeholder="Title" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea type="text" name="content" class="form-control" id="content" placeholder="Content">{{ old('content') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Category:</label>
                        <select name="category_id" id="category" class="form-control">
                            <option value="">Select a category</option>
                            @foreach ($categories as $category)
                                <option 
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}
                                    value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        Tag:
                        @foreach ($tags as $tag)
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input
                                        {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}
                                        class="form-check-input"
                                        name="tags[]"
                                        type="checkbox"
                                        value="{{ $tag->id }}">
                                    {{ $tag->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>   
                 
            </div>
        </div>
    </div>
@endsection