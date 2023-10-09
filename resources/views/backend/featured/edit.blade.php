@extends('backend.master')

@section('title', 'Edit Featured')

@section('content')
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-8 offset-2">
                <h1 class="text-center mt-5 mb-3">Edit Featured</h1>

                <form action="{{route('update.featured', $features->id)}}" method="POST" enctype="multipart/form-data">

                    @csrf

                    @if (Session::get('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{Session::get('message')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif

                    <div class="mb-3">
                      <label class="form-label">Title</label>
                      <input type="text" class="form-control" name="title" value="{{$features->title}}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-control" name="category_id">
                            <option selected disabled>Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                      </div>

                      <div class="mb-3">
                        <label class="form-label">Date/Time</label>
                        <input type="text" class="form-control" name="date" value="{{$features->date}}">
                      </div>

                      <div class="mb-3">
                        <label class="form-label">Image</label><br>
                        <img src="{{asset('/')}}{{$features->image}}" alt="" width="50" class="mb-2">
                        <input type="file" class="form-control" name="image">
                      </div>
            
                    <button type="submit" class="btn btn-primary">Add Featured</button>
                  </form>
            </div>
        </div>
    </div>
@endsection
