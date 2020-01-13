@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="row">

            <div class="col-6 offset-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('home')}}">Deshboard</a></li>
                        <li class="breadcrumb-item"><a href="{{url('add/product/view')}}">Product List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$simple_product_info->product_name}}</li>
                    </ol>
                </nav>

            <div class="card">
                <div class="card-header bg-success ">
                    Edit Product Form


                </div>

                <div class="card-body">



                    <form action="{{url('edit/product/insert')}}" method="post" enctype="multipart/form-data">

                        @csrf()


                        @if(session('status'))

                            <div class="alert alert-success">

                                {{session('status')}}

                            </div>

                        @endif



                        <div class="form-group">
                            <label for="usr">Product Name </label>
                            <input type="hidden" name="product_id" value="{{$simple_product_info->id}}">
                            <input type="text" class="form-control" name="product_name" value="{{$simple_product_info->product_name}}">
                        </div>


                        <div class="form-group">
                            <label for="comment">Product Discription</label>
                            <textarea class="form-control" rows="5" name="product_discreption">{{$simple_product_info->product_discreption}}</textarea>
                        </div>


                        <div class="form-group">
                            <label for="pwd">Product price </label>
                            <input type="text" class="form-control" name="product_price" value="{{$simple_product_info->product_price}}">
                        </div>

                        <div class="form-group">
                            <label for="pwd">Product Quantity </label>
                            <input type="text" class="form-control" name="product_quantity" value="{{$simple_product_info->product_quantity}}">
                        </div>

                        <div class="form-group">
                            <label for="pwd">Alart Quantity </label>
                            <input type="text" class="form-control" name="alart_quantity" value="{{$simple_product_info->alart_quantity}}">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Product Image </label>
                            <input type="file" class="form-control" name="product_image" >
                            <img src="{{asset('uploads/product_photo')}}/{{$simple_product_info->product_image}}" alt="Not Found" width="150">
                        </div>

                        <button type="submit" class="btn btn-warning">Product Update</button>


                    </form>

                </div>
            </div>
        </div>
        </div>
    </div>



@endsection
