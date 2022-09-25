@extends('layouts.dashboard')
@section('content')
@include('dashboard.socialmedia.error')
<div class="container">
    @isset(Auth::user()->Telegram['name'])
    <div style="height:300px ;">
    </div>
    @endisset
    <div class="row">
        <div class="col-md-6 offset-2">
            <div class="card">
                <div class="card-header">
                    <strong>Telegram</strong>
                    @isset(Auth::user()->Telegram['name'])
                    <small>
                        {{Auth::user()->Telegram['name']}}
                    </small>
                    @endisset
                    @empty(Auth::user()->Telegram['name'])
                    <small>
                        Link your account
                    </small>
                    @endempty

                </div>
                <div class="card-body">

                    @isset( Auth::user()->Telegram['name'] )
                    <a href="{{route('redditdeatuthorize')}}" class="text-white btn btn-block btn-danger p-4">
                        <h4>
                            <i class="fa fa-reddit">&nbsp;&nbsp;&nbsp;&nbsp;</i>Remove Account
                        </h4>
                    </a>

                    @endisset
                    @empty(Auth::user()->Telegram['name'] )
                    <a href="{{route('redditlogin')}}" class="text-white btn btn-block bg-reddit p-4">
                        <h2>
                            <i class="fa fa-reddit">&nbsp;&nbsp;&nbsp;</i> Connect Your Telegram
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