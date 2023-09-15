
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
            <h1 class="form-group" style="font-size:30px">Order</h1>
            <table class="table" style="width:60%; margin:auto; padding:10px">
                <thead class="thead-light">
                <tr>
                    <th>Product Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                @foreach($order as $order)
                <tr>
                    <td>{{$order->product_title}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->payment_status}}</td>
                    <td>{{$order->delivery_status}}</td>
                    <td>
                        <img src="product/{{$order->image}}" height="100px" width="100px">
                    </td>
                    <td>
                        @if($order->delivery_status == 'pending')
                        <a onclick="return confirm('Are you sure?')" href="{{route('cancel_order',$order->id)}}" class="btn btn-danger">Cancel Item</a>
                        @else
                        <p>Not Allowed</p>
                        @endif
                    </td>
                </tr>
                @endforeach
                </thead>
            </table>
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