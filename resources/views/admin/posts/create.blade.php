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
                        <input type="string" name="title" class="form-control" id="title" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea type="text" name="content" class="form-control" id="content" placeholder="Content"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>   
                 
            </div>
        </div>
    </div>
@endsection