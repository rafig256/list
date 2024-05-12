@extends('admin.layouts.master')

@section('title', 'Comments')

@push('css')
    <link href="{{asset('admin/assets/css/tables/table-basic.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div id="tableProgress" class="col-lg-12 col-12 layout-spacing mt-5">
        <div class="statbox widget box box-shadow">
            <div class="widget-header p-3">
                <div class="row">
                    <div class="col-xl-8 col-md-8 col-sm-8 col-8">
                        <h4>Comments Table</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>User</th>
                            <th>Comment Text</th>
                            <th>Post</th>
                            <th>status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                            <tr>
                                <td>{{$comment->id}} </td>
                                <td>{{$comment->user?->name}}</td>
                                <td>{{$comment->comment}}</td>
                                <td>{{$comment->post->title}}</td>
                                <td>
                                    {!! $comment->status ? '<span class="badge badge-success"> Active </span>' : '<span class="badge badge-danger"> DeActive </span>' !!}
                                </td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li>
                                            <a href="{{$comment->status ? route('admin.comment.disable',$comment->id) : route('admin.comment.activate',$comment->id)}}"  data-toggle="tooltip" data-placement="top" title="{{$comment->status ? "disable" : "Activate" }}" >
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                     viewBox="0 0 30.143 30.143" xml:space="preserve">
<g>
    <path style="fill:#{{$comment->status ? 'FF0000' : '00FF00'}};" d="M20.034,2.357v3.824c3.482,1.798,5.869,5.427,5.869,9.619c0,5.98-4.848,10.83-10.828,10.83
		c-5.982,0-10.832-4.85-10.832-10.83c0-3.844,2.012-7.215,5.029-9.136V2.689C4.245,4.918,0.731,9.945,0.731,15.801
		c0,7.921,6.42,14.342,14.34,14.342c7.924,0,14.342-6.421,14.342-14.342C29.412,9.624,25.501,4.379,20.034,2.357z"/>
    <path style="fill:#{{$comment->status ? 'FF0000' : '00FF00'}};" d="M14.795,17.652c1.576,0,1.736-0.931,1.736-2.076V2.08c0-1.148-0.16-2.08-1.736-2.08
		c-1.57,0-1.732,0.932-1.732,2.08v13.496C13.062,16.722,13.225,17.652,14.795,17.652z"/>
</g>
</svg>
                                            </a>
                                        </li>
                                        <li><form action="{{route('admin.comment.destroy',$comment->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-link border-0 bg-transparent" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
