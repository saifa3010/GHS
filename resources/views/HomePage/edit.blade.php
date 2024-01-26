@extends('layouts.adminLayout')

@section("content")

@section('title',"Edit")



<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add</h3>
    </div>

    <form action="{{route('HomePage.update',$HomePage->id)}}" method="post" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" name="title" value="{{$HomePage->title}}" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter service title">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">

                <label for="exampleInputPassword1">Text</label>
                <textarea name="text" class="form-control @error('text') is-invalid @enderror"
                     id="exampleInputPassword1" placeholder="text">{{$HomePage->text}}</textarea>
                @error('text')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>



            <label style="display: block" for="image">Current Image :</label>
            <img src="/images/{{$HomePage->image}}" width="150px">

            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                    <input type="file" value="/images/{{$HomePage->image}}" class="form-control @error('image') is-invalid @enderror" name="image" >

                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <label style="display: block" for="image">Current logo :</label>
            <img src="/images/{{$HomePage->logo}}" width="150px">

            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                    <input type="file" value="/images/{{$HomePage->logo}}" class="form-control @error('logo') is-invalid @enderror" name="logo" >

                @error('logo')
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
