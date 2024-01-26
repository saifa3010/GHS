@extends('layouts.adminLayout')

@section("content")

@section('title',"Edit services")



<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add services</h3>
    </div>

    <form action="{{ route('Profile_worker.update', ['Profile_worker' => $worker->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card-body">



        <div class="form-group">
            <label for="exampleInputEmail1">First name</label>
            <input type="text" name="firstName" value="{{ $worker->firstName }}" class="form-control @error('firstName') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
            @error('firstName')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="form-group">
            <label for="exampleInputEmail1">Last name</label>
            <input type="text" name="lastName" value="{{ $worker->lastName }}" class="form-control @error('lastName') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
            @error('lastName')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input type="text" name="phone_number" value="{{ $worker->phone_number }}" class="form-control @error('phone_number') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
            @error('phone_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>



            <div class="form-group">
                <label for="city">City:</label>
                <select id="city" name="city" class="@error('city') is-invalid @enderror form-control custom-select">
                    <option value="" disabled selected>{{ $worker->city }}</option>
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
                <textarea type="text" name="description" class="form-control
                @error('description') is-invalid @enderror" id="exampleInputEmail1" placeholder="">{{ $worker->description }}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="form-group">
                <label for="exampleInputEmail1">Profession</label>
                <input type="text" name="profession" value="{{ $worker->profession }}" class="form-control @error('profession') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                @error('profession')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="form-group">
                <label for="exampleInputEmail1">Skills & experience</label>
                <textarea type="text" name="skillsExperience" class="form-control
                @error('skillsExperience') is-invalid @enderror" id="exampleInputEmail1" placeholder="">{{ $worker->skillsExperience }}</textarea>
                @error('skillsExperience')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">About worker</label>
                <textarea type="text" name="aboutMe" class="form-control @error('aboutMe') is-invalid
                @enderror" id="exampleInputEmail1" placeholder="">{{ $worker->aboutMe }}</textarea>
                @error('aboutMe')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input type="number" name="price" value="{{ $worker->price }}" class="form-control @error('price') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Min Hour</label>
                <input type="number" name="minHour" value="{{ $worker->minHour }}" class="form-control @error('minHour') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                @error('minHour')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

    <label style="display: block" for="image">Current Image :</label>
    <img src="/images/{{$worker->image}}" width="150px">
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
            <div class="mb-3">
                <label for="work_images" class="form-label">Current Image :</label>
                <div class="row">
                    @if (!empty($worker->work_image))
                        @foreach (json_decode($worker->work_image) as $image)
                            <div class="col-md-3 mb-3">
                                <img src="{{ asset('images/' . $image) }}" alt="Work Image" width="150px" class="img-fluid">
                            </div>
                        @endforeach
                    @else
                        <p>No work images available.</p>
                    @endif
                </div>
            </div>

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


    </form>

  </div>



@endsection
