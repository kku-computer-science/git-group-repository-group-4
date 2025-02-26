@extends('dashboards.users.layouts.user-dash-layout')
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
@section('title', __('message.project'))

@section('content')

<div class="container">

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title">{{ __('message.research_projects') }}</h4>
            <a class="btn btn-primary btn-menu btn-icon-text btn-sm mb-3" href="{{ route('researchProjects.create') }}">
                <i class="mdi mdi-plus btn-icon-prepend"></i> {{ __('message.add') }}
            </a>
            <table id="example1" class="table table-striped">
                <thead>
                    <tr>
                        <th>{{ __('message.no') }}</th>
                        <th>{{ __('message.year') }}</th>
                        <th>{{ __('message.project_name') }}</th>
                        <th>{{ __('message.head') }}</th>
                        <th>{{ __('message.member') }}</th>
                        <th width="auto">{{ __('message.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($researchProjects as $i=>$researchProject)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $researchProject->project_year }}</td>
                        <td>{{ Str::limit($researchProject->project_name,70) }}</td>
                        <td>
                            @foreach($researchProject->user as $user)
                            @if ($user->pivot->role == 1)
                            {{ $user->fname_en }}
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach($researchProject->user as $user)
                            @if ($user->pivot->role == 2)
                            {{ $user->fname_en }}
                            @endif
                            @endforeach
                        </td>
                        <td>
                            <form action="{{ route('researchProjects.destroy',$researchProject->id) }}" method="POST">
                                <li class="list-inline-item">
                                    <a class="btn btn-outline-primary btn-sm" type="button" data-toggle="tooltip"
                                        data-placement="top" title="{{ __('message.view') }}"
                                        href="{{ route('researchProjects.show',$researchProject->id) }}">
                                        <i class="mdi mdi-eye"></i>
                                    </a>
                                </li>

                                @if(Auth::user()->can('update',$researchProject)) 
                                <li class="list-inline-item">
                                    <a class="btn btn-outline-success btn-sm" type="button" data-toggle="tooltip"
                                        data-placement="top" title="{{ __('message.edit') }}"
                                        href="{{ route('researchProjects.edit',$researchProject->id) }}">
                                        <i class="mdi mdi-pencil"></i>
                                    </a>
                                </li>
                                @endif

                                @if(Auth::user()->can('delete',$researchProject))
                                @csrf
                                @method('DELETE')

                                <li class="list-inline-item">
                                    <button class="btn btn-outline-danger btn-sm show_confirm" type="submit"
                                        data-toggle="tooltip" data-placement="top" title="{{ __('message.delete') }}">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </li>
                                @endif
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>        
            </table>
            <br>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js" defer></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js" defer></script>

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

<script>

    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
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
