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
                    <div>
                        <hr>
                        <h3 class="pb-2 display-4 text-center">Getting Started</h3>
                        <ol class=" m-3 vue-ordered">
                            <li>
                                <strong>Login in to <span class=" ">Social Mint Share</span> </strong>
                            </li>
                            <li class="mt-3 "><strong>Connect your Social Media Accounts from dashboard Social Media Menu</strong>
                                <ol class="  ml-4 mt-4">

                                    <li>
                                        <hr> <strong>Facebook</strong>
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
                                                                <h2>
                                                                    <i class="fa fa-facebook">&nbsp;&nbsp;&nbsp;&nbsp;</i>Login With Facebook
                                                                </h2>
                                                            </a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                    <li id="InstagramConnect">
                                        <hr><strong>Instagram</strong>
                                        <ul class="ml-3">
                                            <li>
                                                <p>Only Instagram Business accounts connected to a Facebook Page are supported</p>
                                            </li>
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
                                                                    <h2>
                                                                        <i class="fa fa-instagram">&nbsp;&nbsp;&nbsp;&nbsp;</i>Login With Instagram
                                                                    </h2>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <li>
                                                <p>If you have already connected Social Mint Share with Facebook, see the following instructions.</p>
                                            </li>
                                            <ul>

                                                <li>Click Login With Instagram</li>
                                                <li>Click Edit Settings</li>
                                                <div class="rounded rounded-3 mr-5 my-5 d-flex justify-content-center">
                                                    <img class=" shadow-lg mr-5 rounded" src="{{asset('assets/EditSettings.png')}}" alt="">
                                                </div>
                                                <li>Select All Facebook pages Linked to Instagram Accounts</li>
                                                <div class="rounded rounded-3 mr-5 my-5 d-flex justify-content-center">
                                                    <img class=" shadow-lg mr-5  rounded" src="{{asset('assets/SelectFbPages.png')}}" alt="">
                                                </div>
                                                <li>Select Instagram Accounts</li>
                                                <div class="rounded rounded-3 mr-5 my-5 d-flex justify-content-center">
                                                    <img class=" shadow-lg mr-5  rounded" src="{{asset('assets/SelectInstagramAccounts.png')}}" alt="">
                                                </div>
                                                <li>Allow all settings</li>
                                                <div class="rounded rounded-3 mr-5 my-5 d-flex justify-content-center">
                                                    <img class=" shadow-lg mr-5  rounded" src="{{asset('assets/AllowAll.png')}}" alt="">
                                                </div>
                                                <li>Click Done, and you are good to go </li>
                                            </ul>
                                        </ul>

                                    </li>
                                    <li>
                                        <hr><strong>Twitter</strong>
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
                                                                <h2>
                                                                    <i class="fa fa-twitter">&nbsp;&nbsp;&nbsp;&nbsp;</i>Login With Twitter
                                                                </h2>
                                                            </a>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                    <li>
                                        <hr><strong>Reddit</strong>
                                        <div>
                                            <div class="row">
                                                <div class="col-md-6 offset-2">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <strong>Reddit</strong>
                                                            <small>Your Account

                                                            </small>
                                                        </div>
                                                        <div class="card-body">

                                                            <a class="text-white btn btn-block  bg-reddit p-4">
                                                                <h2>
                                                                    <i class="fa fa-reddit">&nbsp;&nbsp;&nbsp;&nbsp;</i>Login With Reddit
                                                                </h2>
                                                            </a>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                    <li>
                                        <hr><strong>Telegram</strong>
                                        <div>
                                            <div class="row">
                                                <div class="col-md-6 offset-2">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <strong>Telegram</strong>
                                                            <small>Your Account </small>
                                                        </div>
                                                        <div class="card-body">

                                                            <a class="text-white btn btn-block  bg-telegram p-4">
                                                                <h2>
                                                                    <i class="fa fa-telegram">&nbsp;&nbsp;&nbsp;&nbsp;</i>Connect Telegram
                                                                </h2>
                                                            </a>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <ul>
                                            <li>
                                                <p class="text-dark">
                                                    Telegram uses bots to allow posting to a Channel or Group that you are an owner or admin , Add
                                                    <span class="bg-success rounded text-white font-bold px-2">SocialMintShare</span> Bot
                                                    as Admin in your Channel or Group
                                                </p>
                                            </li>
                                            <li>
                                                <p class="text-dark">
                                                    Go to Channel or Group settings and click on Administrators
                                                </p>
                                                <div class="rounded rounded-3 mr-5 my-5 d-flex justify-content-center">
                                                    <img class=" shadow-lg mr-5  rounded" src="{{asset('assets/Telegram/Settings.png')}}" alt="">
                                                </div>
                                            </li>
                                            <li>
                                                <p class="text-dark">
                                                    Click On Add Admins
                                                </p>
                                                <div class="rounded rounded-3 mr-5 my-5 d-flex justify-content-center">
                                                    <img class=" shadow-lg mr-5  rounded" src="{{asset('assets/Telegram/AdminAdd.png')}}" alt="">
                                                </div>
                                            </li>
                                            <li>
                                                <p class="text-dark">
                                                    Search For SocialMintBot
                                                </p>
                                                <div class="rounded rounded-3 mr-5 my-5 d-flex justify-content-center">
                                                    <img class=" shadow-lg mr-5  rounded" src="{{asset('assets/Telegram/Search.png')}}" alt="">
                                                </div>
                                            </li>
                                            <li>
                                                <p class="text-dark">
                                                    Provide permissions to Bot
                                                </p>
                                                <div class="rounded rounded-3 mr-5 my-5 d-flex justify-content-center">
                                                    <img class=" shadow-lg mr-5  rounded" src="{{asset('assets/Telegram/Allow.png')}}" alt="">
                                                </div>
                                            </li>
                                            <li>
                                                <p class="text-dark">
                                                    Once the bot is enabled add your Channel or Group name
                                                    something like this <code>&nbsp;@socialmint</code> Or <code>-617820741</code>
                                                    <br> And You are Ready To Go
                                                </p>
                                                <div class="rounded rounded-3 mr-5 my-5 d-flex justify-content-center">
                                                    <img class=" shadow-lg mr-5  rounded" src="{{asset('assets/Telegram/Save.png')}}" alt="">
                                                </div>
                                            </li>

                                        </ul>

                                    </li>
                                    <li>
                                        <hr><strong>Discord</strong>
                                        <div>
                                            <div class="row">
                                                <div class="col-md-6 offset-2">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <strong>Discord</strong>
                                                            <small>Your Account

                                                            </small>
                                                        </div>
                                                        <div class="card-body">

                                                            <a class="text-white btn btn-block  bg-discord p-4">
                                                                <h2>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-discord" viewBox="0 0 16 16">
                                                                        <path d="M13.545 2.907a13.227 13.227 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.19 12.19 0 0 0-3.658 0 8.258 8.258 0 0 0-.412-.833.051.051 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.041.041 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032c.001.014.01.028.021.037a13.276 13.276 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019c.308-.42.582-.863.818-1.329a.05.05 0 0 0-.01-.059.051.051 0 0 0-.018-.011 8.875 8.875 0 0 1-1.248-.595.05.05 0 0 1-.02-.066.051.051 0 0 1 .015-.019c.084-.063.168-.129.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.052.052 0 0 1 .053.007c.08.066.164.132.248.195a.051.051 0 0 1-.004.085 8.254 8.254 0 0 1-1.249.594.05.05 0 0 0-.03.03.052.052 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.235 13.235 0 0 0 4.001-2.02.049.049 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.034.034 0 0 0-.02-.019Zm-8.198 7.307c-.789 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612Zm5.316 0c-.788 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612Z" />
                                                                    </svg>&nbsp;&nbsp;&nbsp;&nbsp;</i>Login With Discord
                                                                </h2>
                                                            </a>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                    <li>
                                        <hr><strong>Pintrest</strong>
                                        <div>
                                            <div class="row">
                                                <div class="col-md-6 offset-2">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <strong>Pintrest</strong>
                                                            <small>Your Account

                                                            </small>
                                                        </div>
                                                        <div class="card-body">

                                                            <a class="text-white btn btn-block  bg-pintrest p-4">
                                                                <h2>
                                                                    <i class="fa fa-pinterest">&nbsp;&nbsp;&nbsp;&nbsp;</i>Login With Pintrest
                                                                </h2>
                                                            </a>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                    <li>
                                        <hr><strong>You can Unlink all of your accounts at anytime </strong>
                                    </li>

                                </ol>

                            </li>
                            <li class="mt-4">
                                <hr><strong>Get your Sceret Api Key from Dashboard Api Page which Looks Something Like this</strong>
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
reqUrl = "https://socialmintshare.net/api/test"

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