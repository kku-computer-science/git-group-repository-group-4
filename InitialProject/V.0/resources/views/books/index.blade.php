@extends('dashboards.users.layouts.user-dash-layout')
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
@section('title','Dashboard')

@section('content')

<div class="container">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title">{{ __('message.book') }}</h4>
            <a class="btn btn-primary btn-menu btn-icon-text btn-sm mb-3" href="{{ route('books.create') }}"><i class="mdi mdi-plus btn-icon-prepend"></i>{{ __('message.add') }} </a>
            <!-- <div class="table-responsive"> -->
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                        <th>{{ __('message.no') }}</th>
            <th>{{ __('message.name') }}</th>
            <th>{{ __('message.year') }}</th>
            <th>{{ __('message.source') }}</th>
            <th>{{ __('message.page') }}</th>
            <th width="280px">{{ __('message.action') }}</th>
                        </tr>
                        <thead>
                        <tbody>
        @foreach ($books as $i => $paper)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ Str::limit($paper->ac_name, 50) }}</td>
            <td>{{ date('Y', strtotime($paper->ac_year)) + 543 }}</td>
            <td>{{ Str::limit($paper->ac_sourcetitle, 50) }}</td>
            <td>{{ $paper->ac_page }}</td>
            <td>
                <form action="{{ route('books.destroy', $paper->id) }}" method="POST">
                    <a class="btn btn-outline-primary btn-sm" href="{{ route('books.show', $paper->id) }}" title="{{ __('message.view') }}">
                        <i class="mdi mdi-eye"></i>
                    </a>

                    @if(Auth::user()->can('update', $paper))
                    <a class="btn btn-outline-success btn-sm" href="{{ route('books.edit', $paper->id) }}" title="{{ __('message.edit') }}">
                        <i class="mdi mdi-pencil"></i>
                    </a>
                    @endif

                    @if(Auth::user()->can('delete', $paper))
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger btn-sm show_confirm" type="submit" title="{{ __('message.delete') }}">
                        <i class="mdi mdi-delete"></i>
                    </button>
                    @endif
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
                </table>
            <!-- </div> -->
            <br>
            
        </div>
    </div>


</div>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
<script src = "https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js" defer ></script>
<script src = "https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js" defer ></script>
<script>
    $(document).ready(function() {
        $('#example1').DataTable({
            fixedHeader: true,
            language: {
                search: "{{ __('message.search') }}",
                lengthMenu: "{{ __('message.show') }} _MENU_ {{ __('message.entries') }}",
                info: "{{ __('message.showing') }} _START_ {{ __('message.to') }} _END_ {{ __('message.of') }} _TOTAL_ {{ __('message.entries') }}",
                infoEmpty: "{{ __('message.no_entries') }}",
                infoFiltered: "({{ __('message.filtered_from') }} _MAX_ {{ __('message.entries') }})",
                paginate: {
                    first: "{{ __('message.first') }}",
                    previous: "{{ __('message.previous') }}",
                    next: "{{ __('message.next') }}",
                    last: "{{ __('message.last') }}"
                }
            }
        });
    });

    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        event.preventDefault();
        swal({
            title: "{{ __('message.confirm_delete') }}",
            text: "{{ __('message.delete_warning') }}",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                swal("{{ __('message.delete_success') }}", {
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