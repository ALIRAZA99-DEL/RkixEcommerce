@extends('admin.layouts.layout')
@section('content')
    <div style="margin-top:5%;">
       <div class="panel-body">
        <h1>Add Data</h1>
            <form action="{{route('categories.store')}}" method="post" enctype= multipart/form-data>
            @csrf                                
        <div class="row">
                <div class="col-lg-6">
                    
                        
                        <div class="form-group">
                            <label>Enter Name</label>
                            <input class="form-control" name="name" palceholder="Enetr name">
                            
                        </div>
                        <div class="form-group">
                            <label>Enter Description</label>
                            <textarea class="form-control" placeholder="Enter description" name="description"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="custom-fie-lable">File input</label>
                            <input type="file" name="image"class="custom-file-input" accept="image/x-png,image/gif,image/jpeg">
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
        </div>
            </form>
    </div>           

@endsection()