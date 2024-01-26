@extends('layouts.adminLayout')

@section("content")

@section('title',"Add")



<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add</h3>
    </div>

    <form action="{{ route('About.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Text</label>
                <textarea name="text" class="form-control @error('text') is-invalid @enderror" id="exampleInputPassword1" placeholder=""></textarea>
                @error('text')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Experince Years</label>
                <input name="number" class="form-control @error('number') is-invalid @enderror" id="exampleInputPassword1" placeholder="">
                @error('number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

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

{{--
  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif --}}

@endsection
