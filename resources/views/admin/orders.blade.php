<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

            <h1 class="form-group" style="text-align:center; font-size:25px;">All Orders</h1>

            <div class="div_center" style="text-align:center; padding-bottom:15px">
                    <form action="{{route('search')}}" method="get">
                        @csrf
                        <input class="input-box" type="text" name="search" placeholder="Search Something">
                        <button class="btn btn-info" type="submit">Search</button>
                    </form>
                </div>
                
                <table class="table table-sm">
                    <thead class="thead-light" style="text-align:center">
                        <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Product ID</th>
                        <th scope="col">Product Title</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Delivery Status</th>
                        <th scope="col">Delivery Action</th>
                        <th scope="col">Print PDF</th>
                        <th scope="col">Send Email</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($order as $order)
                        <tr style="text-align:center; color:#f5f5f5;">
                            <td>{{$order->id}}</td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->product_id}}</td>
                            <td>{{$order->product_title}}</td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->payment_status}}</td>
                            <td>{{$order->delivery_status}}</td>
                            <td>
                                @if($order->delivery_status == 'pending')
                                <a href="{{route('delivered',$order->id)}}" onclick="return confirm('Confirm delivery?')" class="btn btn-primary">Confirm</a>
                                @else
                                <p>Confirmed</p>

                                @endif
                            </td>
                            <td>
                              <a href="{{route('print_pdf',$order->id)}}" class="btn btn-secondary">Download</a>
                            </td>
                            <td>
                              <a href="{{route('send_email',$order->id)}}" class="btn btn-info">Send</a>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="50" class="text-center text-danger">No Data Available</td>
                        </tr>
                       @endforelse
                    </tbody>
                </table>
            
              







            
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.script')
  </body>
</html>