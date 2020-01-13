@extends('layouts.app')

@section('content')





            <div class="col-6 offset-3">
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


                        <form action="{{url('add/insert')}}" method="post" >

                            @csrf()


                                @if(session('status'))

                                    <div class="alert alert-success">

                                        {{session('status')}}

                                    </div>

                                @endif



                                <div class="form-group">
                                    <label for="usr">Payment Method </label>
                                    <input type="text" class="form-control" name="payment_method" value="{{old('payment_method')}}">
                                </div>


                                <div class="form-group">
                                    <label for="pwd">Courier Name </label>
                                    <input type="text" class="form-control" name="add_courier" value="{{old('add_courier')}}">
                                </div>



                            <button type="submit" class="btn btn-primary">Submit</button>


                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
