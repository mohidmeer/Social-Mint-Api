@extends('layouts.dashboard')
@section('content')
@include('dashboard.socialmedia.error')
<div class="container">
    @isset(Auth::user()->Telegram['name'])
    <div style="height:300px ;">
    </div>
    @endisset
    <div class="row">
        <div class="col-lg-6 offset-lg-2 col-md-8 col-sm-12 offset-md-1 offset-sm-0 ">
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
                    <a href="{{route('telegramdeatuthorize')}}" class="text-white btn btn-block btn-danger p-4">
                        <h4>
                            <i class="fa fa-telegram">&nbsp;&nbsp;&nbsp;&nbsp;</i>Remove Account
                        </h4>
                    </a>

                    @endisset
                    @empty(Auth::user()->Telegram['name'] )
                    <a data-toggle="modal" data-target="#mediumModal" href="" class="text-white btn btn-block bg-telegram p-4">
                        <h2>
                            <i class="fa fa-telegram">&nbsp;&nbsp;&nbsp;</i> Connect Your Telegram
                        </h2>
                    </a>
                    @endempty
                </div>
            </div>
        </div>
    </div>
</div>



<!-- MODal -->
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mediumModalLabel">Telegram</h4>

            </div>
            <div class="modal-body">
                <p class="text-dark">
                    Telegram uses bots to allow posting to a Channel or Group that you are an owner or admin , Add
                    <span class="bg-success rounded text-white font-bold px-2">SocialMintShare</span> Bot
                    as Admin in your Channel or Group
                    Please see:
                </p>
                <a href="{{route('docs','#telegram')}}">
                    <h4 class="text-danger text-center ">Detailed Instruction</h4>
                </a>

                <p class="text-dark">
                    Once the bot is enabled add your Channel or Group name here
                    something like this <code>&nbsp;@socialmint</code>  Or <code>-617820741</code> 
                    <br> And You are Ready To Go
                </p>
                <form id="myform" method="POST" action="{{route('savename')}}">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" name="name"   required >
                        <div class="input-group-addon">
                            <span class="fa fa-telegram " ></span>
                        </div>
                    </div>
                </form>


            </div>
            <div class="modal-footer">

                <button type="submit"  form="myform" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- MODal -->
<div style="height:400px ;">

</div>


@endsection