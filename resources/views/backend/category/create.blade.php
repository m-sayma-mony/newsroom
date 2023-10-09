@extends('backend.master')

@section('title', 'Add Category')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <h1 class="text-center mt-5 mb-3">Add Category</h1>

                <form action="{{route('store.category')}}" method="POST">

                    @csrf

                    @if (Session::get('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{Session::get('message')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif

                    <div class="mb-3">
                      <label class="form-label">Name</label>
                      <input type="text" class="form-control" name="name">
                    </div>
            
                    <button type="submit" class="btn btn-primary">Add Category</button>
                  </form>
            </div>
        </div>
    </div>
@endsection
