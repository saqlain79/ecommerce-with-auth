
<!DOCTYPE html>
<html>
   <head>
      <base href="/public">
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="template/images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="template/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="template/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="template/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="template/css/responsive.css" rel="stylesheet" />
      
   </head>
   <body>
      <div class="">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
      </div>
      
        <div class="" style="display:flex; padding:30px; margin:auto">
                    
            <div style="width:50%; height:auto; margin:auto;">
                   <img src="/product/{{$product->image}}" style="height:auto; max-width:80%">
            </div>
                    
                    
               <div class="product-detail" style="width:50%; margin:5px">
                  <h3>Product ID: {{$product->id}}</h3>
                  <h5>
                     {{$product->title}}
                  </h5>
                                
                  @if($product->discount_price > 0)
                  <h6>Discounted Price: <br> ${{$product->discount_price}}</h6>

                  <h6 style="text-decoration:line-through">
                     Price: <br> ${{$product->price}}
                  </h6>
                                
                  @else
                  <h6>
                     Price <br> ${{$product->price}}
                  </h6>
                  @endif
                                
                  <h6>Category:</h6>
                  <p>{{$product->catagory}}</p>
                  <h6>Quantity Available:</h6>
                  <p>{{$product->quantity}}</p>
                  <h6><b>Description:</b></h6>
                  <p>{{$product->description}}</p>

                  <form action="{{route('add_cart',$product->id)}}" method="post" style="margin:auto">
                  @csrf
                     <div class="row">
                           <div class="" style="padding-right:30px; padding-left:10px; padding-top:20px">
                              <input type="number" name="quantity" value="1" min="1" style="width:100px">
                           </div>
                           <div class="" style="padding-top:15px">
                              <input type="submit" value="Add to Cart">
                           </div>
                      </div>
                  </form>
                  
               </div>
               
         </div>
         


      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         </p>
      </div>
      
      <!-- jQery -->
      <script src="template/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="template/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="template/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="template/js/custom.js"></script>
   </body>
</html>