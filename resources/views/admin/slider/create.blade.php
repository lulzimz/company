  <!-- to get css header footer sidebar etc -->
  @extends('admin.admin_master')

  <!-- to connect with yield -->
  @section('admin')

  <div class="col-lg-12">
      <div class="card card-default">
          <div class="card-header card-header-border-bottom">
              <h2>Create Slider</h2>
          </div>
          <div class="card-body">
              <form action="{{route('storeSlider')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                      <label for="exampleFormControlInput1">Slider Title</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="Enter Title">

                      @error('title')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label for="exampleFormControlTextarea1">Description</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
                  </div>
                  <div class="form-group">
                      <label for="exampleFormControlFile1">Slider Image</label>
                      <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">

                      @error('image')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="form-footer pt-4 pt-5 mt-4 border-top">
                      <button type="submit" class="btn btn-primary btn-default">Create</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
  @endsection