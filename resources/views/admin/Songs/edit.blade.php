@extends('layouts.app')

@section('content')
   <div class="">
        <div class="row">
            <div class="col-lg-6 m-auto">
              @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
               @endif
              <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Edit Song Information
                        <a href="{{ url('/song') }}" class="btn btn-success float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                   <form action="{{ url('update-song/'.$song->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ asset('public/uploads/images/'.$song->image) }}" width="70px" height="70px" alt="Image">
                        </div>
                       <div class="form-group mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" value="{{$song->title}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update Song List</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection