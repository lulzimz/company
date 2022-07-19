@extends('admin.admin_master')

@section('admin')

<div class="col-lg-8" style="margin:auto;">

    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Update Profile</h2>
        </div>
        <div class="card-body">

            <form method="post" action="{{route('profileUpdate')}}" class="form-pill" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="1">User Name</label>
                    <input type="text" name="name" class="form-control" id="1" value="{{$user->name}}">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="2">Email</label>
                    <input type="email" name="email" class="form-control" id="2" value="{{$user['email']}}">
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="3" class="form-label">Change Profile Image</label>
                    <input type="file" name="image" class="form-control" id="3">
                </div>

                <button type="submit" class="btn btn-primary btn-default">Update</button>
            </form>
        </div>
    </div>
</div>

@endsection