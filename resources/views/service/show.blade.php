@extends('layouts.adminLayout')

@section("content")

@section('title',"Show services")




<div class='container p-5'>

<div class="row mb-5">
    <div class="col align-self-start">
        <a   class="btn btn-primary" href="{{route('service.index')}}" >All Service</a>
    </div>
</div>






<div class="mb-3">
    <h3>Name : {{$service->name}}</h3>
</div>
<hr>
 <div class="mb-3">
    <h3>Description : {{$service->description}}</h3>
 </div>
 <hr>

<div class="mb-3">
    <img src="/images/{{$service->image}}" width="150px">

</div>






</div>






@endsection
