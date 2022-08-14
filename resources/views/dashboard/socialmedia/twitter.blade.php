@extends('layouts.dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-2">
            <div class="card">
                <div class="card-header">
                    <strong>Twitter</strong>
                    @isset($twitterusername)
                    <small>
                        {{$twitterusername['name']}}
                    </small>
                    @endisset
                    @empty($twitterusername)
                    <small>
                        Link your account
                    </small>
                    @endempty

                </div>
                <div class="card-body">

                    @isset($access_token['tw_access_token'])
                    <a href="{{route('twitterdeauthorize')}}" class="text-white btn btn-block btn-danger p-4">
                        <h4>
                            <i class="fa fa-twitter">&nbsp;&nbsp;&nbsp;&nbsp;</i>Remove Account
                        </h4>
                    </a>

                    @endisset
                    @empty($access_token['tw_access_token'])
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
@endsection