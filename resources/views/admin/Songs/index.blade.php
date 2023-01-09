@extends('layouts.app')

@section('content')
<section>
    <div class="row justify-content-center">
        <div class="col-md-6">
         @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Add Song Information</h4>
                  </div>
                <div class="card-body">
                   <form action="{{ url('add-song') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                             <label for="">Title</label>
                             <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group mb-3 text-center">
                            <button type="submit" class="btn btn-primary">Add Song List</button>
                        </div>
                      </form>
                 </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
        <div class="card">
             <div class="card-header">
                    <h4 class="text-center">Song Information Details</h4>
                </div>
                <div class="card-body">
                 <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Action Button</th>
                                <th>Action Button</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($song as $item)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td><img src="{{ asset('public/uploads/images/'.$item->image)}}" width="70px" height="70px" alt="Image"></td>
                                <td>{{ $item->title}}</td>
                                <td>
                                   <a href="{{url('edit-song/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                                 <td>
                                    {{-- <a href="{{ url('delete-song/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
                                    <form action="{{ url('delete-song/'.$item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                    </table>
                 </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection