@extends('admin.admin_master')

@section('admin')



    <div class="py-12">


        <div class="container">
            <div class="row">
                <h4>Home Slider</h4>
                <br>
                <a href="{{ route('add.slider') }}"> <button class="btn btn-info">Add Slider</button></a>
                <div class="col-md-12">
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong> {{ session('success') }} </strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card-header">
                            All Slider

                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">Sl No</th>
                                    <th scope="col" width="10%">Title</th>
                                    <th scope="col" width="35%">Description</th>
                                    <th scope="col" width="10%">Image</th>
                                   
                                    <th scope="col"  width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($sliders as $slider)
                                    <tr>
                                        <td scope="col">{{ $i++; }}</td>
                                        <td >{{ $slider->title }} </td>
                                        <td >{{ $slider->description }} </td>
                                        <td scope="col"> <img src="{{ asset($slider->image) }}"
                                                style="height:40px; width:70px;" alt=""> </td>

                                        <td> <a href="{{ url('slider/edit/' . $slider->id) }}"
                                                class="btn btn-info">Edit</a>
                                            <a href="{{ url('slider/delete/' . $slider->id) }}"
                                                onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
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