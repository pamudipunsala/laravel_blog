@extends('layouts.master')

@section('title','Add Posts')

@section('content')

<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4>Add Posts<a href="{{url('admin/add-post')}}" class="btn btn-primary float-end">View Posts</a></h4>
        </div>
        <div class="card-body">
            @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
            @endif

            <form action="{{url('admin/add-post')}}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="">Category</label>
                    <select name="category_id" class="form-control">
                        @foreach ($category as $citem)
                            <option value="{{ $citem->id }}">{{ $citem->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Post Name</label>
                    <input type="text" name="name" class="form-control" />
                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <input type="text" name="description" rows="5" class="form-control"/>
                </div>                

                <h6>SEO Tags</h6>
                <div class="mb-3">
                    <label>Youtube Iframe Link</label>
                    <input type="text" name="yt_iframe" class="form-control"/>
                </div>

                <div class="mb-3">
                    <label>Meta Title</label>
                    <input type="text" name="meta_title" class="form-control"/>
                </div>

                <div class="mb-3">
                    <label>Meta Description</label>
                    <textarea name="meta_description" rows="2" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label>Meta Keyword</label>
                    <textarea name="meta_keyword" rows="2" class="form-control"></textarea>
                </div>

                <h6>Status</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label>Status</label>
                            <input type="checkbox" name="status"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Save Category</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection