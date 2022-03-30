@extends('admin.layouts.layout')
@section('content')
<h1 style="margin-top:5%; text-align:center;">View Orders</h1>

<div style="margin-top:3%;">
<div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
              <tr>
                  <th>Name</th>
                  <th>E mail</th>
                  <th>id</th>
                  <th>user_id</th>
                  <th>Total Product</th>
                  <th>Price</th>
                  <th>Action</th>
                  
              </tr>
          </thead>
        <tbody>
            @foreach($orders as $order)
              <tr  class="odd gradeX">
                    <td>{{$order->user->name}}</td> 
                    <td>{{$order->user->email}}</td>
                    <td>{{$order->id}}</td>
                    <td>{{$order->user_id}}</td>
                    <td>{{$order->total_products}}</td>
                    <td>{{$order->price}}</td>
                    <td><a href="{{route('view-details', $order->id)}}" class="btn btn-success">View Details</a></td>
                </tr>
            @endforeach
        </tbody>
      </table>
</div> 
</div>
@endsection
               
                  

