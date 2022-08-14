<section id="overview">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title" v-if="headerText">Overview</strong>
                    </div>
                    <div class="card-body">
                        <div class="typo-header">
                            <h1 class="pb-2 display-4 text-center">What Is <span class=" bg-flat-color-1 text-white"> Social Mint Share</span></h1>
                        </div>
                        <div>                          
                        
                                <p class="p-4 font-weight-bold">
                                    Social Mint Share is an Api Tool that provide you ability to post on Facebook pages,Instagram and
                                Twitter via Api,You can post to all Social Media Accounts with single API call or separately if necessary
                                Sometimes you need to share to social media quite often,and it takes time to share on each platform,We save 
                                the hustle for posting it to all of your social media accounts in background saving you the time and effort for posting to
                                each platform manually</p>
                                 
                        

                        </div>
                        <div >
                        <hr>
                        <h3 class="pb-2 display-4 text-center">Getting Started</h3>
                            <ol class=" m-3 vue-ordered">
                                <li>
                                    <strong>Login in to <span class=" ">Social Mint Share</span> </strong>
                                </li>
                                <li class="mt-3 "><strong>Connect your Social Media Accounts from dashboard Social Media Menu</strong>
                                    <ol class="  ml-4 mt-4">

                                        <li><hr> <strong>Facebook</strong>
                                            <div>
                                                <div class="row">
                                                    <div class="col-md-6 offset-2">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <strong>Facebook </strong>
                                                                <small>Your Account

                                                                </small>
                                                            </div>
                                                            <div class="card-body">

                                                                <a class="text-white btn btn-block  bg-primary p-4">
                                                                    <h4>
                                                                        <i class="fa fa-facebook">&nbsp;&nbsp;&nbsp;&nbsp;</i>Connect
                                                                    </h4>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </li>
                                        <li><hr><strong>Instagram</strong>
                                            <div>
                                                <div class="row">
                                                    <div class="col-md-6 offset-2">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <strong>Instagram </strong>
                                                                <small>Your Account

                                                                </small>
                                                            </div>
                                                            <div class="card-body">

                                                                <a class="text-white btn btn-block bg-instagram p-4">
                                                                    <h4>
                                                                        <i class="fa fa-instagram">&nbsp;&nbsp;&nbsp;&nbsp;</i>Connect
                                                                    </h4>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </li>
                                        <li><hr><strong>Twitter</strong>
                                            <div>
                                                <div class="row">
                                                    <div class="col-md-6 offset-2">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <strong>Twitter</strong>
                                                                <small>Your Account

                                                                </small>
                                                            </div>
                                                            <div class="card-body">

                                                                <a class="text-white btn btn-block  bg-twitter p-4">
                                                                    <h4>
                                                                        <i class="fa fa-twitter">&nbsp;&nbsp;&nbsp;&nbsp;</i>Connect
                                                                    </h4>
                                                                </a>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </li>
                                        <li><hr><strong>You can Unlink all of your accounts at anytime </strong></li>

                                    </ol>

                                </li>
                                <li class="mt-4"><hr><strong>Get your Sceret Api Key from Dashboard Api Page which Looks Something Like this</strong>
                                    <div class="row mt-4">
                                        <div class="col-md-6 offset-2">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4>Api Key</h4>
                                                </div>
                                                <div class="card-body  d-flex align-content-between">
                                                    <p id="cope" class="muted"><code>3|9djRABdsdVsULvfSxRfQEIcskNCcQouLmc91qGruV</code></p>
                                                    <div class="ml-auto">
                                                        <button id="cope" class="btn btn-outline-danger" data-clipboard-action="copy" data-clipboard-target="#cope" title="Copy To Clip Board"><i class="fa fa-copy"></i></button>
                                                    </div>

                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        
                                    </div>


                                </li>
                                <li>
                                    <strong class="mt-3">Every Api Call must include your API key as Bearer Token in Header</strong>
                                    <div class="row mt-3">
                                        <div class="col-md-7 offset-2">

                                            <pre>
<code class="python">
import requests
import json
reqUrl = "http://127.0.0.1:8000/api/test"

headersList = {
 "Accept": "application/json",
 "Content-Type": "application/json",
 "Authorization": "Bearer 3|9djRAB1BVssadftvfSxRfQEIcskNCcQouLmc91qGruV"
}
payload = "",
  
  "img_url": "https://jobycodirect.com/images/glyphicons-halflings.png"
})
response=requests.request("GET", reqUrl, data=payload,headers=headersList)
                            </code>
                        </pre>
                                        </div>
                                    </div>

                                </li>
                            </ol>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </section>