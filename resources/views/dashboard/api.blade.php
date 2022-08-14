@extends('layouts.dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Api Key</h4>
                </div>
                <div class="card-body  d-flex align-content-between">
                    <p id="cope" class="muted"><code>{{$accesstoken}}</code></p>
                    <div class="ml-auto">
                        <button id="cope" class="btn btn-outline-danger" data-clipboard-action="copy" data-clipboard-target="#cope" title="Copy To Clip Board"><i class="fa fa-copy"></i></button>
                    </div>

                </div>
            </div>
        </div> <!-- /.card -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class=" align-content-center">Api Usage</h4>
                </div>
                <div class="card-body">
                    <div class="progress-box progress-1">
                        <!-- <h4 class="por-title">Requests</h4> -->
                        <div class="por-txt"> 3%</div>
                        <div class="progress mb-2" style="height: 5px;">
                            <div class="progress-bar bg-flat-color-1" role="progressbar" style="width: 3%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div> <!-- /.card -->
            </div>
        </div>

    </div>
    <h3 class="mb-3">Usage</h3>
    <div class="jumbotron">
        Use your secret API key to make server-side calls. See the <a class=" nav-item" href="{{route('docs')}}">API Docs</a> for more information.
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-8 col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h4>Examples</h4>
                </div>
                <div class="card-body">
                    <div class="custom-tab">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home" aria-selected="true">Php</a>
                                <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile" role="tab" aria-controls="custom-nav-profile" aria-selected="false">NodeJs</a>
                                <a class="nav-item nav-link active show" id="custom-nav-contact-tab" data-toggle="tab" href="#custom-nav-contact" role="tab" aria-controls="custom-nav-contact" aria-selected="false">Python</a>
                            </div>
                        </nav>
                        <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                            <div class="tab-pane fade" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                            <pre>
                            <code class="php">
 use Illuminate\Support\Facades\Http;
  
 $response = Http::withBody( 
         '{
   "message": "Hello Posted From Laravel",
   
   "img_url": "https://jobycodirect.com/images/glyphicons-halflings.png"
 }', 'json' 
     ) 
     ->withHeaders([ 
         'Accept'=> 'application/json', 
         'Content-Type'=> 'application/json', 
         'Authorization'=> 'Bearer 3|9djRAt1BVsULvfSxRfQEIcskNCcQouLmc91qGruV', 
     ]) 
     ->post('http://127.0.0.1:8000/api/facebook/pic/post'); 
 
 echo $response->body();                            
                            </code>
                        </pre>
                            </div>
                            <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                            <pre>
                            <code class="nodejs">
var axios = require("axios").default;
var options = {
  method: 'POST',
  url: 'http://127.0.0.1:8000/api/facebook/pic/post',
  headers: {
    Accept: 'application/json',
    'Content-Type': 'application/json',
    Authorization: 'Bearer 3|9djRAB1BVstLvfSxRfQEIcskNCcQouLmc91qGruV'
  },
  data: {
    message: 'Hello Posted From Laravel',
    img_url: 'https://jobycodirect.com/images/glyphicons-halflings.png'
  }
};
axios.request(options).then(function (response) {
  console.log(response.data);
}).catch(function (error) {
  console.error(error);
});
                            </code>
                        </pre>                                
                            </div>
                            <div class="tab-pane fade active show" id="custom-nav-contact" role="tabpanel" aria-labelledby="custom-nav-contact-tab">
                            <pre>
                            <code class="python">
import requests
import json

reqUrl = "http://127.0.0.1:8000/api/facebook/pic/post"

headersList = {
 "Accept": "application/json",
 "Content-Type": "application/json",
 "Authorization": "Bearer 3|9djRAB1BVsttvfSxRfQEIcskNCcQouLmc91qGruV" 
}
payload = json.dumps({
  "message": "Hello Posted From Laravel",
  
  "img_url": "https://jobycodirect.com/images/glyphicons-halflings.png"
})
response = requests.request("POST", reqUrl, data=payload,  headers=headersList)
print(response.text)

                            </code>
                        </pre>                         
                        </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>


</div>

<script>
    hljs.highlightAll();
</script>
@endsection