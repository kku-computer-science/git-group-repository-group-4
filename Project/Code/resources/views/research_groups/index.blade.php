@extends('dashboards.users.layouts.user-dash-layout')
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
@section('content')

<div class="container">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title">{{__('message.ResearchGroup')}}</h4>
            <a class="btn btn-primary btn-menu btn-icon-text btn-sm mb-3" href="{{ route('researchGroups.create') }}"><i
                    class="mdi mdi-plus btn-icon-prepend"></i> {{__('message.add')}}</a>
            <!-- <div class="table-responsive"> -->
                <table id ="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{__('message.no')}}</th>
                            <th>{{__('message.Group_name')}}</th>
                            <th>{{__('message.group_leader')}}</th>
                            <th>{{__('message.group_members')}}</th>
                            <th width="280px">{{__('message.action')}}</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($researchGroups as $i=>$researchGroup)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ Str::limit($researchGroup->{"group_name_" . (app()->getLocale() === 'zh' ? 'en' : app()->getLocale())}, 50) }}</td>
                            <td>
                                @foreach($researchGroup->user as $user)
                                    @if ($user->pivot->role == 1)
                                        {{ $user->{"fname_" . (app()->getLocale() === 'zh' ? 'en' : app()->getLocale())} ?: $user->{"fname_en"} }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach($researchGroup->user as $user)
                                    @if ($user->pivot->role == 2)
                                        {{ $user->{"fname_" . (app()->getLocale() === 'zh' ? 'en' : app()->getLocale())} ?: $user->{"fname_en"} }}
                                        @if (!$loop->last),@endif
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <form action="{{ route('researchGroups.destroy',$researchGroup->id) }}" method="POST">

                                    <a class="btn btn-outline-primary btn-sm" type="button" data-toggle="tooltip"
                                        data-placement="top" title="view"
                                        href="{{ route('researchGroups.show',$researchGroup->id) }}"><i
                                            class="mdi mdi-eye"></i></a>

                                    @if(Auth::user()->can('update',$researchGroup))
                                    <a class="btn btn-outline-success btn-sm" type="button" data-toggle="tooltip"
                                        data-placement="top" title="Edit"
                                        href="{{ route('researchGroups.edit',$researchGroup->id) }}"><i
                                            class="mdi mdi-pencil"></i></a>
                                    @endif

                                    @if(Auth::user()->can('delete',$researchGroup))
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm show_confirm" type="submit" data-toggle="tooltip"
                                        data-placement="top" title="Delete"><i class="mdi mdi-delete"></i></button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            <!-- </div> -->
        </div>
    </div>
    

</div>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
<script src = "https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js" defer ></script>
<script src = "https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js" defer ></script>

<script>
    $(document).ready(function() {
        var table = $('#example1').DataTable({
            fixedHeader: true,
            language: {
                search: "{{ __('message.search') }}", // Placeholder for the search box
                lengthMenu: "{{ __('message.show') }} _MENU_ {{ __('message.entries') }}", // Text for entries
                info: "{{ __('message.showing') }} _START_ {{ __('message.to') }} _END_ {{ __('message.of') }} _TOTAL_ {{ __('message.entries') }}", // Info text
                infoEmpty: "{{ __('message.no_entries') }}", // Text when there are no entries
                infoFiltered: "({{ __('message.filtered_from') }} _MAX_ {{ __('message.entries') }})", // Filtered info
                paginate: {
                    first: "{{ __('message.first') }}", // First page
                    previous: "{{ __('message.previous') }}", // Previous page
                    next: "{{ __('message.next') }}", // Next page
                    last: "{{ __('message.last') }}" // Last page
                }
            }
        });
    });
</script>
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: `{{ __('message.are_you_sure') }}`,
                text: "{{ __('message.delete_warning') }}",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("{{ __('message.deleted_successfully') }}", {
                        icon: "success",
                    }).then(function() {
                        location.reload();
                        form.submit();
                    });
                }
            });
    });
</script>
@stop