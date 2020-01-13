@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header bg-success ">
                        Add Product Form
                    </div>

                    <div class="card-body">

                        <table class="table table-bordered">

                                        @if(session('deletestatus'))

                                            <div class="alert alert-danger">

                                                {{session('deletestatus')}}

                                            </div>

                                        @endif



                                    <thead>

                                        <tr>
                                            <th>SL. NO </th><th>Category Name </th><th> Menu Status </th>
                                            <th> Created at </th>  <th> Action </th>
                                        </tr>

                                    </thead>


                                    <tbody>
                                      @forelse($categories as $category)
                                          <tr>

                                              <td> {{$loop->index + 1}}</td>
                                              <td> {{$category->category_name}} </td>

                                              <td> {{($category->menu_status == 1) ? "YES" : "NO"}} </td>

                                          <td> {{$category->created_at->format('D-m-Y h:i:s A')}}
                                              <br>

                                              {{$category->created_at->diffForHumans()}}

                                              </td>
                                              <td> <a href="{{url('change/menu/status')}}/{{$category->id}}" type = 'button' class='btn btn-sm btn-info'> Change </a>

                                      @empty

                                          <tr class="text-center">

                                              <td colspan="7">No Data Available</td>
                                          </tr>

                                      @endforelse

                                    </tbody>

                        </table>



                    </div>
                </div>




            </div>


            <div class="col-4">
                <div class="card">
                    <div class="card-header bg-success ">
                        Add Category Form
                    </div>

                    <div class="card-body">

                    @if($errors->all())
                        <div class="alert-danger">
                            @foreach($errors->all() as $error)
                                <li> {{$error}}</li>
                            @endforeach


                        </div>
                    @endif


                        <form action="{{url('add/category/insert')}}" method="post">

                            @csrf()
                            @if(session('status'))

                                <div class="alert alert-success">

                                    {{session('status')}}

                                </div>

                            @endif

                                <div class="form-group">
                                    <label for="usr">Category Name </label>
                                    <input type="text" class="form-control" placeholder="Enter Category name" name="category_name" value="{{old('category_name')}}">
                                </div>
                                <div class="form-group">

                                    <input type="checkbox"  name="menu_status" value="1" id="menu">   <label for="menu">Make as menu </label>
                                </div>


                            <button type="submit" class="btn btn-primary">Add Category</button>


                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
