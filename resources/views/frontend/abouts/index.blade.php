@extends('layouts.frontend')
@section('frontend-content')
    {{-- start Aboutus banner section --}}
    <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            @foreach ($aboutBanner as $index => $image)
                <button type="button" data-bs-target="#carouselExampleRide" data-bs-slide-to="{{ $index }}"
                    class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}"
                    aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($aboutBanner as $index => $image)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }} about_banner_img">
                    <img src="{{ asset('images/' . $image->image) }}" class="d-block w-100" alt="Slide {{ $index + 1 }}">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    {{-- end Aboutus banner section  --}}


    {{-- start about description  --}}
    <div class="about_description container mt-4">
        <h1>{{ $about->about_title }}</h1>
        <p>{{ $about->long_description }}</p>
        <div class="about_details">
            @foreach ($aboutDetails as $item)
                <div class="about_details_div d-flex gap-4 align-items-center">
                    <img src="{{ asset('images/' . $item->icon) }}" alt="">
                    <h3>{{ $item->title }}</h3>
                </div>
            @endforeach
        </div>
    </div>
    {{-- end about description  --}}

    {{-- mission and vision section  --}}
    <div class="container">
        <div class="mission_vision_section d-flex gap-4 align-items-center flex-column flex-md-row">
            <img src="{{ asset('images/' . $mission_vision->image) }}" alt="" class="img-fluid img-md-fluid">
            <div>
                <div>
                    <h1>MISSION</h1>
                    <p>{{ $mission_vision->mission_description }}</p>
                </div>
                <div>
                    <h1>VISION</h1>
                    <p>{{ $mission_vision->vision_description }}</p>
                </div>
            </div>
        </div>
    </div>
    {{-- end mission and vision section  --}}



    {{-- start Management section  --}}
    <div class="management">
        <div class="container">
            <h1>Executive Management</h1>
            <div class="d-flex justify-content-center gap-4 flex-column align-items-center flex-md-row flex-wrap">
                @foreach ($management_members as $item)
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('images/'.$item->image)}}"
                            class="card-img-top" alt="image" height="220">
                        <div class="card-body">
                            <p class="card-text management_designation">{{$item->designation}}k</p>
                            <p class="card-text management_name">{{$item->name}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- end Management section  --}}
@endsection
