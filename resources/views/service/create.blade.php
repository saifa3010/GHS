@extends('layouts.adminLayout')

@section("content")

@section('title',"Add services")



<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add services</h3>
    </div>

    <form action="{{ route('service.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter service name" value="{{ old('name') }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="exampleInputPassword1" placeholder="Description">{{ old('description') }}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>


  </div>



@endsection
