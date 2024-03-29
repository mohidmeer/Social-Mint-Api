@extends('layouts.dashboard')
@section('content')

@include('dashboard.socialmedia.error')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-2">
            <div class="card">
                <div class="card-header">
                    <strong>Facebook</strong>
                    @isset(Auth::user()->Facebook)
                    <small>
                        {{Auth::user()->Facebook->name}}
                    </small>
                    @endisset
                    @empty(Auth::user()->Facebook->name)
                    <small>
                        Link your account
                    </small>
                    @endempty

                </div>
                <div class="card-body">

                    @isset(Auth::user()->Facebook)
                    <a href="{{route('facebookdeauthorize')}}" class="text-white btn btn-block btn-danger p-4">
                        <h2>
                            <i class="fa fa-facebook">&nbsp;&nbsp;&nbsp;&nbsp;</i>Remove Account
                        </h2>
                    </a>

                    @endisset
                    @empty(Auth::user()->Facebook)
                    <a href="{{route('facebooklogin')}}" class="text-white btn btn-block btn-primary p-4">
                        <h2>
                            <i class="fa fa-facebook">&nbsp;&nbsp;&nbsp;</i> Login With Facebook
                        </h2>
                    </a>
                    @endempty
                </div>
            </div>
        </div>
    </div>
</div>
<div class="contain">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Linked Pages</strong>
                </div>
                @isset(Auth::user()->fbpages[0])
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Avtar</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach (Auth::user()->fbpages as $page)
                                <th scope="row">{{$loop->iteration}}</th>
                                <th><img src="{{$page->img_url}}"  class="rounded-circle " alt="No Pic"></th>
                                <td>{{$page['name']}}</td>
                                <td>
                                    @if ($page['status']==1)
                                    <a data-toggle="tooltip" data-placement="right" title="Disable" href="{{route('deactivate',  $page->page_id) }}" class="btn btn-primary text-white">
                                        Allow Posting
                                    </a>&nbsp;&nbsp;<a data-toggle="tooltip" data-placement="right" title="delete" href="{{route('unlinkpage',  $page->page_id) }}" class="btn btn-danger text-white">Unlink</a>

                                    @else
                                    <a data-toggle="tooltip" data-placement="right" title="Activate" href="{{ route('activate', $page->page_id)  }}" class="btn btn-danger text-white">
                                        Not Allowed
                                    </a> &nbsp;&nbsp;<a data-toggle="tooltip" data-placement="right" title="delete" href="{{route('unlinkpage',  $page->page_id) }}" class="btn btn-danger text-white">Unlink</a>

                                    @endif

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endisset
                @empty(Auth::user()->fbpages[0])
                <div class="card-body">
                    <h2 class="text-center">
                        No Pages Found
                    </h2>
                </div>
                @endempty





            </div>
        </div>
    </div>
</div>
<div class="container overflow-hidden">
    <div class="row">
    </div>
</div>
</div>
@endsection