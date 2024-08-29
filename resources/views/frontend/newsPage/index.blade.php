@extends('layouts.frontend')
@section('frontend-content')
    {{-- start news banner  --}}
    <div class="news_banner">
        <div class="container news_banner_slider">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($news_banner as $index => $banner)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }} news-carousel-item">
                            <a href="{{ $banner->link ?? '#' }}">
                                <img src="{{ asset('images/' . $banner->image) }}" class="d-block w-100"
                                    alt="{{ $banner->title }}">
                                <div class="overlay"></div>
                                <div class="text-light">
                                    <h1>{{ $banner->title }}</h1>
                                    <p>{{ $banner->description }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- end news banner  --}}

    {{-- start Headlines section  --}}
    <div class="news_headlines">
        <h1 class="text-light text-center">{{ $headline->title }}</h1>
        <p class="text-light text-center">{{ $headline->short_description }}</p>
        <div class="news_headlines_width container mt-4">
            <div class="d-flex flex-column flex-md-row gap-4 gap-md-0">
                @if ($stories->count() > 0)
                    <div class="w-md-50 pe-2">
                        <img class="news_headlines_img_1 rounded-4" src="{{ asset('images/' . $stories[0]->image) }}"
                            alt="{{ $stories[0]->title }}">
                        <a href="{{ $stories[0]->link ?? '#' }}" class="text-light">
                            {{ $stories[0]->title }}
                            {{ $stories[0]->description }}
                        </a>
                    </div>
                @endif

                <div class="w-md-50">
                    @if ($stories->count() > 1)
                        <div class="mb-md-2 mb-4">
                            <img class="news_headlines_img_2 rounded-4" src="{{ asset('images/' . $stories[1]->image) }}"
                                alt="{{ $stories[1]->title }}">
                            <a href="{{ $stories[1]->link ?? '#' }}" class="text-light">
                                {{ $stories[1]->title }}
                            </a>
                        </div>
                    @endif

                    @if ($stories->count() > 2)
                        <div class="d-flex flex-column flex-md-row gap-4 gap-md-0">
                            @foreach ($stories->slice(2, 2) as $news)
                                <div class="w-md-50 w-100  {{ $loop->first ? 'pe-2' : '' }}" style="object-fit: cover">
                                    <img class="news_headlines_img_3 rounded-4" src="{{ asset('images/' . $news->image) }}"
                                        alt="{{ $news->title }}">
                                    <a href="{{ $news->link ?? '#' }}" class="text-light">
                                        {{ $news->title }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
    {{-- end headlines section  --}}

    {{-- start stories section --}}
    <div class="stories">
        <h1 class="text-center fw-bold mb-4">More Stories</h1>
        <div class="d-flex flex-column flex-md-row align-items-center align-items-md-start gap-3 flex-md-wrap">
            @foreach ($stories as $item)
                <a class="stories_post" href="{{$item->link}}">
                    <img class="rounded-4"
                        src="{{asset('images/'.$item->image)}}" alt="">
                    <p>{{$item->title}}</p>
                </a>
            @endforeach
        </div>
    </div>
    {{-- end stories section  --}}
@endsection
