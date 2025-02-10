@extends('layouts.layout')

@section('content')
<div class="container card-2">
    <p class="title">Researchers</p>

    <!-- Dropdown สำหรับกรองประเภทนักวิจัย -->
    <div class="mb-3">
        <select class="form-select" id="programFilter" onchange="filterResearchers()">
            <option value="all">All</option>
            @foreach($programs as $program)
                <option value="{{ $program->id }}">{{ $program->program_name_en }}</option>
            @endforeach
        </select>
    </div>

    <!-- Search Bar -->
    <div class="d-flex">
        <div class="ml-auto">
            <form class="row row-cols-lg-auto g-3" method="GET" action="{{ route('researchers') }}">
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
                                <h5 class="card-title">{{ $r->fname_en }} {{ $r->lname_en }}, {{$r->doctoral_degree}}</h5>
                                <h5 class="card-title-2">{{ $r->academic_ranks_en }}</h5>
                                <p class="card-text-1">Research Field:</p>
                                <div class="card-expertise">
                                    <p class="card-text">{{ $r->program->program_name_en }}</p>
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
        grid-template-columns: repeat(2, minmax(300px, 1fr)); /* แถวละ 2 คน */
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
    font-size: 0.875rem; /* ลดขนาดฟอนต์ */
    padding: 0.375rem 0.75rem; /* ลดระยะห่างภายใน */
    max-width: 200px; /* กำหนดความกว้างสูงสุด */
}

    
    @media (max-width: 768px) {
        .researcher-container {
            grid-template-columns: repeat(1, 1fr);
        }
    }
</style>

@stop
