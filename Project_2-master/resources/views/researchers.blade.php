@extends('layouts.layout')
@section('content')
<div class="container card-2">
    <p class="title">Researchers</p>

    <div class="d-flex">
        <div class="ml-auto">
            <form class="row row-cols-lg-auto g-3" method="GET" action="{{ route('researchers') }}"> {{-- เปลี่ยน route
                ใน form --}}
                <div class="col-md-8">
                    <div class="input-group">
                        <input type="text" class="form-control" name="textsearch" placeholder="Research interests"
                            value="{{ request('textsearch') }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-outline-primary">Search</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-2 g-0">
        @foreach($users as $r) {{-- loop เฉพาะ $users --}}
            <a href="{{ route('detail', Crypt::encrypt($r->id)) }}">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-sm-4">
                            <img class="card-image" src="{{ $r->picture ?? asset('img/default_profile.png') }}"
                                alt="{{ $r->fname_en }} {{ $r->lname_en }}"> {{-- ใช้ null coalescing operator --}}
                        </div>
                        <div class="col-sm-8 overflow-hidden"
                            style="text-overflow: clip; @if(app()->getLocale() == 'en') max-height: 220px; @else max-height: 210px;@endif">
                            <div class="card-body">
                                @if(app()->getLocale() == 'en')
                                    @if($r->doctoral_degree == 'Ph.D.')
                                        <h5 class="card-title">{{ $r->fname_en }} {{ $r->lname_en }}, {{$r->doctoral_degree}}</h5>
                                    @else
                                        <h5 class="card-title">{{ $r->fname_en }} {{ $r->lname_en }}</h5>
                                    @endif
                                    <h5 class="card-title-2">{{ $r->academic_ranks_en }}</h5> {{-- ใช้ภาษาอังกฤษเสมอสำหรับ
                                    academic rank --}}
                                @else
                                    <h5 class="card-title">{{ $r->position_th }} {{ $r->fname_th }} {{ $r->lname_th }}</h5>
                                @endif
                                <p class="card-text-1">{{ trans('message.expertise') }}</p>
                                <div class="card-expertise">
                                    @foreach($r->expertise->sortBy('expert_name') as $exper)
                                        <p class="card-text">{{$exper->expert_name}}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
@stop