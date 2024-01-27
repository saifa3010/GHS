@extends('layouts.userPagesLayout')

@section('content')
<style>
    .star{
        margin-left: 40px

    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Check if the alert has been shown before
        if (!localStorage.getItem('alertShown')) {
            // Delay the appearance by two seconds
            setTimeout(function () {
                // Your SweetAlert script
                Swal.fire({
                    title: "Make sure that your city matches the worker's city",
                    showClass: {
                        popup: `
                            animate__animated
                            animate__fadeInUp
                            animate__faster
                        `
                    },
                    hideClass: {
                        popup: `
                            animate__animated
                            animate__fadeOutDown
                            animate__faster
                        `
                    }
                });

                // Mark the alert as shown in local storage
                localStorage.setItem('alertShown', true);
            }, 1000);
        }
    });
</script>

<div class="col-md-12" style="width: 300px; margin-top: 50px; margin-left: 950px; margin-bottom: -50px">
    <select name="city" id="cityFilter" class="time">
        <option value="">Choose city</option>
        <option value="Irbid">Irbid</option>
        <option value="Amman">Amman</option>
        <option value="Aqaba">Aqaba</option>
    </select>
</div>


<div class="container mt-5">
    <div class="row" id="workersContainer">
        @foreach ($workers as $worker)
            <div class="col-md-6 mb-4 cardp" data-city="{{ $worker->city }}">
                <div class="card" style="border-radius: 18px;padding:15px;height:500px">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img class="card-img" style="border-radius: 50%; padding:10px;width:150px;height:150px" src="{{ asset('images/' . $worker->image) }}" alt="Worker Image" >
                            <p style="margin:0;text-align:center;color:rgb(7, 155, 2)">{{$worker->status}}</p>
                            <div class="star"  style="display: inline" class="rating-container">
                                @for ($i = 1; $i <= round($averageRatings[$worker->id]); $i++)
                                    <label class="fa fa-star" title="{{ $i }} stars" style="color: #c59b08;"></label>
                                @endfor
                            </div>
                        </div>


                        <div class="col-md-8 px-3">
                            <div class="card-body ">
                                <h5 class="card-title">{{ $worker->firstName }} {{ $worker->lastName }} <span style="float: right" class="float-right"><small>JD</small>{{ $worker->price }}/hr</span></h5>
                                <p class="card-text">
                                    <strong>How I can help:</strong><br>
                                    <div style="background-color: rgb(236, 232, 232);padding:5px">
                                        {{ $worker->skillsExperience }}
                                    </div>
                                </p>
                                <div class="comment">
                                <div>
                                    <img class="imgC" style="border-radius:50%;width:30px;hight:30px" src="{{asset('images/user.png')}}" alt="Comment Image"/>
                                </div>
                                    <div class="commentD">
                                        @if($worker->comments->isNotEmpty())
                                            <p><span style="color: #176B87">{{ $worker->comments->first()->user->name }}</span> on {{ $worker->comments->first()->created_at->format('l, M j') }}</p>
                                            <p>"{{ $worker->comments->first()->body }}"</p>
                                        @else
                                            <p>No comments yet</p>
                                        @endif
                                    </div>
                                </div>
                                <a href="{{ route('worker.details', ['id' => $worker->id]) }}" class="btn btn-primary">Choose</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection

