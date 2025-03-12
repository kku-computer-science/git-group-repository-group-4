@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title">{{ __('message.create_research_group') }}</h4>
            <p class="card-description">{{ __('message.edit_research_group_details') }}</p>
            <form action="{{ route('researchGroups.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <p class="col-sm-3 "><b>{{ __('message.group_name_th') }}</b></p>
                    <div class="col-sm-8">
                        <input name="group_name_th" value="{{ old('group_name_th') }}" class="form-control"
                            placeholder={{ __('message.group_name_th') }}>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 "><b>{{ __('message.group_name_en') }}</b></p>
                    <div class="col-sm-8">
                        <input name="group_name_en" value="{{ old('group_name_en') }}" class="form-control"
                            placeholder={{ __('message.group_name_en') }}>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ __('message.group_desc_th') }}</b></p>
                    <div class="col-sm-8">
                        <textarea name="group_desc_th" value="{{ old('group_desc_th') }}" class="form-control"
                            style="height:90px"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ __('message.group_desc_en') }}</b></p>
                    <div class="col-sm-8">
                        <textarea name="group_desc_en" value="{{ old('group_desc_en') }}" class="form-control"
                            style="height:90px"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ __('message.group_detail_th') }}</b></p>
                    <div class="col-sm-8">
                        <textarea name="group_detail_en" value="{{ old('group_detail_th') }}" class="form-control"
                            style="height:90px"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ __('message.group_detail_en') }}</b></p>
                    <div class="col-sm-8">
                        <textarea name="group_detail_en" value="{{ old('group_detail_en') }}" class="form-control"
                            style="height:90px"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ __('message.image') }}</b></p>
                    <div class="col-sm-8">
                        <input type="file" name="group_image" class="form-control" value="{{ old('group_image') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ __('message.group_leader') }}</b></p>
                    <div class="col-sm-8">
                        <select id='head0' name="head">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">
                                    {{ $user->{"fname_" . (app()->getLocale() === 'zh' ? 'en' : app()->getLocale())} }}
                                    {{ $user->{"lname_" . (app()->getLocale() === 'zh' ? 'en' : app()->getLocale())} }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 pt-4"><b>{{ __('message.group_members') }}</b></p>
                    <div class="col-sm-8">
                        <table class="table" id="dynamicAddRemove">
                            <tr>
                                <th><button type="button" name="add" id="add-btn2" class="btn btn-success btn-sm add"><i
                                            class="mdi mdi-plus"></i></button></th>
                            </tr>
                        </table>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary upload mt-5">{{__('message.submit')}}</button>
                <a class="btn btn-light mt-5" href="{{ route('researchGroups.index')}}"> {{__('message.back')}}</a>
                </form>
        </div>
    </div>
</div>

@stop
@section('javascript')
<!-- <script type="text/javascript">
$("body").on("click",".upload",function(e){
    $(this).parents("form").ajaxForm(options);
  });


  var options = { 
    complete: function(response) 
    {
        if($.isEmptyObject(response.responseJSON.error)){
            // $("input[name='title']").val('');
            // alert('Image Upload Successfully.');
        }else{
            printErrorMsg(response.responseJSON.error);
        }
    }
  };


  function printErrorMsg (msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display','block');
    $.each( msg, function( key, value ) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    });
  }
</script> -->
<script>
$(document).ready(function() {
    $("#selUser0").select2()
    $("#head0").select2()

    var i = 0;

    $("#add-btn2").click(function() {

        ++i;
        $("#dynamicAddRemove").append('<tr><td><select id="selUser' + i + '" name="moreFields[' + i + '][userid]" style="width: 200px;"><option value="">Select User</option>@foreach($users as $user)<option value="{{ $user->id }}">{{ $user["fname_" . (app()->getLocale() === "zh" ? "en" : app()->getLocale())] }} {{ $user["lname_" . (app()->getLocale() === "zh" ? "en" : app()->getLocale())] }}</option>@endforeach</select></td><td><button type="button" class="btn btn-danger btn-sm remove-tr"><i class="fas fa-minus"></i></button></td></tr>');
        $("#selUser" + i).select2()
    });
    $(document).on('click', '.remove-tr', function() {
        $(this).parents('tr').remove();
    });

});
</script>
@stop