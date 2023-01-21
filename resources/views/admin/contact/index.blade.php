@extends('admin.admin_master')

@section('admin')
    <div class="py-12">


        <div class="container">
            <div class="row">
                <h4>Contact Page </h4>
                <br>
                <a href="{{ route('add.contact') }}"> <button class="btn btn-info">Add Contact</button></a>
                <div class="col-md-12">
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong> {{ session('success') }} </strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card-header">
                            All Contact Data

                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">Sl No</th>
                                    <th scope="col" width="15%">Contact Address</th>
                                    <th scope="col" width="25%">Contact email</th>
                                    <th scope="col" width="15%">Contact Phone</th>
                                    <th scope="col" width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($contacts as $con)
                                    <tr>
                                        <td scope="col">{{ $i++ }}</td>
                                        <td scope="col">{{ $con->address }} </td>
                                        <td scope="col">{{ $con->phone }} </td>
                                        <td scope="col">{{ $con->email }} </td>

                                        <td> <a href="{{ url('contacts/edit/' . $con->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('contacts/delete/' . $con->id) }}"
                                                onclick="return confirm('Are you sure to delete?')"
                                                class="btn btn-danger">Delete</a>
                                        </td>
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
