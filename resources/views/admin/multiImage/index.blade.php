<!-- to get css header footer sidebar etc -->
@extends('admin.admin_master')

<!-- to connect with yield -->
@section('admin')
<div class="py-12">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card-group">
                    @foreach($images as $img)
                    <div class="col-md-4 mt-5">
                    <a href="{{url('multiimage/deleteone/'.$img->id)}}" class="badge badge-danger" style="margin-left:auto ; border-radius:15px">-</a>
                        <div class="card">
                            <img src="{{asset($img->image)}}" alt="">                        
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Multi Image</div>
                    <div class="card-body">
                        <form action="{{route('addmulti')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail2" class="form-label">Image</label>
                                <input type="file" name="image[]" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" multiple>
                                @error('image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Add Image</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection