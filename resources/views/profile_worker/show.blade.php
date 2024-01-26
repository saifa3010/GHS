@extends('layouts.adminLayout')

@section("content")

@section('title',"Show services")


<div class='container p-5'>

<div class="row mb-5">
    <div class="col align-self-start">
        <a   class="btn btn-primary" href="{{route('Profile_worker.index')}}" >All Service</a>
    </div>
</div>


<div class="mb-3">
    <h3>Name : {{$worker->firstName}}</h3>
</div>

@endsection
