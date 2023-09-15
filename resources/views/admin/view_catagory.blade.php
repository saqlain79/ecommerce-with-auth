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
                    <h1 class="form-group">Add Catagory</h1>

                    <form action="{{route('add_catagory')}}" method="post">
                        @csrf

                        <input class="input-box" type="text" name="catagory" placeholder="Write Catagory name">

                        <button class="btn btn-primary" type="submit">Add</button>

                    </form>
                </div>
                
                <table class="center">
                <table class="table">
                    <thead class="thead-light" style="text-align:center">
                        <tr>
                        <th scope="col">Sl.</th>
                        <th scope="col">Catagory Name</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $data)
                        <tr style="text-align:center; color:#f5f5f5;">

                        <td>{{$data->id}}</td>
                        <td>{{$data->catagory_name}}</td>
                        <td><a class="btn btn-primary" href="#">Edit</a>
                        <a onclick="return confirm ('Are you sure?')" class="btn btn-danger" href="{{route('delete_catagory',$data->id)}}">Delete</a></td>
                        
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