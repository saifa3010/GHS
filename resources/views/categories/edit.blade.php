@extends('layouts.adminLayout')

@section("content")

@section('title',"Edit Categories")



<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Categories</h3>
    </div>

    <form action="{{ route('categories.update',$category->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name"  value="{{$category->name}}" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Categories name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="form-group">
                <label for="service_id">Service:</label>
                <select id="service_id" name="service_id" class="@error('name') is-invalid @enderror">
                    <option value="" selected disabled>Select Service</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>

                @error('service_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <label style="display: block" for="image">Current Image :</label>
            <img src="/images/{{$category->image}}" width="150px">
            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" >

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
