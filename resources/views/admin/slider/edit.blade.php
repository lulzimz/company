<!-- to get css header footer sidebar etc -->
@extends('admin.admin_master')

<!-- to connect with yield -->
@section('admin')

<div class="py-12">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Slider</div>
                    <div class="card-body">

                        <form action="{{url('slider/update/'.$slider->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- this input is to save current image and to replace with the new one -->
                            <input type="hidden" name="old_image" value="{{$slider->image}}">

                            <div class="mb-3">
                                <label for="id1" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" aria-describedby="emailHelp" id="id1" value="{{$slider->title}}">

                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="idw" class="form-label">Description</label>
                                <textarea name="description" aria-describedby="emailHelp" class="form-control" id="idw" autocomplete="on" rows="3">{{$slider->description}}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="id" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" aria-describedby="emailHelp" id="id" value="{{$slider->image}}">

                                @error('slider')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <img src="{{ asset($slider->image) }}" style="width:400px;height:200px">
                            </div>
                            <button type="submit" class="btn btn-primary">Update Slider</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection