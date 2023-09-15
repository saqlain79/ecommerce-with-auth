
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

        @if(Session::has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{Session::get('message')}}
            </div>
        @endif
      
        <div style="text-align:center">
            
            <h1 class="form-group" style="font-size:30px">Cart</h1>
                <table class="table" style="width:60%; margin:auto; padding:10px">
                    <thead class="thead-light">
                        <tr>
                            <th>Product Title</th>
                            <th>Product Quantity</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        <?php $total = 0; ?>
                        @foreach($cart as $cart)
                        <tr style="text-align:center">
                            <td>{{$cart->product_title}}</td>
                            <td>{{$cart->quantity}}</td>
                            <td>${{$cart->price}}</td>
                            <td><img style="height:150px; width:150px" src="/product/{{$cart->image}}" alt=""></td>
                            <td>
                                <a onclick="return confirm ('Are you sure?')" href="{{route('delete_cart_item',$cart->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php $total = $total + $cart->price; ?>
                        @endforeach
                    </thead>
                </table>
                <div>
                    <h3 style="text-align:center; font-size:20px; padding:40px ">Total Price: ${{$total}}</h3>
                </div>

                <div style="padding:10px">
                    <h1 class="form-group" style="font-size:30px">Proceed to Order</h1>
                    <a href="{{route('cash_order')}}" class = "btn btn-danger">Cash On Delivery</a>
                    <a href="{{route('stripe',$total)}}" class = "btn btn-danger">Pay using Card</a>
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