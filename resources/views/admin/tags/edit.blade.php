@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Update Tag</h1>
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
                        <h3 class="card-title">Tag "{{$tag->title}}"</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="Post" action="{{route('tags.update',['tag'=>$tag->id])}}">
                            @csrf
                            @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="name" name="title" value="{{$tag->title}}">
                            </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection 
