@extends('layouts.layout')
<style>
    .name {

        font-size: 20px;

    }

</style>
@section('content')
<div class="container card-4 mt-5">
    <div class="card">
        @foreach ($resgd as $rg)
        <div class="row g-0">
            <div class="col-md-4">
                <div class="card-body">
                    <img src="{{asset('img/'.$rg->group_image)}}" alt="...">
                    <h1 class="card-text-1"> Laboratory Supervisor </h1>
                    <h2 class="card-text-2">
                        @foreach ($rg->user as $r)
                        @if($r->hasRole('teacher'))
                        @if(app()->getLocale() == 'en' and $r->academic_ranks_en == 'Lecturer' and $r->doctoral_degree == 'Ph.D.')
                             {{ $r->{'fname_'.app()->getLocale()} }} {{ $r->{'lname_'.app()->getLocale()} }}, Ph.D.
                            <br>
                            @elseif(app()->getLocale() == 'en' and $r->academic_ranks_en == 'Lecturer')
                            {{ $r->{'fname_'.app()->getLocale()} }} {{ $r->{'lname_'.app()->getLocale()} }}
                            <br>
                            @elseif(app()->getLocale() == 'en' and $r->doctoral_degree == 'Ph.D.')
                            {{ str_replace('Dr.', ' ', $r->{'position_'.app()->getLocale()}) }} {{ $r->{'fname_'.app()->getLocale()} }} {{ $r->{'lname_'.app()->getLocale()} }}, Ph.D.
                            <br>
                            @else                            
                            {{ $r->{'position_'.app()->getLocale()} }} {{ $r->{'fname_'.app()->getLocale()} }} {{ $r->{'lname_'.app()->getLocale()} }}
                            <br>
                            @endif
                        
                        @endif
                        @endforeach
                    </h2>
                    <h1 class="card-text-1"> Student </h1>
                    <h2 class="card-text-2">
                        @foreach ($rg->user as $user)
                        @if($user->hasRole('student'))
                        {{$user->{'position_'.app()->getLocale()} }} {{$user->{'fname_'.app()->getLocale()} }} {{$user->{'lname_'.app()->getLocale()} }}
                        <br>
                        @endif
                        @endforeach
                    </h2>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body" style="position: relative;">
                    <h5 class="card-title"> {{ $rg->{'group_name_'.app()->getLocale()} }}</h5>
                    <h3 class="card-text">{{$rg->{'group_detail_'.app()->getLocale()} }}</h3>
                </div>
                <!-- Show Research Focus -->
                <div class="card-body" style="position: relative;">
                    <h5 class="card-title">
                        @if(app()->getLocale() == 'en')
                            Main Research Areas/Topics
                        @else
                            หัวข้อวิจัยที่เป็นจุดเน้นของกลุ่ม
                        @endif
                    </h5>
                    <ul class="card-text-2">
                        @foreach ($rg->researchFocus as $focus)
                            @if(app()->getLocale() == 'en')
                                <li>{{ $focus->research_topic_en }}</li>
                            @else
                                <li>{{ $focus->research_topic_th }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
<!-- 🔽 Contact Person Section -->
<div class="card-body" style="position: relative;">
    <h5 class="card-title">
        @if(app()->getLocale() == 'en')
            Contact Person
        @else
            ผู้ติดต่อ
        @endif
    </h5>

    @foreach ($rg->contactPersons as $contact)
    <div class="row align-items-center">
        <!-- ข้อมูลชื่อและอีเมล -->
        <div class="col-md-8">
             <h5 class="card-text-2 mt-n1">
                @if(app()->getLocale() == 'en')
                    {{ $contact->position_en ?? 'N/A' }}{{ $contact->fname_en ?? 'N/A' }}
                    {{ $contact->lname_en ?? 'N/A' }},
                    {{ $contact->doctoral_degree ?? '' }}
                @else
                    {{ $contact->position_th ?? 'N/A' }}{{ $contact->fname_th ?? 'N/A' }}
                    {{ $contact->lname_th ?? 'N/A' }}
                @endif
                ( {{ $contact->email ?? 'N/A' }} )    
            </h5>
        </div>

        <!-- รูปภาพ -->
        <div class="col-md-8 mt-n4">
         <img class="card-image" src="{{ $contact->picture}}" alt="">
    </div>
@endforeach
</div>

                <!-- ปุ่ม Back  -->
                <a href="{{ route('researchgroup') }}" class="btn btn-primary back-btn" style="position: absolute; bottom: 20px; right: 20px;">
                        @if(app()->getLocale() == 'en')
                            Back
                        @else
                            ย้อนกลับ
                        @endif
                </a>
            </div>

            @endforeach

            <!-- <div id="loadMore">
                <a href="#"> Load More </a>
            </div> -->
        </div>


    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    $(document).ready(function() {
        $(".moreBox").slice(0, 1).show();
        if ($(".blogBox:hidden").length != 0) {
            $("#loadMore").show();
        }
        $("#loadMore").on('click', function(e) {
            e.preventDefault();
            $(".moreBox:hidden").slice(0, 1).slideDown();
            if ($(".moreBox:hidden").length == 0) {
                $("#loadMore").fadeOut('slow');
            }
        });
    });
</script>

@stop
<!-- <div class="card-body-research">
                    <p>Research</p>
                    <table class="table">
                        @foreach($rg->user as $user)
                        
                        <thead>
                            <tr>
                                <th><b class="name">{{$user->{'position_'.app()->getLocale()} }} {{$user->{'fname_'.app()->getLocale()} }} {{$user->{'lname_'.app()->getLocale()} }}</b></th>
                            </tr>
                            @foreach($user->paper->sortByDesc('paper_yearpub') as $p)
                            <tr class="hidden">
                                <th>
                                    <b><math>{!! html_entity_decode(preg_replace('<inf>', 'sub', $p->paper_name)) !!}</math></b> (
                                    <link>@foreach($p->teacher as $teacher){{$teacher->fname_en}} {{$teacher->lname_en}},
                                    @endforeach
                                    @foreach($p->author as $author){{$author->author_fname}} {{$author->author_lname}}@if (!$loop->last),@endif
                                    @endforeach</link>), {{$p->paper_sourcetitle}}, {{$p->paper_volume}},
                                    {{ $p->paper_yearpub }}.
                                    <a href="{{$p->paper_url}} " target="_blank">[url]</a> <a href="https://doi.org/{{$p->paper_doi}}" target="_blank">[doi]</a>
                                </th>
                            </tr>
                            @endforeach
                        </thead>
                        @endforeach
                    </table>
                </div> -->