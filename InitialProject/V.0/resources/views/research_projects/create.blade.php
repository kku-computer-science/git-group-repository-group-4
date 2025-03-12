@extends('dashboards.users.layouts.user-dash-layout')
<!-- <link  rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> -->
@section('content')

<style>
    .my-select {
        background-color: #fff;
        color: #212529;
        border: #000 0.2 solid;
        border-radius: 5px;
        padding: 4px 10px;
        width: 100%;
        font-size: 14px;
    }
</style>
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>{{ trans('message.whoops') }}</strong>{{ trans('message.input_problems') }}<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title">{{ trans('message.add_research_project') }}</h4>
                <p class="card-description">{{ trans('message.fill_in_details') }}</p>
                <form action="{{ route('researchProjects.store') }}" method="POST">
                    @csrf
                    <div class="form-group row mt-5">
                        <label for="exampleInputfund_name" class="col-sm-2 ">{{ trans('message.project_name') }}</label>
                        <div class="col-sm-8">
                            <input type="text" name="project_name" class="form-control" placeholder="{{ trans('message.project_name') }}" value="{{ old('project_name') }}">
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="exampleInputfund_name" class="col-sm-2 ">{{ trans('message.start_date') }}</label>
                        <div class="col-sm-4">
                            <input type="date" name="project_start" id="Project_start" class="form-control" value="{{ old('project_start') }}">
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="exampleInputfund_name" class="col-sm-2 ">{{ trans('message.end_date') }}</label>
                        <div class="col-sm-4">
                            <input type="date" name="project_end" id="Project_end" class="form-control" value="{{ old('project_end') }}">
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="exampleInputfund_details" class="col-sm-2 ">{{ trans('message.select_fund') }}</label>
                        <div class="col-sm-4">
                            <select id='fund' style='width: 200px;' class="custom-select my-select" name="fund">
                                <option value='' disabled selected>{{ trans('message.select_fund_type') }}</option>@foreach($funds as $fund)<option value="{{ $fund->id }}">{{ $fund->fund_name }}</option>@endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputproject_year" class="col-sm-2 ">{{ trans('message.submission_year') }}</label>
                        <div class="col-sm-4">
                            <input type="year" name="project_year" class="form-control" placeholder="{{ trans('message.year') }}">
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="exampleInputfund_name" class="col-sm-2 ">{{ trans('message.budget') }}</label>
                        <div class="col-sm-4">
                            <input type="int" name="budget" class="form-control" placeholder="{{ trans('message.Amount_in_Baht') }}" value="{{ old('budget') }}">
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="exampleInputresponsible_department" class="col-sm-2 ">{{ trans('message.responsible_department') }}</label>
                        <div class="col-sm-9">
                            <select id='dep' style='width: 200px;' class="custom-select my-select" name="responsible_department">
                                <option value='' disabled selected>{{ trans('message.select_department') }}</option>@foreach($deps as $dep)<option value="{{ $dep->department_name_th }}">{{ $dep->department_name_th }}</option>@endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="exampleInputfund_details" class="col-sm-2 ">{{ trans('message.project_details') }}</label>
                        <div class="col-sm-9">
                            <textarea type="text" name="note" class="form-control form-control-lg" style="height:150px" placeholder="{{ trans('message.note') }}" value="{{ old('note') }}"></textarea>
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="exampleInputstatus" class="col-sm-2 ">{{ trans('message.status') }}</label>
                        <div class="col-sm-3">
                            <select id='status' class="custom-select my-select" name="status">
                                <option value="" disabled selected>{{ trans('message.status') }}</option>
                                <option value="1">{{ trans('message.submitted') }}</option>
                                <option value="2">{{ trans('message.in_progress') }}</option>
                                <option value="3">{{ trans('message.completed') }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mt-2">
                        <label for="exampleInputfund_details" class="col-sm-2 ">{{trans('message.project_manager')}}</label>
                        <div class="col-sm-9">
                            <select id='head0' style='width: 200px;' name="head">
                                <option value=''>{{trans('message.select_user')}}</option>@foreach($users as $user)<option value="{{ $user->id }}">{{ $user->fname_th }} {{ $user->lname_th }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="exampleInputfund_details" class="col-sm-2 ">{{trans('message.internal_co_manager')}}</label>
                        <div class="col-sm-9">
                            <table class="table" id="dynamicAddRemove">
                                <tr>
                                    <th><button type="button" name="add" id="add-btn2" class="btn btn-success btn-sm add"><i class="mdi mdi-plus"></i></button></th>
                                </tr>
                                <tr>
                                    <td><select id='selUser0' style='width: 200px;' name="moreFields[0][userid]">
                                            <option value=''>{{trans('message.select_user')}}</option>@foreach($users as $user)<option value="{{ $user->id }}">{{ $user->fname_th }} {{ $user->lname_th }}</option>
                                            @endforeach
                                        </select></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="exampleInputpaper_doi" class="col-sm-2 ">{{__('message.external_co_manager')}}</label>
                        <div class="col-sm-9">
                            <div class="table-responsive">
                                <table class="table table-hover small-text" id="tb">
                                    <tr class="tr-header">
                                        <th>{{trans('message.title')}}</th>
                                        <th>{{trans('message.first_name')}}</th>
                                        <th>{{trans('message.last_name')}}</th>
                                        <th><a href="javascript:void(0);" style="font-size:18px;" id="addMore2" title="Add More Person"><i class="mdi mdi-plus"></i></span></a></th>
                                    <tr>
                                        <td><input type="text" name="title_name[]" class="form-control" placeholder="{{__('message.title')}}"></td>
                                        <td><input type="text" name="fname[]" class="form-control" placeholder="{{__('message.first_name')}}"></td>
                                        <td><input type="text" name="lname[]" class="form-control" placeholder="{{__('message.last_name')}}"></td>
                                        <td><a href='javascript:void(0);' class='remove'><span><i class="mdi mdi-minus"></span></a></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="pt-4">
                        <button type="submit" class="btn btn-primary me-2">{{ trans('message.submit') }}</button>
                        <a class="btn btn-light" href="{{ route('researchProjects.index')}}">{{ trans('message.cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
