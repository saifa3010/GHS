@extends('layouts.adminLayout')

@section("content")

@section('title',"Show Home Page")




<div class='container p-5'>

<div class="row mb-5">
    <div class="col align-self-start">
        <a   class="btn btn-primary" href="{{route('HomePage.index')}}" >All Home Page</a>
    </div>
</div>






<div class="mb-3">
    <h3>Name : {{$HomePage->title}}</h3>
</div>
<hr>
 <div class="mb-3">
    <h3>Text : {{$HomePage->text}}</h3>
 </div>
 <hr>

<div class="mb-3">
    <img src="/images/{{$HomePage->image}}" width="150px">

</div>

<hr>

<div class="mb-3">
    <img src="/images/{{$HomePage->logo}}" width="150px">

</div>





</div>






@endsection
