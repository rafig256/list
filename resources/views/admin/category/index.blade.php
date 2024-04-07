@extends('admin.layouts.master')

@section('title','category')

@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing bg-white">
            <div class="account-settings-container layout-top-spacing">
                <div class="account-content">
                    <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                        <div class="row pt-5">
                            <a href="{{route('admin.category.create')}}" class="btn btn-sm btn-success">create</a>
                        </div>
                        <div class="row">
                            <table class="table table-bordered">
                                <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th>Parent Category</th>
                                <th>Review Category</th>
                                <th>Icon</th>
                                <th>Home</th>
                                <th>Price</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{++$loop->index}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{!! $category->parent->name ?? "<span class = 'text-success'>GENERAL CATEGIRY</span>" !!}</td>
                                        <td>@foreach($category->review_cats as $reviewCat)
                                                <span class="badge badge-secondary mb-1"> {{$reviewCat->name}} </span><br>
                                            @endforeach
                                        </td>
                                        <td><img src="{{asset($category->image_icon)}}" width="100px"></td>
                                        <td>{{$category->show_at_home == 1 ? 'Yes' : 'No'}}</td>
                                        <td>{{$category->price}}</td>
                                        <td>
                                            <a href="{{route('admin.category.edit', $category->id)}}" class="btn btn-primary">Edit</a>
                                            <form action="{{route('admin.category.destroy', $category->id)}}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger ml-2" onclick="return confirm('Are you sure?')"> Delete </button>
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

