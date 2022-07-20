<!-- to get css header footer sidebar etc -->
@extends('admin.admin_master')

<!-- to connect with yield -->
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Edit Client</div>
                        <div class="card-body">

                            <form action="{{url('client/update/'.$client->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- this input is to save current image and to replace with the new one -->
                                <input type="hidden" name="old_image" value="{{$client->client_image}}">
                                <div class="mb-3">
                                    <label for="id1" class="form-label">Update Client Name</label>
                                    <input type="text" name="client_name" class="form-control" aria-describedby="emailHelp" id="id1" value="{{$client->client_name}}">
                                    @error('client_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="id" class="form-label">Update Client Image</label>
                                    <input type="file" name="client_image" class="form-control" aria-describedby="emailHelp" id="id" value="{{$client->client_image}}">
                                    @error('client_image')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <img src="{{ asset($client->client_image) }}" style="width:400px;height:200px">
                                </div>
                                <button type="submit" class="btn btn-primary">Update Client</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection