 @extends('layouts.dashboard')
 @section('content')
 @if (Session::has('caution'))
 <div class="sufee-alert alert with-close alert-dark alert-dismissible fade show p-4 m-3">
     <span class="badge badge-pill badge-dark">Caution</span>
     {{ Session::get('caution') }}
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">×</span> </button>
 </div>
 @endif
 <div class="container mt-2">
     <div class="row">
         <div class="col-lg-6 offset-lg-2 col-md-8 col-sm-12 offset-md-1 offset-sm-0 ">
             <div class="card">
                 <div class="card-header">
                     <strong>Instagram</strong>
                     @isset(Auth::user()->Instagram)
                     <small>
                         {{Auth::user()->Instagram->name}}
                     </small>
                     @endisset
                     @empty(Auth::user()->Instagram)
                     <small>
                         Link your account
                     </small>
                     @endempty

                 </div>
                 <div class="card-body">

                     @isset(Auth::user()->Instagram)
                     <a href="{{route('instagramdeauthorize')}}" class="text-white btn btn-block btn-danger p-4">
                         <h3>
                             <i class="fa fa-instagram">&nbsp;&nbsp;&nbsp;&nbsp;</i>Remove Account
                         </h3>
                     </a>
                     @endisset
                     @empty(Auth::user()->Instagram)
                     <a data-toggle="modal" data-target="#mediumModal" href="" class="text-white btn btn-block bg-instagram p-4">
                         <h3>
                             <i class="fa fa-instagram">&nbsp;&nbsp;&nbsp;</i> Login With instagram
                         </h3>
                     </a>
                     @endempty
                 </div>
             </div>
         </div>
     </div>
 </div>



 <div class="card">
     <div class="card-header">
         <strong class="card-title">Linked Accounts</strong>
     </div>
     <div class="card-body">
         <div class="table-stats order-table ov-h">
             @isset(Auth::user()->Instagram)
             <table class="table">
                 <thead>
                     <tr>
                         <th class="serial">#</th>
                         <th class="avatar">Avtar</th>
                         <th>Name</th>
                         <th>Action</th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach (Auth::user()->instaAccounts as $account)
                     <tr>
                         <td class="serial">{{$loop->iteration}}</td>
                         <td class="avatar">
                             <div class="round-img">
                                 <a href="#"><img class="rounded-circle" src="{{$account->profile_picture_url}}" alt=""></a>
                             </div>
                         </td>
                         <td class=" ml-auto font-weight-bold"> {{$account->name}} </td>

                         <td>@if ($account['status']==1)
                             <a data-toggle="tooltip" data-placement="right" title="Disable" href="{{route('instagramdeactivate',$account->id)}}" class="btn btn-primary text-white">Allowed</a>
                             <a data-toggle="tooltip" data-placement="right" title="delete" href="{{route('unlinkaccount',$account->id)}}" class="btn btn-danger text-white">Delete</a>
                             @else
                             <a data-toggle="tooltip" data-placement="right" title="Activate" href="{{ route('instagramactivate',$account->id)}}" class="btn btn-danger text-white">
                                 Allow
                             </a>
                             <a data-toggle="tooltip" data-placement="right" title="delete" href="{{route('unlinkaccount',$account->id) }}" class="btn btn-danger text-white">Delete</a>
                             @endif

                         </td>
                     </tr>
                     @endforeach
                 </tbody>
             </table>
             @endisset
         </div>
     </div>
     @empty(Auth::user()->instaAccounts[0])
     <div class="card-body">
         <h2>
             No Business Account Linked
         </h2>
     </div>
     @endempty

<!-- MODal -->
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mediumModalLabel">Instagram</h4>

            </div>
            <div class="modal-body">
                <p class="text-dark">
                  Only Instagram Business accounts connected to a Facebook Page are supported.
                  Please see:
                </p>
                <a href="{{route('docs','#InstagramConnect')}}">
                    <h4 class="text-danger text-center ">Detailed Instruction</h4>
                </a>

                <p class="text-dark mt-1">
                    You will be ask to login with facebook <br>
                    Make Sure to select Instagram Accounts with Facebook Pages 
                </p>
                


            </div>
            <div class="modal-footer">

                <a type="submit" href="{{route('instagramlogin')}}"  form="myform" class="btn btn-success">Continue</a>
            </div>
        </div>
    </div>
</div>
<!-- MODal -->




     @endsection