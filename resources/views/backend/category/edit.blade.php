@extends('backend.master')

@section('title', 'Edit Category')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <h1 class="text-center mt-5 mb-3">Edit Category</h1>

                <form action="{{route('update.category', $categories->id)}}" method="POST">

                    @csrf

                    @if (Session::get('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{Session::get('message')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif

                    <div class="mb-3">
                      <label class="form-label">Name</label>
                      <input type="text" class="form-control" name="name" value="{{$categories->name}}">
                    </div>
            
                    <button type="submit" class="btn btn-primary">Update Category</button>
                  </form>
            </div>
        </div>
    </div>
@endsection
