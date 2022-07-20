@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12">
     <div class="card card-default">
          <div class="card-header card-header-border-bottom">
               <h2>Edit Contact</h2>
          </div>
          <div class="card-body">

               <form action="{{ url('update/contact/'.$contacts->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                         <label for="1">Adress</label>
                         <input type="text" name="address" class="form-control" id="1" value="{{ $contacts->address }}">

                         @error('address')
                         <span class="text-danger">{{$message}}</span>
                         @enderror
                    </div>

                    <div class="form-group">
                         <label for="2">Email </label>
                         <input type="text" name="email" class="form-control" id="2" value="{{ $contacts->email }}">
                         @error('email')
                         <span class="text-danger">{{$message}}</span>
                         @enderror
                    </div>

                    <div class="form-group">
                         <label for="3">Phone</label>
                         <input type="text" name="phone" class="form-control" id="3" value="{{ $contacts->phone }}">

                         @error('phone')
                         <span class="text-danger">{{$message}}</span>
                         @enderror
                    </div>


                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                         <button type="submit" class="btn btn-primary btn-default">Update</button>

                    </div>
               </form>

          </div>
     </div>



     @endsection