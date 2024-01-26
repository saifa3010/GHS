@extends('layouts.userPagesLayout')

@section("content")


<div class="container">
    <div class="py-5 text-center">

    </div>

    <div class="row">
      <div  class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Your Worker</span>
          <span class="badge badge-secondary badge-pill">3</span>
        </h4>
        <ul style="border-radius: 18px" class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div style="margin-left: 40%;">
              <h6 style="text-align: center;"><h6 style="text-align: center;">{{ $task->worker->category->name }}</h6>
            </h6>
              <img class="mt-1" style="width: 80px; border-radius: 50%;" src="{{asset('images/'. $task->worker->image)}}">
              <h6 style="text-align: center;">{{ $task->worker->firstName }} {{ $task->worker->lastName }} </h6>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <img class="mt-1" style="width:20px;" src="{{asset('images/calendar.png')}}">
              <h6 style="display: inline;" class="text-muted">{{ $task->date }} </h6>
            </div>
            <span class="text-muted">{{ \Carbon\Carbon::parse($task->time)->format('g:i A') }} - {{ \Carbon\Carbon::parse($task->end_time)->format('g:i A') }}
           </span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <div>
            <img class="mt-1" style="width: 20px" src="{{asset('images/shopping.png')}}">
            <h6 style="display: inline;">watch price (JD)</h6>
          </div>
            <strong>{{ $task->worker->price }}/hr</strong>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <div>
            <img class="mt-1" style="width: 20px" src="{{asset('images/shopping.png')}}">
            <h6 style="display: inline;">total</h6>
          </div>
            <strong><small>JD</small>{{ $task->total }}</strong>
          </li>
        </ul>

      </div>
      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Checkout</h4>
       <div  style="background-color: white; border: 1px solid rgb(191, 191, 191); border-radius: 18px; padding: 20px; margin: 10px;">
        <form class="needs-validation" action="{{ route('checkout.store') }}" method="post">
            @csrf

            <input type="hidden" name="task_id" value="{{ $task->id }}">

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">First name</label>
              <input type="text"  value="{{ old('firstName')}}" class="form-control" id="firstName"  name="firstName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Last name</label>
              <input type="text" class="form-control" id="lastName" value="{{ old('lastName')}}" name="lastName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>
          </div>


          <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" value="{{ old('email')}}" name="email" placeholder="you@example.com">
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>

          <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" value="{{ old('street_address')}}" name="street_address" placeholder="1234 Main St" required>
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>

          <div class="mb-3">
            <label for="address">Phone number</label>
            <input type="text" class="form-control" id="phone_number" value="{{ old('phone_number')}}" name="phone_number" placeholder="00 0000 0000" required>
            <div class="invalid-feedback">
              Please enter your Phone number
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 mb-3">
              <label for="state">City</label>
              <select class="custom-select d-block w-100" id="city" name='city' required>
                <option value="{{ old('city')}}"  value="">Choose...</option>
                <option>Irbid</option>
                <option>Amman</option>
                <option>Aqaba</option>
              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="zip">Zip</label>
              <input type="text" class="form-control" value="{{ old('zip')}}" id="zip" name="zip"  required>
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="zip">Postal code</label>
              <input type="text" class="form-control" id="postal_code" value="{{ old('postal_code')}}" name="postal_code" placeholder="" required>
              <div class="invalid-feedback">
                Postal code code required.
              </div>
            </div>
          </div>
          @if(session('error'))
          <script>
              Swal.fire({
                  title: "Oops...",
                  text: "{{ session('error') }}",
                  icon: "error",
                  timer: 5000, // Adjust the timer as needed
                  showConfirmButton: false
              });
          </script>
      @endif
          <hr class="mb-4">
          <button class="btn btn-primary" type="submit">Checkout</button>
        </form>
      </div>

      </div>
    </div>
  </div>


@endsection
