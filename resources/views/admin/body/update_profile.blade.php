@extends('admin.admin_master')

@section('admin')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>User Profile </h2>
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> {{ session('success') }} </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card-body">
            <form class="form-pill" method="POST" action="{{ route('update.user.profile') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput3">User Name</label>
                    <input class="form-control" name="name" type="text" value="{{ $user['name'] }}">

                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput3">User Email</label>
                    <input class="form-control" name="email" type="text" value="{{ $user['email'] }}">

                </div>
                <button class="btn btn-primary btn-default" type="submit">Update</button>
            </form>
        </div>
    </div>
@endsection
