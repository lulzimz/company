@extends('admin.admin_master')

@section('admin')

<div class="col-lg-8" style="margin:auto;">

    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Change Password</h2>
        </div>
        <div class="card-body">

            <form method="post" action="{{route('passwordUpdate')}}" class="form-pill">
                @csrf
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" name="oldpassword" class="form-control" id="current_password" placeholder="Current Password">

                    @error('oldpassword')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input id="password" name="password" type="password" class="form-control" placeholder="New Password">

                    @error('password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password">

                    @error('password_confirmation')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-default">Save</button>
            </form>
        </div>
    </div>
</div>

@endsection