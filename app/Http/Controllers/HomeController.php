<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Comment;
use App\Models\Replies;

use Session;
use Stripe;

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype=Auth::user()->usertype;

        if($usertype=='1')
        {
            $total_product = product::all()->count();
            $total_order = order::all()->count();
            $total_user = user::all()->count();
            $comments = Comment::orderby('id','desc')->get();
            $reply = Replies::all();


            $order = order::all();
            $total_revenue = 0;
            foreach($order as $order)
            {
                $total_revenue = $total_revenue + $order->price;
            }

            $total_unpaid = order::where('payment_status', 'unpaid')->count();
            $total_delivered = order::where('delivery_status', 'delivered')->count();
            $total_processing = order::where('delivery_status', 'pending')->count();
            return view('admin.index',compact('total_product','total_order','total_user','total_revenue','total_unpaid','total_delivered','total_processing','comments','reply'));
        }
        else
        {
            $product = Product::paginate(3);
            $comments = Comment::orderby('id','desc')->get();
            $reply = Replies::all();
            return view('index', compact('product','comments','reply'));
            
        }
    }
    public function index()
    {
        $comments = Comment::orderby('id','desc')->get();
        $reply = Replies::all();
        $product = Product::paginate(3);
        return view('index', compact('product','comments','reply'));
    }

    public function product_details($id)
    {
        $product = Product::find($id);
        return view('home.product_details', compact('product'));
    }

    public function add_cart(Request $request,$id)
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $product = Product::find($id);
            $product_id_exist = cart::where('product_id',$id)->where('user_id',$userid)->get('id')->first();

            if($product_id_exist)
            {
                $cart = cart::find($product_id_exist)->first();
                $quantity = $cart->quantity;
                $cart->quantity = $quantity + $request->quantity;
                if($product->discount_price != 0)
                {
                    $cart->price = $product->discount_price * $cart->quantity;
                }
                else
                {
                    $cart->price = $product->price * $cart->quantity;
                }
                $cart->save();

                return redirect()->back()->with('message', 'Product Added to Cart');
            }
            else
            {
                $cart = new Cart();
                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->user_id = $user->id;

                $cart->product_title = $product->title;
                if($product->discount_price != 0)
                {
                    $cart->price = $product->discount_price * $request->quantity;
                }
                else
                {
                    $cart->price = $product->price * $request->quantity;
                }
                $cart->image = $product->image;
                $cart->product_id = $product->id;
                $cart->quantity = $request->quantity;

                $cart->save();
                return redirect()->back()->with('message', 'Product Added to Cart');
            }
        }
        else
        {
            return redirect()->route('login');
        }
        
    }

    public function view_cart()
    {
        if(Auth::id())
        {
            $id = Auth::user()->id;

            $cart = cart::where('user_id',$id)->get();
            return view('home.cart',compact('cart'));
        }
        else
        {
            return redirect()->route('login');
        }
        
    }

    public function delete_cart_item($id)
    {
        if(Auth::id())
        {
            $cart = Cart::find($id);
            $cart->delete();

            return redirect()->back();
        }
        else
        {
            return redirect()->route('login');
        }
        
    }

    public function cash_order()
    {
        
            $user = Auth::user();
            $userid = $user->id;

            $data = cart::where('user_id',$userid)->get();

            foreach($data as $data)
            {
                $order = new Order();
                $order->user_id = $data->user_id;
                $order->name = $data->name;
                $order->email = $data->email;
                $order->phone = $data->phone;
                $order->address = $data->address;

                $order->product_title = $data->product_title;
                $order->quantity = $data->quantity;
                $order->price = $data->price;
                $order->image = $data->image;
                $order->product_id = $data->product_id;

                $order->payment_status = 'unpaid';
                $order->delivery_status = 'pending';

                $order->save();

                $card_id = $data->id;
                $cart = Cart::find($card_id);
                $cart->delete();
            }

            return redirect()->back()->with('message', 'Product Ordered Successfully, Please wait for the confirmation call');

    }

    public function stripe($total)
    {
        return view('home.stripe',compact('total'));
    }

    public function stripePost(Request $request, $total)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $total * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for paying." 
        ]);

        $user = Auth::user();
            $userid = $user->id;

            $data = cart::where('user_id',$userid)->get();

            foreach($data as $data)
            {
                $order = new Order();
                $order->user_id = $data->user_id;
                $order->name = $data->name;
                $order->email = $data->email;
                $order->phone = $data->phone;
                $order->address = $data->address;

                $order->product_title = $data->product_title;
                $order->quantity = $data->quantity;
                $order->price = $data->price;
                $order->image = $data->image;
                $order->product_id = $data->product_id;

                $order->payment_status = 'Paid';
                $order->delivery_status = 'pending';

                $order->save();

                $card_id = $data->id;
                $cart = Cart::find($card_id);
                $cart->delete();
            }
      
        Session::flash('success', 'Payment successful!');
              
        return redirect('/');
    }

    public function show_order()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $order = order::where('user_id', $userid)->get();
            return view ('home.show_order',compact('order'));
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function cancel_order($id)
    {
        $order = order::find($id);
        $order -> delivery_status = 'canceled';
        $order->save();
        
        return redirect()->back();
    }

    public function add_comment(Request $request)
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            
            
            $comment = new Comment;
            $comment->name = $user->name;
            $comment->user_id = $userid;
            $comment->comment = $request->comment;

            $comment->save();

            return redirect()->back();
            
        }
        else{
            return redirect()->route('login');
        }
    }

    public function add_reply(Request $request)
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid= $user->id;
            $reply = new Replies;
            $reply->user_id = $userid;
            $reply->name = $user->name;
            $reply->comment_id = $request->CommentId;
            $reply->reply = $request->reply;

            $reply->save();
            return redirect()->back();

        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function product_search(Request $request)
    {
        $comments = Comment::orderby('id','desc')->get();
        $reply = Replies::all();
        $search_text = $request->search;

        $product = Product::where('title','LIKE',"%$search_text%")->orWhere('catagory','LIKE',"$search_text")->paginate(10);

        return view('home.userpage',compact('product','comments','reply'));
    }

    public function product_page()
    {
        $comments = Comment::orderby('id','desc')->get();
        $reply = Replies::all();
        $product = Product::paginate(3);
        return view('home.product_page',compact('product','comments','reply'));
    }

    public function search_pr(Request $request)
    {
        $comments = Comment::orderby('id','desc')->get();
        $reply = Replies::all();
        $search_text = $request->search;

        $product = Product::where('title','LIKE',"%$search_text%")->orWhere('catagory','LIKE',"$search_text")->paginate(10);

        return view('home.product_page',compact('product','comments','reply'));
    }
    public function access_deny()
    {
        return view('admin.access_deny');
    }

}
