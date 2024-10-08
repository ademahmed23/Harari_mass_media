@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Live Channel') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('All Lives') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.admin_live_channel_create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> {{ __('admin.Create new') }}
                    </a>
                </div>
            </div>

            <div class="card-body">
               
                <div class="tab-content tab-bordered" id="myTab3Content">
                  
                       
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr style="background-color:#07564738;">
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th>{{ __('Video') }}</th>
                                                <th>{{ __('Heading') }}</th>
                                                <th>{{ __('lang') }}</th>

                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($live_channels as $row)
                                            <tr>

                                                <td>{{ $row->id }}</td>
                                                <td>
                                                    <iframe style="width:300px;height:250px; padding-top:10px" width="560" height="315" src="https://www.youtube.com/embed/{{ $row->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                </td>
                                                <td>{{ $row->heading }}</td>
                                                <td>{{ $row->language }}</td>
                                                <td class="pt_10 pb_10">
                                                    <a href="{{ route('admin.admin_live_channel_edit',$row->id) }}" class="btn btn-primary">Edit</a>
                                                    <a href="{{ route('admin.admin_live_channel_delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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
    </section>
@endsection

@push('scripts')
     <script>
                "columnDefs": [
                    {
                        "sortable": false,
                        "targets": [2, 3]
                    }
                ],
                "order": [
                    [0, 'desc']
                ]
            });

        $(document).ready(function(){
            $('.toggle-status').on('click', function(){
                let id = $(this).data('id');
                let name = $(this).data('name');
                let status = $(this).prop('checked') ? 1 : 0;

                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.toggle-news-status') }}",
                    data: {
                        id:id,
                        name:name,
                        status:status
                    },
                    success: function(data){
                        if(data.status === 'success'){
                            Toast.fire({
                                icon: 'success',
                                title: data.message
                            })
                        }
                    },
                    error: function(error){
                        console.log(error);
                    }
                })
            })
        })
    </script>
@endpush
