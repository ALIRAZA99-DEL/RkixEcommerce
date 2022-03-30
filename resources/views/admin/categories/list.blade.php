@extends('admin.layouts.layout')
@section('content')


<h1 style="margin-top:5%; text-align:center;">View Category</h1>

  
  <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>Counts</th>
                                                    <th>Images</th>
                                                    <th>Actions</th>
                                                    <th>Actions</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($categories as $category)
                                                <tr  class="odd gradeX">
                                                    <td>{{$category->id}}</td>
                                                    <td>{{$category->name}}</td>
                                                    <td>{{$category->description}}</td>
                                                    <td>{{$category->id}}</td>
                                                    <td><img src="{{asset('admin/images/'.$category->image)}}" alt="Avatar" style="width:10%"></td>

                                                    
                                                        <!-- <a href="" class="btn btn-danger">delete</a> -->
                                                    <td>
                                                        <form method="POST" action="{{route('categories.destroy', $category)}}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}

                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-danger delete-user" value="Delete">
                                                            </div>
    </form>
                                                    </td>
                                                    <td>
                                                       
                                                        <a href="{{route('categories.edit',$category)}}"   class="btn btn-success">edit</a>
                                                    </td>
                                            @endforeach
      
                                                </tr>
                                            </tbody>
                                        </table>


</div>



@endsection()