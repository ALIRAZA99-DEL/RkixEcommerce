@extends('admin.layouts.layout')
@section('content')
    <div style="margin-top:5%;">
    <div class="panel-body">
        <h1>Add Data</h1>
        <form action="{{route('index.store')}}" method="post" enctype= multipart/form-data>
        @csrf                                
        <div class="row">
                <div class="col-lg-6">
                    
                        <div class="form-group">
                            <label>Enter Name</label>
                            <input class="form-control" name="name" palceholder="Enetr name">
                            
                        </div>

                        <div class="form-group">
                            <label>Enter tittle</label>
                            <input class="form-control" name="tittle" palceholder="Enetr tittle">
                            
                        </div>

                       

                        <div class="form-group">
                            <label>Enter Description</label>
                            <textarea class="form-control" placeholder="Enter description" name="description"></textarea>
                        </div>

                        
                        
                        <div class="form-group">
                            <label>Enter Price</label>
                            <input class="form-control" placeholder="Enter price" name="price" id="price">
                            
                        </div>

                        
                        <div class="form-group">
                            <label for="custom-fie-lable">File input</label>
                            <input type="file" name="image"class="custom-file-input">
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div> 

        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $("#price").bind("keypress", function (e) {
                        var keyCode = e.which ? e.which : e.keyCode
                        if (!(keyCode >= 48 && keyCode <= 57)) {
                            $(".error").css("display", "inline");
                            return false;
                        }else{
                            $(".error").css("display", "none");
                        }
                });
            });
        </script>

@endsection