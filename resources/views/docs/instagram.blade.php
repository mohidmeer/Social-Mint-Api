<section id="instagram">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header text-center">
                        <h2 class="bg-instagram rounded  p-3 text-white">Posting To Instagram</h2>
                    </div>
                    <div class="card-body">
                        <h3 class=" text-black-50  font-weight-bold">Publish to Instagram .</h3>

                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <span class="badge badge-pill badge-success">Post</span>

                                        <button type="button" class="close" data-toggle="collapse" data-target="#instagramfeed" aria-expanded="false" aria-controls="instagramfeed">
                                            <span>
                                                <i class="fa fa-bars"></i>
                                            </span>
                                        </button>
                                        <small class="ml-2 font-weight-bold">
                                            https://www.socialmint.com/api/instagram/<span class="text-success">feed</span>
                                        </small>

                                    </div>
                                    <div class="collapse" id="instagramfeed">
                                        <div class="card-body">
                                            <ul class=" font-weight-bold ml-4">
                                                <li>Parameters
                                                    <div class="mt-3">
                                                        <table class="table">
                                                            <tbody>
                                                                <th><small class="font-weight-bold">Header</small></th>
                                                                <tr>
                                                                    <td><small class="text-muted font-weight-bold ">Authorization</small></td>
                                                                    <td><small class="text-muted font-weight-bold ">String</small></td>
                                                                    <td><small class="text-muted font-weight-bold ">Authorization: Bearer API_KEY</small></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><small class="text-muted font-weight-bold ">Content-Type</small></td>
                                                                    <td><small class="text-muted font-weight-bold ">String</small></td>
                                                                    <td><small class="text-muted font-weight-bold ">application/json</small></td>
                                                                </tr>
                                                                <th><small class="font-weight-bold">Body</small></th>
                                                                <tr>
                                                                    <td><small class="text-muted font-weight-bold ">message</small></td>
                                                                    <td><small class="text-muted font-weight-bold ">String</small></td>
                                                                    <td><small class="text-muted font-weight-bold ">Your Message</small></td>
                                                                </tr>
                                                                <th><small class="font-weight-bold">Responses</small></th>
                                                                <tr>
                                                                    <td><small class=" rounded rounded-circle bg-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small><small class=" ml-2 text-muted font-weight-bold ">200</small></td>
                                                                    <td><small class="text-muted font-weight-bold ">Successfull</small></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><small class=" rounded rounded-circle bg-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small><small class=" ml-2 text-muted font-weight-bold ">404</small></td>
                                                                    <td><small class="text-muted font-weight-bold ">Not Found</small></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><small class=" rounded rounded-circle bg-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small><small class=" ml-2 text-muted font-weight-bold ">422</small></td>
                                                                    <td><small class="text-muted font-weight-bold ">Unprocessable Content</small></td>
                                                                </tr>
                                                                <th><small class="font-weight-bold">Example</small> <button type="button" class="close" data-toggle="collapse" data-target="#instafeedex" aria-expanded="false" aria-controls="instafeedex">
                                            <span>
                                                <i class="fa fa-bars"></i>
                                            </span>
                                        </button></th>

                                                            </tbody>
      

                                                     </table>
<div class="col-md-8 collapse"  id="instafeedex">
<pre>
<code class="python">
import requests
import json

reqUrl = "http://127.0.0.1:8000/api/instagram/feed"

headersList = {
 "Accept": "application/json",
 "Content-Type": "application/json",
 "Authorization": "Bearer 3|9djRAB1BVsttvfSxRfQEIcskNCcQouLmc91qGruV" 
}
payload = json.dumps({
  "message": "NewPost"
})
response = requests.request("POST", reqUrl, data=payload,  headers=headersList)
print(response.text)

</code>
</pre>   
</div>  
   
                                    
                                                    </div>
                                                </li>
                                                </ull>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class=" border ">
                        <h3 class=" text-black-50  font-weight-bold">Publish a Photo to Instagram Page.</h3>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <span class="badge badge-pill badge-success">Post</span>

                                        <button type="button" class="close" data-toggle="collapse" data-target="#instagrampic" aria-expanded="false" aria-controls="instagrampic">
                                            <span>
                                                <i class="fa fa-bars"></i>
                                            </span>
                                        </button>
                                        <small class="ml-2 font-weight-bold">
                                            https://www.socialmint.com/api/instagram/<span class="text-success">pic</span>
                                        </small>

                                    </div>
                                    <div class="collapse show" id="instagrampic">
                                        <div class="card-body">
                                            <ul class=" font-weight-bold ml-4">
                                                <li>Parameters
                                                    <div class="mt-3">
                                                        <table class="table">
                                                            <tbody>
                                                                <th><small class="font-weight-bold">Header</small></th>
                                                                <tr>
                                                                    <td><small class="text-muted font-weight-bold ">Authorization</small></td>
                                                                    <td><small class="text-muted font-weight-bold ">String</small></td>
                                                                    <td><small class="text-muted font-weight-bold ">Authorization: Bearer API_KEY</small></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><small class="text-muted font-weight-bold ">Content-Type</small></td>
                                                                    <td><small class="text-muted font-weight-bold ">String</small></td>
                                                                    <td><small class="text-muted font-weight-bold ">application/json</small></td>
                                                                </tr>
                                                                <th><small class="font-weight-bold">Body</small></th>
                                                                <tr>
                                                                    <td><small class="text-muted font-weight-bold ">message</small></td>
                                                                    <td><small class="text-muted font-weight-bold ">String</small></td>
                                                                    <td><small class="text-muted font-weight-bold ">Your Message(Optional)</small></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><small class="text-muted font-weight-bold ">img_url</small></td>
                                                                    <td><small class="text-muted font-weight-bold ">String</small></td>
                                                                    <td><small class="text-muted font-weight-bold ">Photo Valid Url</small></td>
                                                                </tr>
                                                                <th><small class="font-weight-bold">Responses</small></th>
                                                                <tr>
                                                                    <td><small class=" rounded rounded-circle bg-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small><small class=" ml-2 text-muted font-weight-bold ">200</small></td>
                                                                    <td><small class="text-muted font-weight-bold ">Successfull</small></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><small class=" rounded rounded-circle bg-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small><small class=" ml-2 text-muted font-weight-bold ">404</small></td>
                                                                    <td><small class="text-muted font-weight-bold ">Not Found</small></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><small class=" rounded rounded-circle bg-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small><small class=" ml-2 text-muted font-weight-bold ">422</small></td>
                                                                    <td><small class="text-muted font-weight-bold ">Unprocessable Content</small></td>
                                                                </tr>
                                                                <th><small class="font-weight-bold">Example</small><button type="button" class="close" data-toggle="collapse" data-target="#instagrampicex" aria-expanded="false" aria-controls="instagrampicex">
                                            <span>
                                                <i class="fa fa-bars"></i>
                                            </span>
                                        </button></th>

                                                            </tbody>
                                                        </table>
<div class="col-md-8 collapse"  id="instagrampicex">
<pre>
<code class="python">
import requests
import json

reqUrl = "http://127.0.0.1:8000/api/instagram/feed"

headersList = {
 "Accept": "application/json",
 "Content-Type": "application/json",
 "Authorization": "Bearer 3|9djRAB1BVsttvfSxRfQEIcskNCcQouLmc91qGruV" 
}
payload = json.dumps({
  "message": "NewPost",
  
  "img_url": "https://jobycodirect.com/images/glyphicons-halflings.png"
})
response = requests.request("POST", reqUrl, data=payload,  headers=headersList)
print(response.text)

</code>
</pre>   
</div>  
                                                    </div>
                                                </li>
                                                </ull>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>












                    </div>
                </div>
            </div>
        </div>
    </section>