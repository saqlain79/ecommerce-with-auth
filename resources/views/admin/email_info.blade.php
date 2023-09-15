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

            <div style="text-align:center; padding-top:40px">
                    <h1 class="form-group">Send Email to {{$order->email}}</h1>

                    <form action="{{route('send_user_mail',$order->id)}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="table-design">
                            <label for="">Email Greeting:</label>
                            <input class="input-design" type="text" name="greeting" placeholder="Write greeting" required="">
                        </div>
                        <div class="table-design">
                            <label for="">Email First line:</label>
                            <input class="input-design" type="text" name="firstline" placeholder="Write first line" required="">
                        </div>
                        <div class="table-design">
                            <label for="">Email Body:</label>
                            <input class="input-design" type="text" name="body" placeholder="Write body" required="">
                        </div>
                        <div class="table-design">
                            <label for="">Email Button Name:</label>
                            <input class="input-design" type="text" name="button" placeholder="Write button name" required="">
                        </div>
                        <div class="table-design">
                            <label for="">Email Email URL:</label>
                            <input class="input-design" type="text" name="url" placeholder="Write email url" required="">
                        </div>
                        <div class="table-design">
                            <label for="">Email Last Line:</label>
                            <input class="input-design" type="text" name="lastline" placeholder="Write last line" required="">
                        </div>
                        <div class="table-design">
                            <input type="submit" value="Send" class="btn btn-primary" style="margin:auto">
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