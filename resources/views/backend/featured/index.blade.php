@extends('backend.master')

@section('title', 'Manage Featured')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mt-5 mb-5">Manage Featured</h1>

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
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Date/Time</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($features as $feature)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$feature->id}}</td>
                                <td>{{$feature->title}}</td>
                                <td>{{$feature->category->name}}</td>
                                <td>{{$feature->date}}</td>
                                <td>
                                    <img src="{{asset('/')}}{{$feature->image}}" alt="" width="50">
                                </td>
                                <td>{{$feature->status== 1 ? 'Active' : 'Inactive'}}</td>
                                <td>
                                    <a href="{{route('edit.featured', $feature->id)}}" class="btn">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('destroy.featured', $feature->id)}}" class="btn">
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