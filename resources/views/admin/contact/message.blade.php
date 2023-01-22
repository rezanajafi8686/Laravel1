@extends('admin.admin_master')

@section('admin')
    <div class="py-12">


        <div class="container">
            <div class="row">
                <h4>Admin Message </h4>
                <br>
    
                <div class="col-md-12">
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong> {{ session('success') }} </strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card-header">
                            All Message

                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">Sl</th>
                                    <th scope="col" width="15%">Name</th>
                                    <th scope="col" width="25%">Email</th>
                                    <th scope="col" width="15%">Subject</th>
                                    <th scope="col" width="15%">Message</th>
                                    <th scope="col" width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($messages as $mess)
                                    <tr>
                                        <td scope="col">{{ $i++ }}</td>
                                        <td scope="col">{{ $mess->name }} </td>
                                        <td scope="col">{{ $mess->email }} </td>
                                        <td scope="col">{{ $mess->subject }} </td>
                                        <td scope="col">{{ $mess->message }} </td>

                                        <td> 
                                            <a href="{{ url('contacts/delete/' . $mess->id) }}"
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
