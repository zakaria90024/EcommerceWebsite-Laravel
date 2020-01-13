@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                      
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>

                    @endif



                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Updated At</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($all_contect as $user)


                                <tr>

                                    <td>{{$user->name }}</td>
                                    <td>{{$user->email }}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>{{$user->updated_at}}</td>


                                </tr>


                             @endforeach



                            </tbody>
                        </table>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
