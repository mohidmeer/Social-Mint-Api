<div class="d-flex justify-content-end">

@if ($message = Session::get('success'))

    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show ">
        <span class="badge badge-pill badge-success">Success</span>
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span> </button>
    </div>
 @endif
@if ($message = Session::get('error'))
    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show ">
        <span class="badge badge-pill badge-danger">Error</span>
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span> </button>
    </div>
 @endif

</div>


