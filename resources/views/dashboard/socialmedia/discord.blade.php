@extends('layouts.dashboard')
@section('content')
@include('dashboard.socialmedia.error')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-2">
            <div class="card">
                <div class="card-header">
                    <strong>Discord</strong>
                    @isset(Auth::user()->Discord->name)     
                    <small>
                        {{Auth::user()->Discord->name }}
                    </small>
                    @endisset
                    @empty(Auth::user()->Discord->name)     
                    <small>
                        Link your account
                    </small>
                    @endempty

                </div>
                <div class="card-body">
                    @isset(Auth::user()->Discord->name)
                    <a href="{{route('discorddeauthorize')}}" class="text-white btn btn-block btn-danger p-4">
                        <h2>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-discord" viewBox="0 0 16 16">
                            <path d="M13.545 2.907a13.227 13.227 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.19 12.19 0 0 0-3.658 0 8.258 8.258 0 0 0-.412-.833.051.051 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.041.041 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032c.001.014.01.028.021.037a13.276 13.276 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019c.308-.42.582-.863.818-1.329a.05.05 0 0 0-.01-.059.051.051 0 0 0-.018-.011 8.875 8.875 0 0 1-1.248-.595.05.05 0 0 1-.02-.066.051.051 0 0 1 .015-.019c.084-.063.168-.129.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.052.052 0 0 1 .053.007c.08.066.164.132.248.195a.051.051 0 0 1-.004.085 8.254 8.254 0 0 1-1.249.594.05.05 0 0 0-.03.03.052.052 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.235 13.235 0 0 0 4.001-2.02.049.049 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.034.034 0 0 0-.02-.019Zm-8.198 7.307c-.789 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612Zm5.316 0c-.788 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612Z" />
                        </svg>&nbsp;&nbsp;&nbsp;&nbsp;</i>Remove Account
                        </h2>
                    </a>

                    @endisset
                    @empty(Auth::user()->Discord->name)
                    <a href="{{route('discordlogin')}}" class="text-white btn btn-block bg-discord p-4">
                        <h2>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-discord" viewBox="0 0 16 16">
                            <path d="M13.545 2.907a13.227 13.227 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.19 12.19 0 0 0-3.658 0 8.258 8.258 0 0 0-.412-.833.051.051 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.041.041 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032c.001.014.01.028.021.037a13.276 13.276 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019c.308-.42.582-.863.818-1.329a.05.05 0 0 0-.01-.059.051.051 0 0 0-.018-.011 8.875 8.875 0 0 1-1.248-.595.05.05 0 0 1-.02-.066.051.051 0 0 1 .015-.019c.084-.063.168-.129.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.052.052 0 0 1 .053.007c.08.066.164.132.248.195a.051.051 0 0 1-.004.085 8.254 8.254 0 0 1-1.249.594.05.05 0 0 0-.03.03.052.052 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.235 13.235 0 0 0 4.001-2.02.049.049 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.034.034 0 0 0-.02-.019Zm-8.198 7.307c-.789 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612Zm5.316 0c-.788 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612Z" />
                        </svg>&nbsp;&nbsp;&nbsp;</i> Login With Discord
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
                    <strong class="card-title">Linked Cannels</strong>
                </div>
                @isset(Auth::user()->Discord)
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
                                @foreach (Auth::user()->DChannels as $Channel)
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$Channel['name']}}</td>
                                <td>
                                    @if ($Channel['status']==1)
                                    <a data-toggle="tooltip" data-placement="right" title="Disable" href="{{route('discordeactivate',  $Channel->channel_id) }}" class="btn-sm rounded-pill btn-primary text-white">
                                        Allowed</a>&nbsp;&nbsp;
                                    @else
                                    <a data-toggle="tooltip" data-placement="right" title="Activate" href="{{ route('discordactivate', $Channel->channel_id)  }}" class="btn-sm btn-danger text-white">
                                        Allow</a>&nbsp;&nbsp;
                                    @endif
                                    <a data-toggle="tooltip" data-placement="right" title="delete" href="{{route('unlinkchannel',  $Channel->channel_id) }}" class="btn-sm btn-secondary text-white">Delete</a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>  
                @endisset
                @empty(Auth::user()->Discord)
                <div class="card-body">
                    <h2>
                        No Channels
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