@extends('layouts.adminLayout')

@section("content")

@section('title',"Show services")




<div class='container p-5'>

<div class="row mb-5">
    <div class="col align-self-start">
        <a   class="btn btn-primary" href="{{route('categories.index')}}" >All Service</a>
    </div>
</div>






<div class="mb-3">
    <h3>Name : {{$category->name}}</h3>
</div>
<hr>
 <div class="mb-3">
    <h3>Service : {{$category->service->name}}</h3>
 </div>
 <hr>

<div class="mb-3">
    <img src="/images/{{$category->image}}" width="150px">

</div>






</div>






@endsection
