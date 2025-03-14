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
            <h4 class="card-title">{{ __('message.academic_works') }}</h4>
            <a class="btn btn-primary btn-menu btn-icon-text btn-sm mb-3" href="{{ route('patents.create') }}">
    <i class="mdi mdi-plus btn-icon-prepend"></i> {{ __('message.add') }}
</a>
            <!-- <div class="table-responsive"> -->
                <table id ="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('message.no') }}</th>
            <th>{{ __('message.title') }}</th>
            <th>{{ __('message.type') }}</th>
            <th>{{ __('message.registration_date') }}</th>
            <th>{{ __('message.registration_number') }}</th>
            <th>{{ __('message.author') }}</th>
            <th>{{ __('message.action') }}</th>
                        </tr>
                        <thead>
                        <tbody>
                            @foreach ($patents as $i=>$paper)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ Str::limit($paper->ac_name,50) }}</td>
                                <td>{{ __('message.patents.' . $paper->ac_type) }}</td>
                                <td>{{ $paper->ac_year}}</td>
                                <td>{{ $paper->ac_refnumber,50 }}</td>
                                <td>
                                    @foreach($paper->user as $a)
                                        @php
                                            $locale = App::getLocale();
                                            // ถ้าภาษาเป็น zh ให้ใช้ en แทน
                                            if ($locale === 'zh') {
                                                $locale = 'en';
                                            }
                                        @endphp

                                        {{ $locale === 'th' ? $a->fname_th : $a->fname_en }} 
                                        {{ $locale === 'th' ? $a->lname_th : $a->lname_en }}

                                        @if (!$loop->last),@endif
                                    @endforeach
                                </td>
                                <td>
                                    <form action="{{ route('patents.destroy',$paper->id) }}" method="POST">

                                        <!-- <a class="btn btn-info" href="{{ route('patents.show',$paper->id) }}">Show</a> -->
                                        <li class="list-inline-item">
                                            <a class="btn btn-outline-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="view" href="{{ route('patents.show',$paper->id) }}"><i class="mdi mdi-eye"></i></a>
                                        </li>
                                        <!-- <a class="btn btn-primary" href="{{ route('patents.edit',$paper->id) }}">Edit</a> -->
                                        @if(Auth::user()->can('update',$paper))
                                        <li class="list-inline-item">
                                            <a class="btn btn-outline-success btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('patents.edit',$paper->id) }}"><i class="mdi mdi-pencil"></i></a>
                                        </li>
                                        @endif
                                        @if(Auth::user()->can('delete',$paper))
                                        @csrf
                                        @method('DELETE')
                                        <li class="list-inline-item">
                                            <button class="btn btn-outline-danger btn-sm show_confirm" type="submit" data-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-delete"></i></button>
                                        </li>
                                        @endif
                                        <!-- <button type="submit" class="btn btn-danger">Delete</button> -->
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                    <tbody>
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