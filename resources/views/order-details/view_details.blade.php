@extends('admin.layouts.layout')
@section('content')

<h1 style="margin-top:5%; text-align:center;">View Orders Deatails</h1>

<div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
              <tr>
                  <th>id</th>
                  <th>Product_id</th>
                  <th>Total_Product</th>
                  <th>Price</th>
                  <th>Total_price</th>
                  <th>Images</th>
                 
                  
              </tr>
          </thead>
          <tbody>
          
              <tr  class="odd gradeX">
                @foreach($order->orderitems as $orderitem)
                    <td>{{$orderitem->order_id}}</td>
                    <td>{{$orderitem->product_id}}</td>
                    <td>{{$orderitem->quantity}}</td>
                    <td>{{$orderitem->price}}</td>
                    <td>{{$orderitem->total_price}}</td>
                    <!-- <td>{{$orderitem->product->image}}</td> -->
                    <td><img src="{{asset('admin/images/'.$orderitem->product->image)}}" alt="Avatar" style="width:10%"></td>
                        
                @endforeach
              </tr>
          </tbody>
      </table>
</div> 
@endsection                
                  
          

            






