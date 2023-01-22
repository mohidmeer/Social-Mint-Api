@extends('layouts.dashboard')
@section('content')

<div class=" container px-5 mt-5">
<section class="mt-5">
    <h3 class=" display-4 text-center mt-5 ">Subscriptions</h3>
<div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Ends At</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($subscriptions as $sub)
                                <th scope="row">{{$loop->iteration}}</th>
                                <th>{{$sub->name}}</th>
                                <td>{{$sub->created_at}}</td>
                                <td>{{$sub->ends_at}}</td>
                                <td>{{strtoupper($sub->stripe_status)}}</td>
                                <td>
                                @if ($sub->ends_at=='')
                                    <a data-toggle="tooltip" data-placement="right" href="{{ route('subscription.cancel',$sub->name)}}" title="Cancel Subscription"  class=" btn btn-danger text-white">
                                        Cancel
                                    </a>
                                    @else
                                    <a data-toggle="tooltip" data-placement="right" title="Resume Subscription" href="{{ route('subscription.resume',$sub->name)}}" class=" btn btn-primary text-white">
                                        Resume
                                    </a> 
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            
  


</section>


</div>
