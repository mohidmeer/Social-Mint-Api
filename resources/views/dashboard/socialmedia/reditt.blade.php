@extends('layouts.dashboard')
@section('content')
@include('dashboard.socialmedia.error')
<div class="container">
    @isset(Auth::user()->Reditt['name'])
    <div style="height:300px ;">
    </div>
    @endisset
    <div class="row">
        <div class="col-lg-6 offset-lg-2 col-md-8 col-sm-12 offset-md-1 offset-sm-0 ">
            <div class="card">
                <div class="card-header">
                    <strong>Reddit</strong>
                    @isset(Auth::user()->Reditt['name'])
                    <small>
                        {{Auth::user()->Reditt['name']}}
                    </small>
                    @endisset
                    @empty(Auth::user()->Reditt['name'])
                    <small>
                        Link your account
                    </small>
                    @endempty

                </div>
                <div class="card-body">

                    @isset( Auth::user()->Reditt['name'] )
                    <a href="{{route('redditdeatuthorize')}}" class="text-white btn btn-block btn-danger p-4">
                        <h4>
                            <i class="fa fa-reddit">&nbsp;&nbsp;&nbsp;&nbsp;</i>Remove Account
                        </h4>
                    </a>

                    @endisset
                    @empty(Auth::user()->Reditt['name'] )
                    <a href="{{route('redditlogin')}}" class="text-white btn btn-block bg-reddit p-4">
                        <h2>
                            <i class="fa fa-reddit">&nbsp;&nbsp;&nbsp;</i> Login With Reddit
                        </h2>
                    </a>
                    @endempty
                </div>
            </div>
        </div>
    </div>
</div>
<div style="height:400px ;">

</div>
@endsection