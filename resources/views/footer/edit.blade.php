@extends('layouts.adminLayout')

@section("content")

@section('title',"Edit")



<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add</h3>
    </div>

    <form action="{{route('footer.update',$footer->id)}}" method="post" enctype="multipart/form-data">


        @csrf
        @method('PUT')

        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Company email</label>
                <input type="text" name="email_company" value="{{$footer->email_company}}" class="form-control @error('email_company') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                @error('email_company')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Company location</label>
                    <input type="text" name="location_company" value="{{$footer->location_company}}" class="form-control @error('location_company') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                    @error('location_company')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Text</label>
                <textarea name="text"   class="form-control @error('text') is-invalid @enderror" id="exampleInputPassword1" placeholder="">{{$footer->text}}</textarea>
                @error('text')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="form-group">
                <label for="exampleInputPassword1">Company phone</label>
                <input name="phone_company" value="{{$footer->phone_company}}" type="text" class="form-control @error('phone_company') is-invalid @enderror" id="exampleInputPassword1" placeholder="">
                @error('phone_company')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Copy right</label>
                <input name="copy_right" value="{{$footer->copy_right}}" type="text" class="form-control @error('copy_right') is-invalid @enderror" id="exampleInputPassword1" placeholder="">
                @error('copy_right')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>



            <label style="display: block" for="image">Current Image :</label>
            <img src="/images/{{$footer->image}}" width="150px">

            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                    <input type="file" value="/images/{{$footer->image}}" class="form-control @error('image') is-invalid @enderror" name="image" >

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
