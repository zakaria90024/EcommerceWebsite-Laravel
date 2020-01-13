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
                                            <th>SL. NO </th><th>Product Name </th><th> Category name</th><th>Product Discreption </th> <th>Product Price </th> <th>Product Quantity  </th> <th>Alart Quantity </th><th>Product Image</th><th>Action</th>

                                        </tr>

                                    </thead>


                                    <tbody>
                                            @forelse($products as $product)
                                                <tr>

                                                    <td> {{$loop->index + 1}}</td>
                                                    <td> {{$product->product_name}} </td>
                                      {{--App\Category::find($product->category_id)->category_name--}}
                                                    <td>{{$product->relationtocategory->category_name ?? null }}</td>

                                                    <td> {{str_limit($product->product_discreption, 20)}} </td>
                                                    <td> {{$product->product_price}} </td>
                                                    <td> {{$product->product_quantity}} </td>
                                                    <td> {{$product->alart_quantity}} </td>

                                                    <td>
                                                        <img src="{{asset('uploads/product_photo')}}/{{$product->product_image}}" alt="Not found" width="50">

                                                    </td>

                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="{{url('/delete/product')}}/{{$product->id}}" class="btn btn-sm btn-danger"> Delete </a>
                                                        <a href="{{url('/edit/product')}}/{{$product->id}}" class="btn btn-sm btn-warning"> Edit</a>

                                                        </div>
                                                    </td>

                                                </tr>
                                            @empty
                                                <tr class="text-center">

                                                    <td colspan="7">No Data Available</td>
                                                </tr>

                                            @endforelse
                                    </tbody>

                        </table>

                        {{$products->links()}}

                    </div>
                </div>



                <div class="card mt-3">
                    <div class="card-header bg-danger">
                        Deleted Product Form
                    </div>

                    <div class="card-body mb-3">

                        <table class="table table-bordered">

                            @if(session('deletestatus'))

                                <div class="alert alert-danger">

                                    {{session('deletestatus')}}

                                </div>

                            @endif



                            <thead>

                            <tr>
                                <th>SL. NO </th><th>Product Name </th><th>Product Discreption </th> <th>Product Price </th> <th>Product Quantity  </th> <th>Alart Quantity </th><th>Action</th>
                            </tr>

                            </thead>


                            <tbody>

                            @forelse($deleted_products as $deleted_product)
                                <tr>

                                    <td> {{$loop->index + 1}}</td>
                                    <td> {{$deleted_product->product_name}} </td>
                                    <td> {{str_limit($deleted_product->product_discreption, 20)}} </td>
                                    <td> {{$deleted_product->product_price}} </td>
                                    <td> {{$deleted_product->product_quantity}} </td>
                                    <td> {{$deleted_product->alart_quantity}} </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">

                                            <a href="{{url('/restore/product')}}/{{$deleted_product->id}}" class="btn btn-sm btn-success"> Restore </a>
                                            <a href="{{url('/permanent/delete/product')}}/{{$deleted_product->id}}" class="btn btn-sm btn-danger"> Parmanent Delete</a>


                                        </div>
                                    </td>

                                </tr>
                            @empty

                                <tr class="text-center">

                                    <td colspan="7">No Data Available</td>
                                </tr>

                            @endforelse
                            </tbody>

                        </table>

                        {{$products->links()}}

                    </div>



                </div>


            </div>


            <div class="col-4">
                <div class="card">
                    <div class="card-header bg-success ">
                        Add Product Form
                    </div>

                    <div class="card-body">

                    @if($errors->all())
                        <div class="alert-danger">
                            @foreach($errors->all() as $error)
                                <li> {{$error}}</li>
                            @endforeach


                        </div>
                    @endif


                        <form action="{{url('add/product/insert')}}" method="post" enctype="multipart/form-data">

                            @csrf()


                                @if(session('status'))

                                    <div class="alert alert-success">

                                        {{session('status')}}

                                    </div>

                                @endif



                                <div class="form-group">
                                    <label for="usr">Product Name </label>
                                    <input type="text" class="form-control" name="product_name" value="{{old('product_name')}}">
                                </div>



                                <div class="form-group">
                                    <label for="usr">Category Name</label>
                                    <select class="form-control" name="category_id" >
                                        <option name=''>-Select one-</option>

                                    @foreach ($categories as $category)

                                      <option value="{{$category->id}}">{{$category -> category_name }} </option>

                                    @endforeach

                                    </select>
                                </div>




                                <div class="form-group">
                                    <label for="comment">Product Discription</label>
                                    <textarea class="form-control" rows="5" name="product_discreption" >{{old('product_discreption')}}</textarea>
                                </div>


                                <div class="form-group">
                                    <label for="pwd">Product price </label>
                                    <input type="text" class="form-control" name="product_price" value="{{old('product_price')}}">
                                </div>

                                <div class="form-group">
                                    <label for="pwd">Product Quantity </label>
                                    <input type="text" class="form-control" name="product_quantity" value="{{old('product_quantity')}}">
                                </div>

                                <div class="form-group">
                                    <label for="pwd">Alart Quantity </label>
                                    <input type="text" class="form-control" name="alart_quantity" value="{{old('alart_quantity')}}">
                                </div>

                                <div class="form-group">
                                    <label for="pwd">Product Image </label>
                                    <input type="file" class="form-control" name="product_image" >
                                </div>


                            <button type="submit" class="btn btn-primary">Submit</button>


                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
