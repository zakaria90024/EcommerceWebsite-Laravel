@extends('layouts.app')

@section('content')



    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-success ">
                        Contact SMS View
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
                                            <th>SL. NO </th><th> First Name </th><th> Last Name</th><th> Subject </th> <th> Message</th> 

                                    <tbody>
                                            @forelse($contactmessages as $contactmessage)
                                                <tr class={{($contactmessage->read_status == 1)?"bg-danger":""}}>

                                                    <td> {{$loop->index + 1}}</td>
                                                    <td> {{$contactmessage->first_name}} </td>
                                                    <td> {{$contactmessage->last_name}} </td>
                                                    <td> {{$contactmessage->subject}} </td>
                                                    <td> {{$contactmessage->message}} </td>


                                                </tr>
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


        </div>
    </div>

@endsection
