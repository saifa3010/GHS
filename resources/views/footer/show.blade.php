@extends('layouts.adminLayout')

@section("content")

@section('title',"Show About Us")




<div class='container p-5'>

<div class="row mb-5">
    <div class="col align-self-start">
        <a   class="btn btn-primary" href="{{route('footer.index')}}" >Back</a>
    </div>
</div>






<div class="mb-3">
    <h3>Company email : {{$footer->email_company}}</h3>
</div>
<hr>
 <div class="mb-3">
    <h3>Company phone : {{$footer->phone_company}}</h3>
 </div>
 <hr>
 <div class="mb-3">
    <h3>Company location : {{$footer->location_company}}</h3>
 </div>
 <hr>
 <div class="mb-3">
    <h3>Text : {{$footer->text}}</h3>
 </div>
 <hr>
 <div class="mb-3">
    <h3>Copy right : {{$footer->copy_right}}</h3>
 </div>
 <hr>
<div class="mb-3">
    <img src="/images/{{$footer->image}}" width="150px">

</div>






</div>






@endsection
