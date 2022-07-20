<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Category page
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <div class="card">
                        <div class="card-header">All Category</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Date Created</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $cat)
                                    <tr>
                                        <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
                                        <td>{{$cat->category_name}}</td>
                                        <td>{{$cat->user->name}}</td>
                                        <td>
                                            @if(!$cat->created_at)
                                            <span class="text-danger">Date is not set</span>
                                            @else
                                            {{ Carbon\Carbon::parse($cat->created_at)->diffForHumans()}}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('category/edit/'.$cat->id)}}" class="btn btn-info">Edit</a>
                                            <a href="{{url('category/softdelete/'.$cat->id)}}" class="btn btn-danger">Trash</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$categories->links()}}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Category</div>
                        <div class="card-body">
                            <form action="{{route('addCategory')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    @error('category_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Trash List</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Date Created</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($trashed as $cat)
                                    <tr>
                                        <th scope="row">{{$trashed->firstItem()+$loop->index}}</th>
                                        <td>{{$cat->category_name}}</td>
                                        <td>{{$cat->user->name}}</td>
                                        <td>
                                            @if(!$cat->created_at)
                                            <span class="text-danger">Date is not set</span>
                                            @else
                                            {{ Carbon\Carbon::parse($cat->created_at)->diffForHumans()}}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('category/restore/'.$cat->id)}}" class="btn btn-info">Restore</a>
                                            <a href="{{url('category/delete/'.$cat->id)}}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$trashed->links()}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>