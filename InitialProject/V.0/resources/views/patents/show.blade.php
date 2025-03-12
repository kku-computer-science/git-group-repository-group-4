@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<div class="container">
    <div class="card col-md-8" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title">{{ __('message.other_academic_works') }}</h4>
            <p class="card-description">{{ __('message.academic_work_details') }}</p>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('message.name') }}</b></p>
                <p class="card-text col-sm-9">{{ $patent->ac_name }}</p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('message.type') }}</b></p>
                <p class="card-text col-sm-9">{{ __('message.patents.' . $patent->ac_type) }}</p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('message.registration_date') }}</b></p>
                <p class="card-text col-sm-9">{{ $patent->ac_year }}</p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('message.registration_number') }}</b></p>
                <p class="card-text col-sm-9">{{ __('message.number') }} : {{ $patent->ac_refnumber }}</p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('message.author_ac') }}</b></p>
                <p class="card-text col-sm-9">
                    @foreach($patent->user as $a)
                        {{ $a->{'fname_' . (App::getLocale() === 'zh' ? 'en' : App::getLocale())} }}
                        {{ $a->{'lname_' . (App::getLocale() === 'zh' ? 'en' : App::getLocale())} }}
                        @if (!$loop->last),@endif
                    @endforeach
                </p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('message.co_author_ac') }}</b></p>
                <p class="card-text col-sm-9">
                @foreach($patent->author as $a)
                    {{ $a->author_fname }} {{ $a->author_lname }}
                @if (!$loop->last),@endif
                @endforeach
                </p>
            </div>
            
            <div class="pull-right mt-5">
                <a class="btn btn-primary btn-sm" href="{{ route('patents.index') }}"> Back</a>
            </div>
        </div>
    </div>
</div>
@endsection