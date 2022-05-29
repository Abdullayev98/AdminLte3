@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Edit Post</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Blank Page</li>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>

    {{-- Main sidebar --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary ">
                        <div class="card-header">
                        <h3 class="card-title">Post "{{$post->title}}"</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{route('posts.update',['post' => $post->id])}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="name" name="title" value="{{$post->title}}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description" rows="5"> {{$post->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea class="form-control" name="content" id="content" rows="7">{{$post->content}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        @foreach ($categories as $k => $v )
                                            <option value="{{$k}}" @if($k == $post->category_id) selected @endif>{{$v}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tags">Tags</label>
                                    <select class="select2" multiple="multiple" name="tags[]" id="tags" data-placeholder="Select a State" style="width: 100%;">
                                        @foreach ($tags as $k => $v )
                                            <option value="{{$k}}" @if (in_array($k, $post->tags->pluck('id')->all())) selected @endif>{{$v}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                <div class="form-group">
                                    <label for="thumbnail">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                        <input type="file" name="thumbnail" class="custom-file-input" id="thumbnail">
                                        <label class="custom-file-label" for="thumbnail">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div><img src="{{$post->getImage()}}" class="img-thumbnail mt-2" width="200" alt=""></div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection 
