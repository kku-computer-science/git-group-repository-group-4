@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<div class="container">
    <div class="card col-md-8" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title">{{ __('message.fund_details') }}</h4>
            <p class="card-description">{{ __('message.fund_info') }}</p>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('fund.fund_name') }}</b></p>
                <p class="card-text col-sm-9">{{ $fund->fund_name }}</p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('fund.fund_year') }}</b></p>
                <p class="card-text col-sm-9">{{ $fund->fund_year }}</p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('fund.fund_details') }}</b></p>
                <p class="card-text col-sm-9">{{ $fund->fund_details }}</p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('fund.fund_type') }}</b></p>
                <p class="card-text col-sm-9">
                @if(app()->getLocale() == 'th')
                    {{ $fund->fund_type }}
                @elseif(app()->getLocale() == 'zh')
                    {{ $fund->fund_type_cn }}
                @else
                    {{ $fund->fund_type_en }}
                @endif
            </p>
            </div>
            
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('fund.fund_level') }}</b></p>
                <p class="card-text col-sm-9">
                @if(app()->getLocale() == 'th')
                    {{ $fund->fund_level }}
                @elseif(app()->getLocale() == 'zh')
                    {{ $fund->fund_level_cn }}
                @else
                    {{ $fund->fund_level_en }}
                @endif
            </p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('fund.fund_agency') }}</b></p>
                <p class="card-text col-sm-9">{{ $fund->fund_name }}</p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('fund.added_by') }}</b></p>
                <p class="card-text col-sm-9">
            @php
            $locale = app()->getLocale(); // ดึงภาษาปัจจุบัน
            $fname = $fund->user->{"fname_$locale"} ?? $fund->user->fname_en;
            $lname = $fund->user->{"lname_$locale"} ?? $fund->user->lname_en;
            @endphp
            {{ $fname }} {{ $lname }}
    </p>
</div>

            <div class="pull-right mt-5">
                <a class="btn btn-primary btn-sm" href="{{ route(name: 'funds.index') }}">{{ __('fund.back') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
