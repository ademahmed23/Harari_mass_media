 @extends('admin.layouts.master')

{{-- @section('heading', 'Videos')

@section('button')
<a href="{{ route('admin.admin_video_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a> --}}
{{-- @endsection  --}}


@section('content')
<section class="section">
    <div class="section-header">
        <h1>{{ __('Video') }}</h1>
    </div>
    <div class="card card-primary">
        <div class="card-header">
            <h4>{{ __('All Videos') }}</h4>
            <div class="card-header-action">
                <a href="{{ route('admin.admin_video_create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> {{ __('admin.Create new') }}
                </a>
            </div>
        </div>
<div class="card-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead class="pt_10 pb_10 ">
                                <tr>
                                    <th>#</th>
                                    <th>Video</th>
                                    <th>Caption</th>
                                    <th>Language</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($videos as $row)
                                <tr >
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <iframe style="width:300px;height:250px; padding-top:10px" width="560" height="315" src="https://www.youtube.com/embed/{{ $row->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </td>
                                    <td>{{ $row->caption }}</td>
                                                <td>{{ $row->language }}</td>
                                                {{-- <td>{{ $row->language->id }}</td> --}}
                                    <td class="pt_10 pb_10 " style="min-width: 200px">
                                        <a href="{{ route('admin.admin_video_edit',$row->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('admin.admin_video_delete',$row->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');">Delete</a>
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
</section>
@endsection