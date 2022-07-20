   <!-- to get css header footer sidebar etc -->
   @extends('admin.admin_master')

   <!-- to connect with yield -->
   @section('admin')
   <div class="py-12">
       <div class="container">
           <div class="row">
               <div class="col-md-8">

                   <div class="card">
                       <div class="card-header">Our Clients</div>
                       <div class="card-body">
                           <table class="table">
                               <thead>
                                   <tr>
                                       <th scope="col">#</th>
                                       <th scope="col">Client Name</th>
                                       <th scope="col">Client Image</th>
                                       <th scope="col">Date Created</th>
                                       <th scope="col">Actions</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   @foreach($clients as $client)
                                   <tr>
                                       <th scope="row">{{$clients->firstItem()+$loop->index}}</th>
                                       <td>{{$client->client_name}}</td>
                                       <td><img src="{{ asset($client->client_image) }}" style="height:40px;width:70px" alt=""></td>
                                       <td>
                                           @if(!$client->created_at)
                                           <span class="text-danger">Date is not set</span>
                                           @else
                                           {{ Carbon\Carbon::parse($client->created_at)->diffForHumans()}}
                                           @endif
                                       </td>
                                       <td>
                                           <a href="{{url('client/edit/'.$client->id)}}" class="btn btn-info">Edit</a>
                                           <a href="{{url('client/delete/'.$client->id)}}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a>
                                       </td>
                                   </tr>
                                   @endforeach
                               </tbody>
                           </table>
                           {{$clients->links()}}
                       </div>
                   </div>
               </div>

               <div class="col-md-4">
                   <div class="card">
                       <div class="card-header">Add Client</div>
                       <div class="card-body">
                           <form action="{{route('addClient')}}" method="POST" enctype="multipart/form-data">
                               @csrf
                               <div class="mb-3">
                                   <label for="exampleInputEmail1" class="form-label">Client Name</label>
                                   <input type="text" name="client_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                   @error('client_name')
                                   <span class="text-danger">{{$message}}</span>
                                   @enderror
                               </div>

                               <div class="mb-3">
                                   <label for="exampleInputEmail2" class="form-label">Client Image</label>
                                   <input type="file" name="client_image" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
                                   @error('client_image')
                                   <span class="text-danger">{{$message}}</span>
                                   @enderror
                               </div>

                               <button type="submit" class="btn btn-primary">Add Client</button>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   @endsection