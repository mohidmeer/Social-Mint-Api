@extends('layouts.dashboard')
@section('content')
@include('dashboard.socialmedia.error')
<div class="container">
   
    <div class="row">
        <div class="col-lg-6 offset-lg-2 col-md-8 col-sm-12 offset-md-1 offset-sm-0 ">
            <div class="card">
                <div class="card-header">
                    <strong>Pintrest</strong>
                    @isset(Auth::user()->Pintrest['name'])
                    <small>
                        {{Auth::user()->Pintrest['name']}}
                    </small>
                    @endisset
                    @empty(Auth::user()->Pintrest['name'])
                    <small>
                        Link your account
                    </small>
                    @endempty

                </div>
                <div class="card-body">

                    @isset( Auth::user()->Pintrest['name'] )
                    <a href="{{route('pintrestdeatuthorize')}}" class="text-white btn btn-block btn-danger p-4">
                        <h3>
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-pinterest" viewBox="0 0 16 16">
                                <path d="M8 0a8 8 0 0 0-2.915 15.452c-.07-.633-.134-1.606.027-2.297.146-.625.938-3.977.938-3.977s-.239-.479-.239-1.187c0-1.113.645-1.943 1.448-1.943.682 0 1.012.512 1.012 1.127 0 .686-.437 1.712-.663 2.663-.188.796.4 1.446 1.185 1.446 1.422 0 2.515-1.5 2.515-3.664 0-1.915-1.377-3.254-3.342-3.254-2.276 0-3.612 1.707-3.612 3.471 0 .688.265 1.425.595 1.826a.24.24 0 0 1 .056.23c-.061.252-.196.796-.222.907-.035.146-.116.177-.268.107-1-.465-1.624-1.926-1.624-3.1 0-2.523 1.834-4.84 5.286-4.84 2.775 0 4.932 1.977 4.932 4.62 0 2.757-1.739 4.976-4.151 4.976-.811 0-1.573-.421-1.834-.919l-.498 1.902c-.181.695-.669 1.566-.995 2.097A8 8 0 1 0 8 0z" />
                            </svg>&nbsp;&nbsp;&nbsp;&nbsp;</i>Remove Account
                        </h3>
                    </a>
                    @endisset

                    @empty(Auth::user()->Pintrest['name'] )
                    <a href="{{route('pintrestlogin')}}" class="text-white btn btn-block bg-pintrest p-4">

                        <h2>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-pinterest" viewBox="0 0 16 16">
                                <path d="M8 0a8 8 0 0 0-2.915 15.452c-.07-.633-.134-1.606.027-2.297.146-.625.938-3.977.938-3.977s-.239-.479-.239-1.187c0-1.113.645-1.943 1.448-1.943.682 0 1.012.512 1.012 1.127 0 .686-.437 1.712-.663 2.663-.188.796.4 1.446 1.185 1.446 1.422 0 2.515-1.5 2.515-3.664 0-1.915-1.377-3.254-3.342-3.254-2.276 0-3.612 1.707-3.612 3.471 0 .688.265 1.425.595 1.826a.24.24 0 0 1 .056.23c-.061.252-.196.796-.222.907-.035.146-.116.177-.268.107-1-.465-1.624-1.926-1.624-3.1 0-2.523 1.834-4.84 5.286-4.84 2.775 0 4.932 1.977 4.932 4.62 0 2.757-1.739 4.976-4.151 4.976-.811 0-1.573-.421-1.834-.919l-.498 1.902c-.181.695-.669 1.566-.995 2.097A8 8 0 1 0 8 0z" />
                            </svg>&nbsp;&nbsp;&nbsp;</i> Login With Pintrest
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
                    <strong class="card-title">User Boards</strong>
                </div>
                @isset(Auth::user()->Pintrest)
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach (Auth::user()->BPintrest as $Board)
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$Board['name']}}</td>
                                <td>
                                    @if ($Board['status']==1)
                                    <a data-toggle="tooltip" data-placement="right" title="Disable" href="{{route('pintrestdeactivate',  $Board->id) }}" class="btn-sm rounded-pill btn-primary text-white">
                                        Allowed</a>&nbsp;&nbsp;
                                    @else
                                    <a data-toggle="tooltip" data-placement="right" title="Activate" href="{{ route('pintrestactivate', $Board->id)  }}" class="btn-sm btn-danger text-white">
                                        Allow</a>&nbsp;&nbsp;
                                    @endif
                                    <a data-toggle="tooltip" data-placement="right" title="delete" href="{{route('unlinkBoard',  $Board->id) }}" class="btn-sm btn-secondary text-white">Delete</a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>  
                @endisset
                @empty(Auth::user()->Pintrest)
                <div class="card-body">
                    <h2>
                        No Boards
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