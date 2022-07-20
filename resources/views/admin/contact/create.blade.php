@extends('admin.admin_master')

@section('admin')

<div class="col-lg-6">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Create Contact</h2>
        </div>
        <div class="card-body">

            <form action="{{ route('storeContact') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="2">Address</label>
                    <input type="text" name="address" class="form-control" id="2" placeholder="Address">

                    @error('address')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="1">Email</label>
                    <input type="email" name="email" class="form-control" id="1" placeholder="Email">

                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="3">Phone</label>
                    <input type="text" name="phone" class="form-control" id="3" placeholder="Address">

                    @error('phone')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection