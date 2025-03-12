@extends('layouts.layout')

@section('content')
<div class="container card-2">
    <p class="title">{{ __('message.Researchers') }}</p>

    <!-- ช่องค้นหานักวิจัย -->
    <div class="d-flex">
        <div class="ml-auto">
            <form class="row row-cols-lg-auto g-3" method="GET" action="{{ route('researchers.search') }}">
                <div class="col-md-8">
                    <div class="input-group">
                        <input type="text" class="form-control" name="textsearch"
                            placeholder="{{ __('message.Researchinterests') }}" value="{{ request('textsearch') }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-outline-primary">{{ __('message.Search') }}</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ผลลัพธ์การค้นหานักวิจัย -->
    <div class="researcher-container">
        @if($users->isNotEmpty())
            @foreach($users as $r)
                <div class="researcher-item">
                    <div class="card researcher-card" data-field="{{ $r->program_id }}">
                        <a href="{{ route('detail', Crypt::encrypt($r->id)) }}" class="researcher-link">
                            <div class="row">
                                <div class="col-sm-4">
                                    <img class="card-image" src="{{ $r->picture ?? asset('img/default_profile.png') }}"
                                        alt="{{ $r->fname_en }} {{ $r->lname_en }}">
                                </div>
                                <div class="col-sm-8 overflow-hidden">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            @if(app()->getLocale() == 'th')
                                                {{ $r->fname_th }} {{ $r->lname_th }}
                                            @else
                                                {{ $r->fname_en }} {{ $r->lname_en }}
                                            @endif
                                        </h5>
                                        <p class="card-text-1">{{ __('message.Program') }}</p>
                                        <div class="card-expertise">
                                            <p class="card-text">
                                                @if(app()->getLocale() == 'th')
                                                    {{ $r->program->program_name_th }}
                                                @else
                                                    {{ $r->program->program_name_en }}
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
        @else
            <p>{{ __('No results found') }}</p>
        @endif
    </div>
</div>

<style>
    .researcher-container {
        display: grid;
        grid-template-columns: repeat(2, minmax(300px, 1fr));
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

    @media (max-width: 768px) {
        .researcher-container {
            grid-template-columns: repeat(1, 1fr);
        }
    }
</style>

@stop