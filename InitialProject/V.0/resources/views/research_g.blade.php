@extends('layouts.layout')
@section('content')
<div class="container card-3 ">
    <p>{{__('message.ResearchGroup')}}</p>
    @foreach ($resg as $rg)
    <div class="card mb-4">
        <div class="row g-0">
            <div class="col-md-4">
                <div class="card-body">
                    <img src="{{asset('img/'.$rg->group_image)}}" alt="...">
                    <h2 class="card-text-1"> {{ __('message.Laboratory Supervisor')}} </h2>
                    
                    <h2 class="card-text-2">
                        @foreach ($rg->user as $r)
                            @if($r->hasRole('teacher')) <!-- เช็คว่า user นี้มี role เป็น teacher -->
                                @if(app()->getLocale() == 'en' and $r->academic_ranks_en == 'Lecturer' and $r->doctoral_degree == 'Ph.D.')
                                    {{ $r->{'fname_'.app()->getLocale()} }} {{ $r->{'lname_'.app()->getLocale()} }}, Ph.D.
                                    <br>
                                @elseif(app()->getLocale() == 'en' and $r->academic_ranks_en == 'Lecturer')
                                    {{ $r->{'fname_'.app()->getLocale()} }} {{ $r->{'lname_'.app()->getLocale()} }}
                                     <br>
                                @elseif(app()->getLocale() == 'en' and $r->doctoral_degree == 'Ph.D.')
                                    {{ str_replace('Dr.', ' ', $r->{'position_'.app()->getLocale()}) }} {{ $r->{'fname_'.app()->getLocale()} }} {{ $r->{'lname_'.app()->getLocale()} }}, Ph.D.
                                    <br>
                                @elseif(app()->getLocale() == 'zh') <!-- ถ้าเป็นภาษาจีน จะใช้ข้อมูลภาษาอังกฤษ -->
                                    {{ $r->{'position_en'} }} {{ $r->{'fname_en'} }} {{ $r->{'lname_en'} }}
                                    <br>
                                @else                            
                                    {{ $r->{'position_'.app()->getLocale()} }} {{ $r->{'fname_'.app()->getLocale()} }} {{ $r->{'lname_'.app()->getLocale()} }}
                                    <br>
                                @endif
                            @endif
                        @endforeach
                    </h2>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $rg->{'group_name_'.(app()->getLocale() == 'zh' ? 'en' : app()->getLocale())} }}
                    </h5>

                    <h3 class="card-text">
                        {{ Str::limit($rg->{'group_desc_'.(app()->getLocale() == 'zh' ? 'en' : app()->getLocale())}, 350) }}
                    </h3>
                </div>
                <!-- Show Research Focus -->
                <div class="card-body">
                    <!-- แก้ไขหัวข้อให้แสดงเป็นภาษาไทยหรืออังกฤษ -->
                    <h5 class="card-title">
                        @if(app()->getLocale() == 'en')
                            Main Research Areas/Topics
                        @elseif(app()->getLocale() == 'th')
                            หัวข้อวิจัยที่เป็นจุดเน้นของกลุ่ม
                        @else
                            主要研究领域/主题
                        @endif
                    </h5>
                    <ul class="card-text-2">
                        @foreach ($rg->researchFocus as $focus)
                                <li>{{ $focus->research_topic_en }}</li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <a href="{{ route('researchgroupdetail',['id'=>$rg->id])}}"
                        class="btn btn-outline-info">{{ trans('message.details') }}</a>
                </div>
                
            </div>
        </div>
    </div>
    @endforeach
</div>

@stop