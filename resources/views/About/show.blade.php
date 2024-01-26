@extends('layouts.adminLayout')

@section("content")

@section('title',"Show About Us")




<div class='container p-5'>

<div class="row mb-5">
    <div class="col align-self-start">
        <a   class="btn btn-primary" href="{{route('About.index')}}" >All Home Page</a>
    </div>
</div>






<div class="mb-3">
    <h3>Title : {{$About->title}}</h3>
</div>
<hr>
 <div class="mb-3">
    <h3>Text : {{$About->text}}</h3>
 </div>
 <hr>
 <div class="mb-3">
    <h3>Text : {{$About->number}}</h3>
 </div>
 <hr>
<div class="mb-3">
    <img src="/images/{{$About->image}}" width="150px">

</div>






</div>






@endsection
