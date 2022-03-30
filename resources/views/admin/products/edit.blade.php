@extends('admin.layouts.layout')
@section('content')
    <div style="margin-top:5%;">
        <div class="panel-body">
            <h1>Edit Products</h1>
            <form action="{{route('products.update',$products)}}" method="post" enctype= multipart/form-data>
              
            @csrf
            @method('PUT')
                                  
                <div class="row">
                    <div class="col-lg-6">

                        <div class="form-group">
                            <label>Enter Name</label>
                            <input class="form-control" name="name" palceholder="Enetr name"value="{{$products->name}}">
                            
                        </div>

                        <div class="form-group">
                            <label>Enter tittle</label>
                            <input class="form-control" name="tittle" palceholder="Enetr tittle" value="{{$products->tittle}}">
                            
                        </div>

                        <div class="form-group">
                            <label>Enter Description</label>
                            <input class="form-control" placeholder="Enter description" name="description" value="{{$products->description}}">
                        </div>

                        <div class="form-group">
                            <label>Enter Category_id</label>
                            <input class="form-control" placeholder="Enter category_id" name="category_id" value="{{$products->category_id}}">
                        </div>

                        <div class="form-group">
                            <label>Enter Price</label>
                            <input class="form-control" placeholder="Enter price" name="price" value="{{$products->price}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="custom-fie-lable">File input</label>
                            <input type="file" name="image"class="custom-file-input" value="{{$products->image}}">
                            <img src="{{asset('admin/images/'.$products->image)}}" alt="Avatar" style="width:10%">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>    
            </form>
        </div>  
    </div>             

@endsection