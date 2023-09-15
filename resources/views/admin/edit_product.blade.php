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

                <div class="div_center" style="text-align:center; padding-top:40px">
                    <h2>Update Product</h2>

                    <form action="{{route('update_product_confirm',$product->id)}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="table-design">
                            <label for="">Product Title</label>
                            <input type="text" name="title" placeholder="Write a title" required="" value="{{$product->title}}">
                        </div>
                        <div class="table-design">
                            <label for="">Product Description</label>
                            <input type="text" name="description" placeholder="Write a description" required="" value="{{$product->description}}">
                        </div>
                        <div class="table-design">
                            <label for="">Product Catagory</label>
                            <select name="catagory" id="" required="">
                                <option value="{{$product->catagory}}" selected="">{{$product->catagory}}   
                                </option>
                                @foreach($catagory as $item)
                                <option value="{{$item->catagory_name}}">{{$item->catagory_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="table-design">
                            <label for="">Product Quantity</label>
                            <input type="number" name="quantity" placeholder="Write an amount" required="" value="{{$product->quantity}}">
                        </div>
                        <div class="table-design">
                            <label for="">Price</label>
                            <input type="number" name="price" placeholder="Write an amount" required="" value="{{$product->price}}">
                        </div>
                        <div class="table-design">
                            <label for="">Discounted Price</label>
                            <input type="number" name="discount_price" placeholder="Write an amount" value="{{$product->discount_price}}">
                        </div>
                        <div class="table-design">
                            <label for="">Image</label>
                            <img src="/product/{{$product->image}}" alt="" style="width: 100px; height: 100px">
                        </div>
                        <div class="table-design">
                            <label for="">Change Product Image</label>
                            <input type="file" name="image" value="{{$product->image}}">
                        </div>
                        <div class="table-design">
                            <input type="submit" value="Submit" class="submit-button">
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