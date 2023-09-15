<!DOCTYPE html>
<html>
   <head>
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         @include('home.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
      @include('home.why')
      <!-- end why section -->
      
      <!-- arrival section -->
      @include('home.arrival')
      <!-- end arrival section -->
      
      <!-- product section -->
      @include('home.product')
      <!-- end product section -->
      <!-- Comment Section start -->
         <div style="padding:20px; margin:auto; width:70%;">
                  <div style="padding-top:20px; width:100%">
                     <h4>Comments</h4>
                     <form action="{{route('add_comment')}}" method="post">
                        @csrf
                        <textarea name="comment" cols="30" rows="5" placeholder="Comment Here"></textarea>
                        <input type="submit" value="Comment">
                     </form>
                  </div>
                  <br>
                  <div style="padding-left:50px">
                     <h3 style="">All Comments</h3>
                     @foreach($comments as $comment)
                     <div>
                        <b>{{$comment->name}}</b>
                        <p>{{$comment->comment}}</p>
                        <a style="color:blue" href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>
                        @foreach($reply as $replies)
                        @if($replies->comment_id == $comment->id)
                        <div style="padding-left:30px; padding-bottom:10px; padding-top:10px">
                           <b>{{$replies->name}}</b>
                           <p>{{$replies->reply}}</p>
                           <a style="color:blue" href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>
                        </div>
                        @endif
                        @endforeach
                     </div>
                     @endforeach
                  </div>
                  <div class="replyDiv" style="padding-top:20px;        padding-right:20px; padding-bottom:20px; display:none">
                     <form action="{{route('add_reply')}}" method="post">
                        @csrf
                     <input type="text" id="CommentId" name="CommentId" hidden="">
                     <textarea placeholder="Write here!" name="reply"></textarea>
                     <br>
                     <button type="submit" class="btn btn-info" style="color:black">Reply</button>
                     <a href="javascript::void(0);" class="btn btn-warning" onClick="reply_close(this)">Close</a>
                     </form>
                  </div>
                  
         </div>
      <!-- comment section ends -->
      <!-- subscribe section -->
      @include('home.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
      @include('home.client')
      <!-- end client section -->
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <!-- <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         </p>
      </div> -->
      <script type="text/javascript">
         function reply(caller)
         {
            document.getElementById('CommentId').value=$(caller).attr('data-CommentId');
            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
         }
         function reply_close(caller)
         {
            $('.replyDiv').hide();
         }
      </script>
      <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
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