@extends('layouts.dashboard')
@section('content')

<div class=" container px-5 mt-5">
<link rel="stylesheet" href="https://cdn.lineicons.com/3.0/lineicons.css"> 
<section class="pricing">
    <div class="container">
    <div class="p-3 pb-md-4 mx-auto text-center">
      <h1 class="display-4 fw-normal">Pricing</h1>    
    </div>

    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center " >
    <div class="col h-100 "  >
        <div class="card mb-4 rounded-3 shadow-sm  bg-transparent" style="height: 400px;">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal">Free</h4>
          </div>
          <div class="card-body ">
            <h1 class="card-title pricing-card-title">$0<small class="text-muted fw-light">/mo</small></h1>
            <ul class="list-unstyled mt-3 mb-4 h-50">
              <li>Free Start Up</li>
              <li>30 posts </li>
              <li>Facebook ,Instagram</li>
              <li>Image Post Access</li>
            </ul>
            <a  class="w-100  btn btn-lg btn-outline-success ">free</a>
          </div>
        </div>
      </div>
    @foreach ($plans as $plan)
    <div class="col h-100 "  >
        <div class="card mb-4 rounded-3 shadow-sm border-success bg-transparent" style="height: 400px;" >
          <div class="card-header py-3 text-white bg-success  ">
            <h4 class="my-0 fw-normal">{{$plan->name}}</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">${{$plan->price}}<small class="text-muted fw-light">/mo</small></h1>
            <ul class="list-unstyled mt-3 mb-4 h-50" >
              <li>{{$plan->description}}</li>
            </ul>         
            <a href="{{route('plan.show',$plan->id)}}" class="{{auth()->user()->subscribed($plan->name) ? 'w-100 btn btn-lg btn-warning' : 'w-100 btn btn-lg btn-success'}}" >{{auth()->user()->subscribed($plan->name) ? 'Currently Active' : 'Subscribe'}}</a>
          </div>
        </div>
      </div>
    @endforeach

      
    </div>

    </div>




</section>


</div>
