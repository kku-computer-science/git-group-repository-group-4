@extends('layouts.layout')

@section('content')
<div class="container card-2">
    <p class="title">{{ __('message.Researchers')}}</p>

    <!-- Dropdown สำหรับกรองประเภทนักวิจัย -->
    <div class="mb-3">
    <select class="form-select" id="programFilter" onchange="filterResearchers()">
    <option value="all">{{ __('message.All') }}</option> <!-- แปลข้อความ "All" -->
    @foreach($programs as $program)
        <option value="{{ $program->id }}">
            @if(app()->getLocale() == 'th')
                {{ $program->program_name_th }} <!-- แสดงชื่อโปรแกรมภาษาไทยเมื่อ locale เป็น 'th' -->
            @else
                {{ $program->program_name_en }} <!-- แสดงชื่อโปรแกรมภาษาอังกฤษเมื่อ locale เป็น 'en' -->
            @endif
        </option>
    @endforeach
</select>
    </div>

    <!-- Search Bar -->
    <div class="d-flex">
        <div class="ml-auto">
            <form class="row row-cols-lg-auto g-3" method="GET" action="{{ route('researchers') }}">
                <div class="col-md-8">
                    <div class="input-group">
                        <input type="text" class="form-control" name="textsearch" placeholder="{{__('message.Researchinterests')}}"
                            value="{{ request('textsearch') }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-outline-primary">{{__('message.Search')}}</button>
                </div>
            </form>
        </div>
    </div>

    <!-- รายชื่อนักวิจัย -->
    <div class="researcher-container">
        @foreach($users as $r)
            <div class="researcher-item">
                <div class="card researcher-card" data-field="{{ $r->program_id }}">
                    <a href="{{ route('detail', Crypt::encrypt($r->id)) }}" class="researcher-link">
                        <!-- <p class="debug-text">DEBUG: {{ $r->program_id }}</p> Debug -->
                        <div class="row">
                            <div class="col-sm-4">
                                <img class="card-image" src="{{ $r->picture ?? asset('img/default_profile.png') }}"
                                    alt="{{ $r->fname_en }} {{ $r->lname_en }}">
                            </div>
                            <div class="col-sm-8 overflow-hidden">
                                <div class="card-body">
                                <h5 class="card-title">
                                @if(app()->getLocale() == 'th')
                                    {{ $r->fname_th }} {{ $r->lname_th }} <!-- ใช้ชื่อภาษาไทย -->
                                @else
                                    {{ $r->fname_en }} {{ $r->lname_en }} <!-- ใช้ชื่อภาษาอังกฤษ -->
                                @endif,
                                @if(app()->getLocale() == 'th')
                                    {{ $r->position_th }} <!-- ใช้ระดับการศึกษาเป็นภาษาไทย -->
                                @else
                                    {{ $r->doctoral_degree }} <!-- ใช้ระดับการศึกษาเป็นภาษาอังกฤษ -->
                                @endif
                            </h5>
                            <h5 class="card-title-2">
                                @if(app()->getLocale() == 'th')
                                    {{ $r->academic_ranks_th }} <!-- ใช้ตำแหน่งทางวิชาการเป็นภาษาไทย -->
                                @else
                                    {{ $r->academic_ranks_en }} <!-- ใช้ตำแหน่งทางวิชาการเป็นภาษาอังกฤษ -->
                                @endif
                            </h5>
                                    <p class="card-text-1">{{__('message.Research Field')}}</p>
                                    <div class="card-expertise">
                                        <p class="card-text">
                                            @if(app()->getLocale() == 'th')
                                                {{ $r->program->program_name_th }} <!-- แสดงชื่อโปรแกรมภาษาไทย -->
                                            @else
                                                {{ $r->program->program_name_en }} <!-- แสดงชื่อโปรแกรมภาษาอังกฤษ -->
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- 🔹 ส่วนแสดง "นักศึกษา" -->
<div class="researcher-container">
    @foreach ($students as $s)
        <div class="researcher-item">
            <div class="card researcher-card" data-field="{{ $s->program_id }}">
                <a href="{{ route('detail', Crypt::encrypt($s->id)) }}" class="researcher-link">
                    <div class="row">
                        <!-- 🔹 รูปภาพ -->
                        <div class="col-sm-4">
                            <img class="card-image" 
                                 src="{{ $s->picture ?? asset('img/default_profile.png') }}" 
                                 alt="{{ $s->fname_en }} {{ $s->lname_en }}">
                        </div>

                        <!-- 🔹 ข้อมูลนักศึกษา -->
                        <div class="col-sm-8 overflow-hidden">
                            <div class="card-body">
                                <h5 class="card-title">
                                    @if(app()->getLocale() == 'th')
                                        {{ $s->fname_th }} {{ $s->lname_th }}
                                    @else
                                        {{ $s->fname_en }} {{ $s->lname_en }}
                                    @endif
                                </h5>
                                <p class="card-text-1">{{ __('message.Program') }}</p>
                                <div class="card-expertise">
                                    <p class="card-text">
                                        @if(app()->getLocale() == 'th')
                                            {{ $s->program->program_name_th }}
                                        @else
                                            {{ $s->program->program_name_en }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @endforeach
</div>


<!-- JavaScript สำหรับกรองข้อมูล -->
<script>
    function filterResearchers() {
        let dropdown = document.getElementById('programFilter');
        let selectedProgramId = dropdown.value;
        let researchers = document.querySelectorAll('.researcher-item');

        researchers.forEach(item => {
            let researcherField = item.querySelector('.researcher-card').getAttribute('data-field');

            if (selectedProgramId === "all" || researcherField === selectedProgramId) {
                item.style.display = "block";
            } else {
                item.style.display = "none";
            }
        });
    }

</script>

<!-- CSS -->
<style>
    .researcher-container {
        display: grid;
        grid-template-columns: repeat(2, minmax(300px, 1fr));
        /* แถวละ 2 คน */
        gap: 20px;
        padding: 20px;
        justify-items: center;
        align-items: start;
    }

    .researcher-item {
        width: 100%;
    }

    .researcher-card {
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
        width: 100%;
    }

    .researcher-card:hover {
        transform: scale(1.05);
    }

    /* ปรับขนาด dropdown */
    #programFilter {
        font-size: 0.875rem;
        /* ลดขนาดฟอนต์ */
        padding: 0.375rem 0.75rem;
        /* ลดระยะห่างภายใน */
        max-width: 200px;
        /* กำหนดความกว้างสูงสุด */
    }


    @media (max-width: 768px) {
        .researcher-container {
            grid-template-columns: repeat(1, 1fr);
        }
    }
</style>

@stop