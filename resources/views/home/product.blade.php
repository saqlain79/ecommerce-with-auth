<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div style="padding-bottom:20px">
               <form action="{{route('search_pr')}}" method="get">
                  @csrf
                  <input type="text" name="search" placeholder="search here">
                  <input type="submit" value="search">
               </form>
            </div>
            @if(Session::has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{Session::get('message')}}
                    </div>
                @endif
            <div class="row">
               @foreach($product as $p)
               <div class="col-md-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{route('product_details',$p->id)}}" class="option1">
                           Details
                           </a>
                           <!-- check video 12 for Auth codes -->
                           <form action="{{route('add_cart',$p->id)}}" method="post" style="margin:auto">
                              @csrf
                              <div class="row">
                                 <div class="col-md-4">
                                    <input type="number" name="quantity" value="1" min="1" style="width:100px">
                                 </div>
                                 <div class="col-md-4">
                                    <input type="submit" value="Add to Cart">
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="/product/{{$p->image}}" alt="" style="width:200px; height:200px">
                     </div>
                     <div class="detail-box">
                        <h5 style="margin:5px">
                           {{$p->title}}
                        </h5>
                        
                        @if($p->discount_price > 0)
                           <h6>Discount Price <br> ${{$p->discount_price}}</h6>

                           <h6 style="text-decoration:line-through; padding-left:5px">
                              Price <br> ${{$p->price}}
                           </h6>
                        
                        @else
                        <h6>
                           Price <br> ${{$p->price}}
                        </h6>
                        @endif
                     </div>
                  </div>
               </div>
               @endforeach
               <br>
               
               <span style="padding-top:20px">
               {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
               </span>
               
            </div>
            <!-- <div class="btn-box">
               <a href="">
               View All products
               </a>
            </div> -->
         </div>
      </section>