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
            <h4 class="card-title">{{ __('message.fund_research') }}</h4>
            <a class="btn btn-primary btn-menu btn-icon-text btn-sm mb-3" href="{{ route('funds.create') }}"><i class="mdi mdi-plus btn-icon-prepend"></i> </i> {{ __('message.add') }}</a>
            </a>
            <div class="table-responsive">
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                        <th>{{ __('message.no') }}</th>
                        <th>{{ __('message.fund_name') }}</th>
                        <th>{{ __('message.fund_type') }}</th>
                        <th>{{ __('message.fund_level') }}</th>
                        <th>{{ __('message.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($funds as $i=>$fund)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ Str::limit($fund->fund_name,80) }}</td>
                            <td>
    @if(app()->getLocale() == 'th')
        {{ __('message.funds.'.$fund->fund_type) }}
    @elseif(app()->getLocale() == 'zh')
        {{ __('message.funds.'.$fund->fund_type) }}
    @else
        {{ __('message.funds.'.$fund->fund_type) }}
    @endif
</td>
<td>
    @if(!empty($fund->fund_level) && __('message.funds_level.'.$fund->fund_level, [], app()->getLocale()) !== 'message.funds_level.'.$fund->fund_level)
        {{ __('message.funds_level.'.$fund->fund_level) }}
    @else
        {{ '' }}
    @endif
</td>


                            <!-- <td>{{ $fund->user->fname_en }} {{ $fund->user->lname_en }}</td> -->

                            <td>
                                @csrf
                                <form action="{{ route('funds.destroy',$fund->id) }}" method="POST">
                                    <li class="list-inline-item">
                                        <a class="btn btn-outline-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="view" href="{{ route('funds.show',$fund->id) }}"><i class="mdi mdi-eye"></i></a>
                                    </li>
                                    @if(Auth::user()->can('update',$fund))
                                    <li class="list-inline-item">
                                        <a class="btn btn-outline-success btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('funds.edit',Crypt::encrypt($fund->id)) }}"><i class="mdi mdi-pencil"></i></a>
                                    </li>
                                    @endif

                                    @if(Auth::user()->can('delete',$fund))
                                    @csrf
                                    @method('DELETE')

                                    <li class="list-inline-item">
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-outline-danger btn-sm show_confirm" type="submit" data-toggle="tooltip" title="Delete"><i class="mdi mdi-delete"></i></button>
                                    </li>


                                    @endcan
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
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: `Are you sure?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Delete Successfully", {
                        icon: "success",
                    }).then(function() {
                        location.reload();
                        form.submit();
                    }); 
                }
            });
    });
</script>
@endsection