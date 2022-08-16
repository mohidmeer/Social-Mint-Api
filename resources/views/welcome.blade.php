@extends('layouts.app')
@section('title', 'Welcome')
@section('content')
<div class="spacer-50"></div>
<header>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6">
                <h1 class="display-2 text-warning">Social Mint Share</h1>
                <p class="lead mt-4">Powerful APIs that enable you to send social media posts effortlessly. For developers and businesses of all sizes.Post to either your company's or your users' social media accounts with a few lines of code.</p>
                <p ><a href="/home" class="btn btn-warning  btn-lg mt-3" role="button">Get Started</a></p>
            </div>
            <div class="col-md-6 d-none d-lg-block d-md-block ">
                <img src="{{asset('assets/header.png')}}" class=" container-fluid shadow-sm rounded-3  " alt="...">
            </div>
        </div>
    </div>
</header>
<div class="spacer-100"></div>
<div class="spacer-50"></div>
<hr class=" border border-2 border-warning opacity-75 container">
<section id="capabiliteis" class="mt-5">
    <div class="container">
        <h1 class="display-4 text-warning  text-center mt-5">Social Mint Share Capabilities</h1>
        <div class="row mt-5">
            <div class="col-lg-3 col-md-3 col-sm-6 ">
                <div class="card  bg-transparent">
                    <div class="card-body">
                        <h5 class="card-title text-center">Facebook</h5>
                        <div class="text-center">
                            <h2><i class="bi-facebook text-center"></i></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 ">
                <div class="card  bg-transparent">
                    <div class="card-body">
                        <h5 class="card-title text-center">Instagram</h5>
                        <div class="text-center">
                            <h2><i class="bi-instagram text-center"></i></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 ">
                <div class="card  bg-transparent">
                    <div class="card-body">
                        <h5 class="card-title text-center">Twitter</h5>
                        <div class="text-center">
                            <h2><i class="bi-twitter text-center"></i></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 ">
                <div class="card  bg-transparent">
                    <div class="card-body">
                        <h5 class="card-title text-center">Linkden</h5>
                        <div class="text-center">
                            <h2><i class="bi bi-linkedin text-center"></i></h2>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <div class="row mt-2">
            <div class="col-lg-3 col-md-3 col-sm-6 ">
                <div class="card  bg-transparent">
                    <div class="card-body">
                        <h5 class="card-title text-center">Youtube</h5>
                        <div class="text-center">
                            <h2><i class="bi-youtube text-center"></i></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 ">
                <div class="card  bg-transparent">
                    <div class="card-body">
                        <h5 class="card-title text-center">Discord</h5>
                        <div class="text-center">
                            <h2><i class="bi-discord text-center"></i></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 ">
                <div class="card  bg-transparent">
                    <div class="card-body">
                        <h5 class="card-title text-center">Pintrest</h5>
                        <div class="text-center">
                            <h2><i class="bi bi-pinterest text-center"></i></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 ">
                <div class="card  bg-transparent">
                    <div class="card-body">
                        <h5 class="card-title text-center">Reditt</h5>
                        <div class="text-center">
                            <h2><i class=" bi-reddit text-center"></i></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<div class="spacer-100"></div>
<div class="spacer-50"></div>
<hr class=" border border-2 border-warning opacity-75 container">
<section>
    <div class="container ">
        <h1 class="display-5 text-warning  text-center mt-5">Create a Social Media Post with a Few Lines of Code</h1>
        <div class="row">
            <div class="col-md-6 offset-0  ">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="" role="presentation">
                        <button class="btn btn-dark active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Php</button>
                    </li>
                    <li class="ms-1" role="presentation">
                        <button class="btn btn-dark " id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Python</button>
                    </li>
                    <li class="ms-1" role="presentation">
                        <button class="btn btn-dark " id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Nodejs</button>
                    </li>
                </ul>
                <div class="tab-content border border-dark  " id="myTabContent">
                    <div class="tab-pane fade show active " id="home" role="tabpanel" aria-labelledby="home-tab">
                        <pre>
                            <code class="php">
require 'vendor/autoload.php';
$client = new GuzzleHttp\Client();
$res = $client->request(
    'POST',
    'https://socialmint.com/api/post',
    [
        'headers' => [
            'Content-Type'   => 'application/json',
            'Authorization'  => 'Bearer API_KEY'
        ],
        'json' => [
            'post' => 'Today is a great day!',
            'platforms' => [
                'twitter', 'facebook', 'instagram',
                'linkedin', 'telegram'
            ],
            'media_urls' => [
                'https://image.com/img',
                'https://video.com/video'
            ],
        ]
    ]
); 
                            </code>
                        </pre>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <pre>
                            <code class="python">
import requests

payload = {'post': 'Today is a great day!', 
'platforms': 
    ['twitter', 
    'facebook', 
    'linkedin', 
    'reddit', 
    'telegram']}
headers = {'Content-Type': 'application/json', 
    'Authorization': 'Bearer  [API_KEY]'}

requests.post('https://socialmint.com/api/post',
    json=payload, headers=headers)

                            </code>
                        </pre>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <pre>
                            <code class="nodejs">
function publish(API_KEY) {
  fetch("https://socialmint.com/api/post", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      Authorization: 'Bearer ${API_KEY}',
    },
    body: JSON.stringify({
      post: "Today is a great day!",
      platforms: ["twitter", "facebook", "instagram", 
        "linkedin", "reddit", "telegram"],
    }),
  });
} 

                            </code>
                        </pre>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <div class="ms-4">
                <p class="mt-5 lead">
                    The Social Mint API Let you manage your social media posts programatically<br>
                    Post to Multiple Social Media Accounts with One Request<br>
                    One API to Post On All Social Media!
                </p>
                <a href="{{Route('docs')}}" class="btn btn-warning px-5 mt-5">Read Docs</a href="{{route('docs')}}">
                </div>
               
            </div>

        </div>


    </div>

</section>
<hr class=" border border-2 border-warning opacity-75 container">

<script>
    hljs.highlightAll();
</script>





<div class="spacer-100"></div>
<div class="spacer-50"></div>
<section class="pricing">
    <div class="container">
    <div class="p-3 pb-md-4 mx-auto text-center">
      <h1 class="display-4 fw-normal">Pricing</h1>
      <p class="fs-5 ">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It’s built with default Bootstrap components and utilities with little customization.</p>
    </div>


    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center ">
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm  bg-transparent">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal">Free</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">$0<small class="text-muted fw-light">/mo</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>Free Start Up</li>
              <li>100 posts / month</li>
              <li>Facebook ,Instagram</li>
              <li>Image Post Access</li>
            </ul>
            <button type="button" class="w-100 btn btn-lg btn-outline-warning">Sign up for free</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm  bg-transparent">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal">Pro</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">$39<small class="text-muted fw-light">/mo</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>Unlimited Posts</li>
              <li>Facebook, Twitter, Instagram, LinkedIn, Reddit</li>
              <li>Post Multiple Images and Videos</li>
              <li>Chat Support</li>
            </ul>
            <button type="button" class="w-100 btn btn-lg btn-warning">Get started</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-warning  bg-transparent">
          <div class="card-header py-3 text-white bg-warning border-warning">
            <h4 class="my-0 fw-normal">Enterprise</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">$199<small class="text-muted fw-light">/mo</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>Unlimited Posts</li>
              <li>Facebook, Twitter, Instagram, LinkedIn, Telegram, Reddit, Google My Business, Pinterest, TikTok, YouTube</li>
              <li>Phone and email support</li>
              <li>Manage Multiple Users</li>
              <li>Additional Api Endpoint Support</li>
            </ul>
            <button type="button" class="w-100 btn btn-lg btn-warning">Contact us</button>
          </div>
        </div>
      </div>
    </div>


    </div>




</section>
<hr class=" border border-2 border-warning opacity-50">
    <div class="container ">
  <footer class="py-5 ">
    <div class="row">
      <div class="col-2">
        <h5>Social Mint Share</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
        </ul>
      </div>


      <div class="col-4 offset-5">
        <form>
          <h5>Subscribe to our newsletter</h5>
          <p>Monthly digest of whats new and exciting from us.</p>
          <div class="d-flex w-100 gap-2">
            <label for="newsletter1" class="visually-hidden">Email address</label>
            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
            <button class="btn btn-warning" type="button">Subscribe</button>
          </div>
        </form>
      </div>
    </div>

    <div class="d-flex justify-content-between py-4 my-4 ">
      <p>© 2021 Company, Inc. All rights reserved.</p>
      <ul class="list-unstyled d-flex ">
        <li class="ms-3"><a class="link-light" href="#"><i class="bi-facebook text-center"></i></a></li>
        <li class="ms-3"><a class="link-light" href="#"><i class="bi-instagram text-center"></i></a></li>
        <li class="ms-3"><a class="link-light" href="#"><i class="bi-twitter text-center"></i></a></li>
      </ul>
    </div>
  </footer>
</div>


@endsection