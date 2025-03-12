@extends('dashboards.users.layouts.user-dash-layout')
@section('title', __('message.dashboard'))

@section('content')
<h3 style="padding-top: 10px;">{{ __('message.WelcomeDashboardUser') }}</h3>
<br>
<h4>{{ __('message.Hello') }} 
    @if(App::getLocale() == 'th') 
        {{ Auth::user()->position_th }} {{ Auth::user()->fname_th }} {{ Auth::user()->lname_th }}
    @else
        {{ Auth::user()->position_en }} {{ Auth::user()->fname_en }} {{ Auth::user()->lname_en }}
    @endif
</h4>
@endsection
