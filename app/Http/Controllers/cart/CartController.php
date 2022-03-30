<?php

namespace App\Http\Controllers\cart;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Models\product;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;

// use Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products = Product::all();
        // return view('stripe.products',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    { 
        
        $product = Product::find($id);
        
        $cart = session()->get('new_cart');
        
        
        // cart is not empty
        if($cart){
            
            
        
            // if cart has same product
            $already = 0;
            foreach($cart as $key => $value){

                if($key == $product->id){
                    $already = 1;
                    $cart[$id] = [
                        "image"=>$product->image,
                        "name"=>$product->name,
                        "product_id"=>$product->id,
                        "price"=>$product->price,
                        "quantity" => $value['quantity'] + 1,
                    ]; 
                }
            }
            if(! $already){
                $cart[$id] = [
                    "image"=>$product->image,
                    "name"=>$product->name,
                    "product_id"=>$product->id,
                    "price"=>$product->price,
                    "quantity" => 1,
                ];
            }

        }else{
            $cart[$id] = [
                "image"=>$product->image,
                "name"=>$product->name,
                "product_id"=>$product->id,
                "price"=>$product->price,
                "quantity" => 1,
            ];
        }
        session()->put('new_cart', $cart);
        // Session::flash('message', 'product add to cart'); 
       
        return redirect()->back()->with('success', 'Product added to cart successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->session()->put( 'new_cart');

        return redirect('index');


        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $request->session()->forget('new_cart');

        
        return redirect('index');
        
    }

    
    
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
       $response =  Stripe\Charge::create ([

                    "amount" => $request->price * 100,
                    "currency" => "usd",
                    "source" => $request->stripeToken,
                    "description" => "payment from ali raza."
        ]);
        if($response->status == 'succeeded'){
            $cart = session()->get('new_cart');
            $order = Order::create([
                'user_id'=>Auth::user()->id,
                'total_products'=>count($cart),
                'price'=>$request->price,
            ]);
            foreach($cart as $key => $value){
                OrderItem::create([
                    'order_id'=>$order->id,
                    'product_id'=>$value['product_id'],
                    'quantity'=>$value['quantity'],
                    'price'=>$value['price'],
                    'total_price'=>$value['price'] * $value['quantity'],
                ]);
                    
            }
            $request->session()->forget('new_cart');
            
            Session::flash('success', 'Payment successful!');
         
        }else{
            Session::flash('error', 'Payment error please try again!');
            
        }
       return redirect('index');
        
    }

    
    public function stripeblade()
    {
        return view('stripe.stripe');
    }


    
    public function orders()
    {  
        $orders = Order::with('user')->get();
        return view('order-details.order',compact('orders'));
    
    }
    
    public function display($id)
    {
        $order = Order::with('orderitems')->find($id);
        
         return view('order-details.view_details',compact('order'));
                
    }
    
    
   

    
}
