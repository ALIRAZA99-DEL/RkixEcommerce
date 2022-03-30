@extends('admin.layouts.layout')
@section('content')
    <div style="margin-top:5%;">
    <div class="panel-body">
        <h1>Edit Data</h1>
        <form action="{{route('categories.update',$categories)}}" method="post" enctype= multipart/form-data>
        
        @csrf 
        @method('PUT')                               
            <div class="col-lg-6">
                
                    <div class="form-group">
                        <label>Enter Name</label>
                        <input class="form-control" name="name" palceholder="Enetr name" value="{{$categories->name}}">
                        
                    </div>
                    <div class="form-group">
                        <label>Enter Description</label>
                        <input class="form-control" placeholder="Enter description" name="description" value="{{$categories->description}}">
                    </div>
                    
                    <div class="form-group">
                        <label for="custom-fie-lable">File input</label>
                        <input type="file" name="image"class="custom-file-input" value="{{$categories->image}}">
                        <img src="{{asset('admin/images/'.$categories->image)}}" style="height:60px;width:60px"  alt="">   
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
        </div>
        </form>
        </div>           

@endsection()
