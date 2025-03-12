index.blade.php
@extends('dashboards.users.layouts.user-dash-layout')

<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">

<style>
    .dropdown-toggle {
        height: 40px;
        width: 400px !important;
    }
    body label:not(.input-group-text) {
        margin-top: 10px;
    }
    body .my-select {
        background-color: #EFEFEF;
        color: #212529;
        border: 0 none;
        border-radius: 10px;
        padding: 6px 20px;
        width: 100%;
    }
</style>

@section('content')

<div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title text-center">{{ __('programs.title') }}</h4>
            <a class="btn btn-primary btn-menu btn-icon-text btn-sm mb-3" href="javascript:void(0)" id="new-program" data-toggle="modal">
                <i class="mdi mdi-plus btn-icon-prepend"></i> {{ __('programs.add') }}
            </a>

            <table id="example1" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ __('programs.name_en') }}</th>
                        <th>{{ __('programs.degree') }}</th>
                        <th>{{ __('message.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($programs as $i => $program)
                    <tr id="program_id_{{ $program->id }}">
                        <td>{{ $i+1 }}</td>
                        <td>{{ $program->program_name_en }}</td>
                        <td>{{ $program->degree->degree_name_en }}</td>
                        <td>
                            <a class="btn btn-outline-success btn-sm" id="edit-program" data-id="{{ $program->id }}">
                                <i class="mdi mdi-pencil"></i> {{ __('programs.edit') }}
                            </a>
                            <button class="btn btn-outline-danger btn-sm" id="delete-program" data-id="{{ $program->id }}">
                                <i class="mdi mdi-delete"></i> {{ __('programs.delete') }}
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add and Edit program modal -->
<div class="modal fade" id="crud-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="programCrudModal"></h4>
            </div>
            <div class="modal-body">
                <form name="proForm" action="{{ route('programs.store') }}" method="POST">
                    <input type="hidden" name="pro_id" id="pro_id">
                    @csrf

                    <div class="form-group">
                        <strong>{{ __('programs.degree') }}:</strong>
                        <select id="degree" class="custom-select my-select" name="degree">
                            @foreach($degree as $d)
                            <option value="{{$d->id}}">{{$d->degree_name_en}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <strong>{{ __('programs.department') }}:</strong>
                        <select id="department" class="custom-select my-select" name="department">
                            @foreach($department as $d)
                            <option value="{{$d->id}}">{{$d->department_name_en}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <strong>{{ __('programs.name_th') }}:</strong>
                        <input type="text" name="program_name_th" id="program_name_th" class="form-control" placeholder="{{ __('programs.name_th') }}">
                    </div>

                    <div class="form-group">
                        <strong>{{ __('programs.name_en') }}:</strong>
                        <input type="text" name="program_name_en" id="program_name_en" class="form-control" placeholder="{{ __('programs.name_en') }}">
                    </div>

                    <div class="text-center">
                        <button type="submit" id="btn-save" class="btn btn-primary">{{ __('programs.submit') }}</button>
                        <a href="{{ route('programs.index') }}" class="btn btn-danger">{{ __('programs.cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js" defer></script>

<script>
    $(document).ready(function() {
        $('#example1').DataTable({
            responsive: true,
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

        $('#new-program').click(function() {
            $('#btn-save').val("create-program");
            $('#program').trigger("reset");
            $('#programCrudModal').html("{{ __('programs.add') }}");
            $('#crud-modal').modal('show');
        });

        $('body').on('click', '#edit-program', function() {
            var program_id = $(this).data('id');
            $.get('programs/' + program_id + '/edit', function(data) {
                $('#programCrudModal').html("{{ __('programs.edit') }}");
                $('#crud-modal').modal('show');
                $('#pro_id').val(data.id);
                $('#program_name_th').val(data.program_name_th);
                $('#program_name_en').val(data.program_name_en);
                $('#degree').val(data.degree_id);
            })
        });

        $('body').on('click', '#delete-program', function(e) {
            var program_id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            e.preventDefault();
            if (confirm("{{ __('programs.confirm_text') }}")) {
                $.ajax({
                    type: "DELETE",
                    url: "programs/" + program_id,
                    data: {
                        "id": program_id,
                        "_token": token,
                    },
                    success: function() {
                        $("#program_id_" + program_id).remove();
                        alert("{{ __('programs.deleted') }}");
                    },
                    error: function() {
                        console.log('Error deleting program');
                    }
                });
            }
        });
    });
</script>

@stop
