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

                <div>
                    <h1 class="form-group" style="text-align:center; font-size:30px">Add Product</h1>

                    <form action="{{route('add_product')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="table-design">
                            <label for="">Product Title</label>
                            <input class="input-design" type="text" name="title" placeholder="Write a title" required="">
                        </div>
                        <div class="table-design">
                            <label for="">Product Description</label>
                            <input class="input-design" type="text" name="description" placeholder="Write a description" required="">
                        </div>
                        <div class="table-design">
                            <label for="">Product Catagory</label>
                            <select class="input-design" name="catagory" id="" required="">
                                <option value="" selected="">Select a catagory</option>
                                @foreach($catagory as $item)
                                <option value="{{$item->catagory_name}}">{{$item->catagory_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="table-design">
                            <label for="">Product Quantity</label>
                            <input class="input-design" type="number" name="quantity" placeholder="Write an amount" required="">
                        </div>
                        <div class="table-design">
                            <label for="">Price</label>
                            <input class="input-design" type="number" name="price" placeholder="Write an amount" required="">
                        </div>
                        <div class="table-design">
                            <label for="">Discounted Price</label>
                            <input class="input-design" type="number" name="discount_price" placeholder="Write an amount">
                        </div>
                        <div class="table-design">
                            <label for="">Product Image</label>
                            <input type="file" name="image">
                        </div>
                        <div class="table-design">
                            <input type="submit" value="Submit" class="btn btn-primary" style="margin:auto">
                        </div>
                    </form>
                </div>
                
            
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