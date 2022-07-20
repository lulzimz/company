   <!-- to get css header footer sidebar etc -->
   @extends('admin.admin_master')

   <!-- to connect with yield -->
   @section('admin')
   <div class="py-12">
       <div class="container">
           <div class="row">
               <div class="col-md-12">
                   
                   <div class="card">
                       <div class="card-header">All sliders</div>
                       <div class="card-body">
                           <table class="table">
                               <thead>
                                   <tr>
                                       <th scope="col" width="5%">#</th>
                                       <th scope="col" width="15%">Slider Title</th>
                                       <th scope="col" width="50%">Slider Description</th>
                                       <th scope="col" width="15%">Slider Image</th>
                                       <th scope="col" width="15%">Actions</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   @php($count=1)
                                   @foreach($sliders as $slider)
                                   <tr>
                                       <th scope="row">{{$count++}}</th>
                                       <td>{{$slider->title}}</td>
                                       <td>{{$slider->description}}</td>
                                       <td><img src="{{ asset($slider->image) }}" style="height:40px;width:70px" alt=""></td>
                                       <td>
                                           <a href="{{url('slider/edit/'.$slider->id)}}" class="btn btn-info">Edit</a>
                                           <a href="{{url('slider/delete/'.$slider ->id)}}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a>
                                       </td>
                                   </tr>
                                   @endforeach
                               </tbody>
                           </table>
                       </div>
                   </div>
                   <br />
                   <a href="{{route('addSlider')}}"><button class="btn btn-info">Add Slider</button></a>
               </div>
           </div>
       </div>
   </div>
   @endsection