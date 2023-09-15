<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Catagory;
use App\Models\Product;
use App\Models\Order;
use PDF;
use Notification;
use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{
    public function admin()
    {
        $user = user::all();
        return view('admin.index',compact('user'));
    }

    public function view_catagory()
    {
        if(auth::id())
        {
            $usertype=Auth::user()->usertype;

            if($usertype=='1')
            {
                $data = Catagory::all();
                return view('admin.view_catagory', compact('data'));
            }
            else
            {
                return redirect('access_deny');
            }
        }
        else
        {
            return redirect('login');
            
        }
    }

    public function add_catagory(Request $request)
    {
        $data = new Catagory();
        $data->catagory_name = $request->catagory;
        $data->save();

        return redirect()->back()->with('message', 'Catagory Added Successfully');
    }

    public function delete_catagory($id)
    {
        if(auth::id())
        {
            $usertype=Auth::user()->usertype;
            if($usertype=='1')
            {
                $data = Catagory::find($id);
                $data->delete();

                return redirect()->back()->with('message', 'Catagory Deleted Successfully');
            }
            else
            {
                return redirect('access_deny');
            }
        }
        else
        {
            return redirect('login');
        }
        
    }

    public function view_product()
    {
        if(auth::id())
        {
            $usertype=Auth::user()->usertype;
            if($usertype=='1')
            {
                $catagory = catagory::all();
                return view('admin.product',compact('catagory'));
            }
            else
            {
                return redirect('access_deny');
            }
        }
        else
        {
            return redirect('login');
        }
    }

    public function add_product(Request $request)
    {
        $product = new Product();

        $product->title = $request->title;
        $product->description = $request->description;
        $product->catagory = $request->catagory;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;

        $image = $request->image;

        $imagename = time().'.'.$image->getClientOriginalExtension();

        $request->image->move('product', $imagename);

        $product->image = $imagename;

        $product->save();

        return redirect()->back()->with('message', 'Product Added Successfully');
    }

    public function show_product()
    {
        if(auth::id())
        {
            $usertype=Auth::user()->usertype;
            if($usertype=='1')
            {
                $product = Product::all();
                return view('admin.show_product', compact('product'));
            }
            else
            {
                return redirect('access_deny');
            }
            
        }
        else
        {
            return redirect('login');
        }
        
    }

    public function delete_product($id)
    {
        if(auth::id())
        {
            $usertype=Auth::user()->usertype;
            if($usertype=='1')
            {
                $product = Product::find($id);
                $product->delete();

                return redirect()->back()->with('message', 'Product Deleted Successfully');
            }
            else
            {
                return redirect('access_deny');
            }
        }
        else
        {
            return redirect('login');
        }
    }

    public function update_product($id)
    {
        if(auth::id())
        {
            $usertype=Auth::user()->usertype;
            if($usertype=='1')
            {
                $product = Product::find($id);
                $catagory = Catagory::all();

                return view('admin.edit_product',compact('product','catagory'));
            }
            else
            {
                return redirect('access_deny');
            }
        }
        else
        {
            return redirect('login');
        }
        
    }

    public function update_product_confirm(Request $request, $id)
    {
        $product = Product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->catagory = $request->catagory;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;

        $image = $request->image;

        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('product', $imagename);

            $product->image = $imagename;

        }

        $product->save();

        return redirect('/show_product')->with('message', 'Product Updated Successfully');

    }

    public function view_order()
    {
        if(auth::id())
        {
            $usertype=Auth::user()->usertype;
            if($usertype=='1')
            {
                $order = Order::all();
                return view('admin.orders',compact('order'));
            }
            else
            {
                return redirect('access_deny');
            }
        }
        else
        {
            return redirect('login');
        }
    }

    public function delivered($id)
    {
        if(auth::id())
        {
            $usertype=Auth::user()->usertype;
            if($usertype=='1')
            {
                $order = Order::find($id);
                $order->delivery_status = 'Delivered';
                $order->payment_status = 'Paid';
                $order->save();

            return redirect()->back();
            }
            else
            {
                return redirect('access_deny');
            }
        }
        else
        {
            return redirect('login');
        }
        
    }

    public function print_pdf($id)
    {
        if(auth::id())
        {
            $usertype=Auth::user()->usertype;
            if($usertype=='1')
            {
                $order=Order::find($id);

                $invoicenumber = time().''.$order->id;

                $pdf = PDF::loadView('admin.pdf',compact('order','invoicenumber'));

                return $pdf->download('invoice.pdf');
            }
            else
            {
                return redirect('access_deny');
            }
        }
        else
        {
            return redirect('login');
        }
        
    }

    public function send_email($id)
    {
        if(auth::id())
        {
            $usertype=Auth::user()->usertype;
            if($usertype=='1')
            {
                $order=Order::find($id);
                return view('admin.email_info',compact('order'));
            }
            else
            {
                return redirect('access_deny');
            }
            
        }
        else
        {
            return redirect('login');
        }
        
    }

    public function send_user_mail(Request $request, $id)
    {
        $order=Order::find($id);

        $details=[
            'greeting'=>$request->greeting,
            'firstline'=>$request->firstline,
            'body'=>$request->body,
            'button'=>$request->button,
            'url'=>$request->url,
            'lastline'=>$request->lastliine
        ];

        Notification::send($order, new SendEmailNotification($details));

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $searchtext = $request->search;
        $order = Order::where('name', 'LIKE', "%$searchtext%")->orWhere('email', 'LIKE', "%$searchtext%")->orWhere('product_title', 'LIKE', "%$searchtext%")->get();

        return view('admin.orders', compact('order'));
    }

    public function access_deny()
    {
        return view('admin.access_deny');
    }

    
    
}
