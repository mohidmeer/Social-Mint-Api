@extends('layouts.dashboard')
@section('content')
@include('dashboard.socialmedia.error')
<div class="container">
    @isset(Auth::user()->Socialtoken['tw_name'])
    <div style="height:300px ;">
    </div>
    @endisset
    <div class="row">
        <div class="col-md-6 offset-2">
            <div class="card">
                <div class="card-header">
                    <strong>Twitter</strong>
                    @isset(Auth::user()->Socialtoken['tw_name'])
                    <small>
                        {{Auth::user()->Socialtoken['tw_name']}}
                    </small>
                    @endisset
                    @empty(Auth::user()->Socialtoken['tw_name'])
                    <small>
                        Link your account
                    </small>
                    @endempty

                </div>
                <div class="card-body">

                    @isset( Auth::user()->Socialtoken['tw_name'] )
                    <a href="{{route('twitterdeatuthorize')}}" class="text-white btn btn-block btn-danger p-4">
                        <h4>
                            <i class="fa fa-twitter">&nbsp;&nbsp;&nbsp;&nbsp;</i>Remove Account
                        </h4>
                    </a>

                    @endisset
                    @empty(Auth::user()->Socialtoken['tw_name'] )
                    <a href="{{route('twitterlogin')}}" class="text-white btn btn-block bg-twitter p-4">
                        <h4>
                            <i class="fa fa-twitter">&nbsp;&nbsp;&nbsp;</i> Login With twitter
                        </h4>
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