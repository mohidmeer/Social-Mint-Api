@extends('layouts.dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-2">
            <div class="card">
                <div class="card-header">
                    <strong>Instagram</strong>
                    @isset($fbusername)
                    <small>
                        {{$fbusername['name']}}
                    </small>
                    @endisset
                    @empty($fbusername)
                    <small>
                        Link your account
                    </small>
                    @endempty

                </div>
                <div class="card-body">

                    @isset($access_token['fb_access_token'])
                    <a href="{{route('instagramdeauthorize')}}" class="text-white btn btn-block btn-danger p-4">
                        <h4>
                            <i class="fa fa-instagram">&nbsp;&nbsp;&nbsp;&nbsp;</i>Remove Account
                        </h4>
                    </a>

                    @endisset
                    @empty($access_token['fb_access_token'])
                    <a href="{{route('instagramlogin')}}" class="text-white btn btn-block bg-instagram p-4">
                        <h4>
                            <i class="fa fa-instagram">&nbsp;&nbsp;&nbsp;</i> Login With instagram
                        </h4>
                    </a>
                    @endempty
                </div>
            </div>
        </div>
    </div>
</div>
@endsection