@extends('layouts.adminLayout')

@section("content")

@section('title',"Add")



<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add</h3>
    </div>

    <form action="{{ route('Profile_worker.store') }}" method="post" id="myForm" enctype="multipart/form-data">
        @csrf




        <div class="card-body">
            <div style="display: flex; flex-direction:row; flex-wrap: wrap; ">
                <div class="form-group">
                    <label for="user_id">Usera:</label>
                  <select id="user_id" name="user_id" class="@error('user_id') is-invalid @enderror form-control custom-select">
                    <option value="" selected disabled>Select worker</option>
                    @foreach($users as $item)
                            <option value="{{ $item->id }}">{{ $item->email }}</option>
                    @endforeach
                 </select>

                    @error('item_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>





                <div class="form-group" style="margin-left:100px">
                    <label for="category_id">Categories:</label>
                    <select  id="category_id" name="category_id" class="@error('category_id') is-invalid @enderror form-control custom-select">
                        <option value="" selected disabled>Select category</option>

                        @foreach($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach

                    </select>

                    @error('item_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>



            <div class="form-group">
                <label for="exampleInputEmail1">First name</label>
                <input type="text" name="firstName" class="form-control @error('firstName') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                @error('firstName')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="form-group">
                <label for="exampleInputEmail1">Last name</label>
                <input type="text" name="lastName" class="form-control @error('lastName') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                @error('lastName')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Phone</label>
                <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>



                <div class="form-group">
                    <label for="city">City:</label>
                    <select id="city" name="city" class="@error('city') is-invalid @enderror form-control custom-select">
                        <option value="" disabled selected>Select City</option>
                        <option value="Irbid">Irbid</option>
                        <option value="Amman">Amman</option>
                        <option value="Aqaba">Aqaba</option>
                        <!-- Add more options if needed -->
                    </select>


                    @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="exampleInputEmail1" placeholder=""></textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="exampleInputEmail1">Profession</label>
                    <input type="text" name="profession" class="form-control @error('profession') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                    @error('profession')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="exampleInputEmail1">Skills & experience</label>
                    <textarea type="text" name="skillsExperience" class="form-control @error('skillsExperience') is-invalid @enderror" id="exampleInputEmail1" placeholder=""></textarea>
                    @error('skillsExperience')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">About worker</label>
                    <textarea type="text" name="aboutMe" class="form-control @error('aboutMe') is-invalid @enderror" id="exampleInputEmail1" placeholder=""></textarea>
                    @error('aboutMe')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Min Hour</label>
                    <input type="number" name="minHour" class="form-control @error('minHour') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                    @error('minHour')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


            <div class="form-group">
                <label for="exampleInputFile">Image worker</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" >

                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="form-group">
                <label for="exampleInputFile">Image task</label>
                    <input type="file" class="form-control @error('work_image') is-invalid @enderror" name="work_image[]"  multiple >

                @error('work_image')
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


