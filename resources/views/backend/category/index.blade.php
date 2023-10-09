@extends('backend.master')

@section('title', 'Manage Category')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <h1 class="text-center mt-5 mb-5">Manage Category</h1>

                    @if (Session::get('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{Session::get('message')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                <table class="table mt-3">
                    <thead>
                      <tr>
                        <th scope="col">SL</th>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>
                                    <a href="{{route('edit.category', $category->id)}}" class="btn">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('destroy.category', $category->id)}}" class="btn">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection