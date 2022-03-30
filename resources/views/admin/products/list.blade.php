@extends('admin.layouts.layout')
@section('content')


<h1 style="margin-top:5%; text-align:center;">View Products</h1>

  
  <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Tittle</th>
                    <th>Description</th>
                    <th>category</th>
                    <th>Price</th>
                    <th>Images</th>
                    <th>Actions</th>
                    <th>Actions</th>
                    
                </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr  class="odd gradeX">
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->tittle}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->category_id}}</td>
                    <td>{{$product->price}}</td>
                    <td><img src="{{asset('admin/images/'.$product->image)}}" alt="Avatar" style="width:10%"></td>
                    
                        
                    <td>
                        <form method="POST" action="{{route('products.destroy', $product)}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <div class="form-group">
                                <input type="submit" class="btn btn-danger delete-user" value="Delete ">
                            </div>
                        </form>
                    </td>
                    <td>
                        
                        <a href="{{route('products.edit',$product)}}"   class="btn btn-success">edit</a>
                    </td>
                    
            @endforeach

                </tr>
            </tbody>
        </table>


</div>



@endsection()