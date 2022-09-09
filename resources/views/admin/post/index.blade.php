@extends('layouts.master')

@section('title','View Posts')

@section('content')

<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
                <h4>View Posts<a href="{{url('admin/add-post')}}" class="btn btn-primary float-end">Add Posts</a></h4>
        </div>
    <div class="card-body">

        @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif
    
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Post Name</th>
                {{-- <th>Category</th> --}}
                <th>State</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($posts as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                {{-- <td>{{ $item->category->name }}</td> --}}
                <td>{{ $item->status == '1' ? 'Hidden':'Shown'}}</td>
                <td>
                    <a href="{{ url('admin/post/'.$item->id) }}" class="btn btn-success">Edit</a>
                </td>
                <td>
                    <a href="{{ url('admin/delete-category/'.$item->id) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
        
    </div>
    </div>
</div>
@endsection