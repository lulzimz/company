<!-- to get css header footer sidebar etc -->
@extends('admin.admin_master')

<!-- to connect with yield -->
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Edit Brand</div>
                        <div class="card-body">

                            <form action="{{url('brand/update/'.$brand->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- this input is to save current image and to replace with the new one -->
                                <input type="hidden" name="old_image" value="{{$brand->brand_image}}">
                                <div class="mb-3">
                                    <label for="id1" class="form-label">Update Brand Name</label>
                                    <input type="text" name="brand_name" class="form-control" aria-describedby="emailHelp" id="id1" value="{{$brand->brand_name}}">
                                    @error('brand_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="id" class="form-label">Update Brand Image</label>
                                    <input type="file" name="brand_image" class="form-control" aria-describedby="emailHelp" id="id" value="{{$brand->brand_image}}">
                                    @error('brand_image')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <img src="{{ asset($brand->brand_image) }}" style="width:400px;height:200px">
                                </div>
                                <button type="submit" class="btn btn-primary">Update Brand</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection