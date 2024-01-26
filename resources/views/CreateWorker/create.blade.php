@extends('layouts.adminLayout')

@section("content")

@section('title',"Add Workers")




<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add</h3>
    </div>

    <form method="post" action="{{ url('CreateWorker/store') }}">
        @csrf

        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter service name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputPassword1" placeholder="Email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputFile">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="password" name='password_confirmation' class="form-control" placeholder="Retype password">

              </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create worker</button>
        </div>
    </form>

  </div>
@endsection
