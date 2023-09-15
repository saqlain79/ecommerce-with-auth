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

                @if(Session::has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{Session::get('message')}}
                    </div>
                @endif

                <h1 style="text-align:center">Product Table</h1>
                
                <table class="center">
                <table class="table">
                    <thead class="thead-light" style="text-align:center">
                        <tr>
                        <th scope="col">Number</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Catagory</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Discount Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $item)
                        <tr style="text-align:center; color:#f5f5f5;">

                        <td>{{$item->id}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->catagory}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->discount_price}}</td>
                        <td>
                            <img style="height:150px; width:150px" src="/product/{{$item->image}}" alt="">
                        </td>
                        <td><a class="btn btn-primary" href="{{route('update_product',$item->id)}}">Edit</a>
                        <a onclick="return confirm ('Are you sure?')" class="btn btn-danger" href="{{route('delete_product',$item->id)}}">Delete</a></td>
                        
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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