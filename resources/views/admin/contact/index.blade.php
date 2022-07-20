@extends('admin.admin_master')

@section('admin')

<div class="py-12">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> All Contact </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">SL </th>
                                <th scope="col">Address</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach($contacts as $con)
                            <tr>
                                <th scope="row"> {{ $i++  }} </th>
                                <td> {{ $con->address }} </td>
                                <td> {{ $con->email }} </td>
                                <td> {{ $con->phone }} </td>

                                <td>
                                    <a href="{{ url('edit/contact/'.$con->id) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ url('delete/contact/'.$con->id) }}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <br />
                <a href="{{ route('addContact') }}"> <button class="btn btn-info">Add Contact</button> </a>
            </div>
        </div>

    </div>
</div>
</div>
@endsection