@extends('layouts.frontend')
@section('frontend-content')
    {{-- start banner section  --}}
    <section class="video-banner">
        <!-- Video Background -->
        <video autoplay muted loop>
            <source src="{{ asset('video/' . $banner->video) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <!-- Centered Heading and Button -->
        <div class="banner-content">
            <p class="fs-1 fw-bold fst-sm-normal fs-sm-4">{{ $banner->title }}</p>
            <a href="{{ url('/') }}#connect" class="btn btn-primary">Contact Now</a>
        </div>
    </section>
    {{-- end of banner section  --}}



    {{-- journy section  --}}
    <div class="container d-flex flex-lg-row flex-column gap-3 journy-margin align-items-center">
        <div>
            <!-- Image with img-fluid class only on mobile devices -->
            <img src="{{ asset('images/' . $about->image) }}" alt="About Us" class="d-block d-md-none img-fluid">
            <!-- Image without img-fluid class on larger screens -->
            <img src="{{ asset('images/' . $about->image) }}" alt="About Us" class="d-none about_img d-md-block">
        </div>
        <div>
            <h2 class="journy-heading fs-1 fw-bold fs-sm-3 fs-md-1 ">{{ $about->title }}</h2>
            <p class="fs-5 fs-sm-6 fs-md-5">{{ $about->description }}</p>
            <a href="{{ route('abouts.index') }}" type="button" class="btn btn-primary">Read More</a>
        </div>
    </div>
    {{-- end of journy section  --}}


    {{-- start product section  --}}
    <div class="project_section">
        <h2 class="journy-heading fs-1 fw-bold fs-sm-3 fs-md-1 text-center mb-4">Product</h2>
        <div class="text-center d-flex gap-4 justify-content-center flex-wrap">
            @foreach ($products as $item)
                <div class="card project_section_card">
                    <img src="{{ asset('images/' . $item->images[0]->image) }}" class="card-img-top p-4" alt="...">
                    <div class="card-body">
                        <a href="{{ route('product-details.index', ['slug' => $item->slug]) }}"
                            class="product_link">{{ $item->name }}</a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="product_btn">
            <a href="{{ route('all-products') }}" class="btn product_btn">View all</a>
        </div>

    </div>

    {{-- end product section  --}}




    {{-- Industries Footprint section  --}}
    <div class="container" id="industry">
        <p class="journy-heading fs-1 fw-bold fs-sm-3 fs-md-1 text-center">Industries Footprint</p>
        <p class="fs-5 text-center">Core Industry</p>
        <div class="d-none d-md-block">
            <div class="row section-width">
                <!-- Large Image taking 50% width -->
                @if ($core_industry->isNotEmpty())
                    <a href="{{ $core_industry[0]->link }}" class="col-md-6 mb-2 p-0 relative-div img-div-1">
                        <img src="{{ asset('images/' . $core_industry[0]->image) }}" alt="Large Image" class=" w-100">
                        <div class="absolute-div">
                            <p>{{ $core_industry[0]->name }}</p>
                        </div>
                    </a>
                @endif

                <!-- Smaller Images taking the other 50% width -->
                @if ($core_industry->count() > 1)
                    <div class="col-md-6">
                        <div class="row">
                            @foreach ($core_industry->slice(1, 2) as $industry)
                                <div class="col-6 mb-2 pb-0 pe-0">
                                    <a href="{{ $industry->link }}" class="relative-div img-div-2">
                                        <img src="{{ asset('images/' . $industry->image) }}" alt="Small Image"
                                            class=" w-100">
                                        <div class="absolute-div">
                                            <p>{{ $industry->name }}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach

                            <!-- One image in the second row -->
                            @if ($core_industry->count() > 3)
                                <div class="col-12 pe-0">
                                    <a href="{{ $core_industry[3]->link }}" class="relative-div img-div-3">
                                        <img src="{{ asset('images/' . $core_industry[3]->image) }}" alt="Small Image"
                                            class=" w-100">
                                        <div class="absolute-div">
                                            <p>{{ $core_industry[3]->name }}</p>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>

            <!-- Additional images if any -->
            @if ($core_industry->count() > 4)
                <div class="d-md-flex d-none flex-wrap gap-1 section-width">
                    @foreach ($core_industry->slice(4) as $industry)
                        <a href="{{ $industry->link }}" class="col-md-3 img-div-4 p-0 relative-div">
                            <img src="{{ asset('images/' . $industry->image) }}" alt="Additional Image" class=" w-100">
                            <div class="absolute-div">
                                <p>{{ $industry->name }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="d-block d-md-none industries_footprint_mobile_margin">
            <div id="carouselExampleFade" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($core_industry as $index => $industry)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <a href="{{$industry->link}}" class="relative-div">
                                <img style="height: 300px; width: 100%; object-fit: cover;" src="{{ asset('images/' . $industry->image) }}" class="d-block w-100"
                                    alt="{{ $industry->name }}">
                                <div class="absolute-div">
                                    <p>{{ $industry->name }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
            </div>
        </div>
    </div>
    {{-- slider for mobile view  --}}

    </div>
    {{-- end Industries Footprint section  --}}



    {{-- Associate Industry section  --}}
    <div class="container associate_industry_section">
        <p class="fs-5 text-center">Associate Industry</p>
        <div class="d-none d-md-block">
            <div class="row section-width">
                <!-- Smaller Images taking the other 50% width -->
                <div class="col-md-6">
                    <div class="row">
                        @if ($associate_industry->count() > 0)
                            @foreach ($associate_industry->slice(0, 2) as $industry)
                                <div class="col-6 mb-2 pb-0 pe-0">
                                    <a href="{{$industry->link}}" class="relative-div">
                                        <img src="{{ asset('images/' . $industry->image) }}" alt="{{ $industry->name }}"
                                             class="associate_industry_img_1">
                                        <div class="absolute-div">
                                            <p>{{ $industry->name }}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endif
        
                        <!-- One image in the second row -->
                        @if ($associate_industry->count() > 2)
                            <div class="col-12 pe-0">
                                <a href="{{$associate_industry[2]->title}}" class="relative-div">
                                    <img src="{{ asset('images/' . $associate_industry[2]->image) }}" alt="{{ $associate_industry[2]->name }}"
                                         class="associate_industry_img_2">
                                    <div class="absolute-div">
                                        <p>{{ $associate_industry[2]->name }}</p>
                                    </div>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
        
                <div class="col-md-6">
                    <div class="row">
                        @if ($associate_industry->count() > 3)
                            <div class="col-md-6 pe-0">
                                <a href="{{$associate_industry[3]->link}}" class="relative-div">
                                    <img src="{{ asset('images/' . $associate_industry[3]->image) }}" alt="{{ $associate_industry[3]->name }}"
                                         class="associate_industry_img_3">
                                    <div class="absolute-div">
                                        <p>{{ $associate_industry[3]->name }}</p>
                                    </div>
                                </a>
                            </div>
                        @endif
        
                        @if ($associate_industry->count() > 4)
                            <div class="col-md-6">
                                <a href="{{$associate_industry[4]->link}}" class="relative-div">
                                    <img src="{{ asset('images/' . $associate_industry[4]->image) }}" alt="{{ $associate_industry[4]->name }}"
                                         class="associate_industry_img_4 mb-2">
                                    <div class="absolute-div">
                                        <p>{{ $associate_industry[4]->name }}</p>
                                    </div>
                                </a>
                                @if ($associate_industry->count() > 5)
                                    <a href="{{$associate_industry[5]->link}}" class="relative-div">
                                        <img src="{{ asset('images/' . $associate_industry[5]->image) }}" alt="{{ $associate_industry[5]->name }}"
                                             class="associate_industry_img_4">
                                        <div class="absolute-div">
                                            <p>{{ $associate_industry[5]->name }}</p>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Additional images if any -->
        @if ($associate_industry->count() > 4)
            <div class="d-md-flex d-none flex-wrap gap-1 section-width mt-2 associate_industry_section_flex">
                @foreach ($associate_industry->slice(4) as $industry)
                    <a href="{{ $industry->link }}" class="col-md-3 img-div-4 p-0 relative-div associate_industry_section_post">
                        <img src="{{ asset('images/' . $industry->image) }}" alt="Additional Image" class=" w-100">
                        <div class="absolute-div">
                            <p>{{ $industry->name }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif

        {{-- slider for mobile view  --}}
        <div class="d-block d-md-none industries_footprint_mobile_margin">
            <div id="carouselExampleFad" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($associate_industry as $index => $industry)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <a href="{{$industry->link}}" class="relative-div">
                                <img src="{{ asset('images/' . $industry->image) }}" class="d-block w-100"
                                    alt="{{ $industry->name }}" style="height: 300px; width: 100%; object-fit: cover;">
                                <div class="absolute-div">
                                    <p>{{ $industry->name }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFad" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFad" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
            </div>
        </div>
    </div>

    {{-- end associate industry section  --}}




    {{-- Milestones  section  --}}
    <div class="milestones_section" id="milestones">
        <div
            class="d-flex flex-column flex-md-row align-items-center justify-center milestones_section_width  mx-auto flexgap">
            <div class="milestones">
                <h2>Milestones Unfolded</h2>
                <ul>
                    <li>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                            color="#005fac" style="color:#005fac" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z">
                            </path>
                        </svg>
                        <p> Largest Mobile factory (approx. 180,000 sft) in Bangladesh</p>
                    </li>
                    <li>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                            color="#005fac" style="color:#005fac" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z">
                            </path>
                        </svg>
                        <p>Symphony Mobile HS brand achieved the BEST brand award in 2015, 2016, and 2017 in Bangladesh.</p>

                    </li>
                    <li>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                            color="#005fac" style="color:#005fac" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z">
                            </path>
                        </svg>
                        <p> First Bangladeshi local brand to export Mobile</p>
                    </li>
                    <li>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                            color="#005fac" style="color:#005fac" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z">
                            </path>
                        </svg>
                        <p>Awarded Green Factory for Edison Footwear in 2021</p>
                    </li>
                    <li>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                            color="#005fac" style="color:#005fac" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z">
                            </path>
                        </svg>
                        <p> Highest Tax Payer Award 2022</p>
                    </li>
                    <li>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                            color="#005fac" style="color:#005fac" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z">
                            </path>
                        </svg>
                        <p>65 offices Nationwide, 125 Primary Distribution hubs lorem50</p>
                    </li>
                </ul>
            </div>
            <div class="milestones_image">
                <div class="row">
                    <div class="col-6 mt-4">
                        <img class="img-fluid" src="https://edison-bd.com/images/milestone/1.png" alt="">
                    </div>
                    <div class="col-6 mt-4">
                        <img class="img-fluid" src="https://edison-bd.com/images/milestone/2.png" alt="">
                    </div>
                    <div class="col-6 mt-4">
                        <img class="img-fluid" src="https://edison-bd.com/images/milestone/3.png" alt="">
                    </div>
                    <div class="col-6 mt-4">
                        <img class="img-fluid" src="https://edison-bd.com/images/milestone/4.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end milestones section  --}}




    {{-- Core Businesses section  --}}
    <div class="core_businessess" id="business">
        <p class="journy-heading fs-1 fw-bold fs-sm-3 fs-md-1 text-center">Conglomerate Snapshot</p>
        <p class="fs-5 text-center">Core Businesses</p>

        <div class="core_businessess_img d-none d-md-flex">
            <a href=""><img
                    src="{{ asset('images/abstract-geometric-logo-or-infinity-line-logo-for-your-company-free-vector.jpg') }}"
                    alt=""></a>
            <a href=""><img
                    src="{{ asset('images/abstract-geometric-logo-or-infinity-line-logo-for-your-company-free-vector.jpg') }}"
                    alt=""></a>
            <a href=""><img
                    src="{{ asset('images/abstract-geometric-logo-or-infinity-line-logo-for-your-company-free-vector.jpg') }}"
                    alt=""></a>
            <a href=""><img
                    src="{{ asset('images/abstract-geometric-logo-or-infinity-line-logo-for-your-company-free-vector.jpg') }}"
                    alt=""></a>
        </div>
        {{-- slider for mobile view  --}}
        <div class="d-block d-md-none industries_footprint_mobile_margin">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="core_businessess_img">
                            <a href=""><img
                                    src="{{ asset('images/abstract-geometric-logo-or-infinity-line-logo-for-your-company-free-vector.jpg') }}"
                                    alt=""></a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="core_businessess_img">
                            <a href=""><img
                                    src="{{ asset('images/abstract-geometric-logo-or-infinity-line-logo-for-your-company-free-vector.jpg') }}"
                                    alt=""></a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="core_businessess_img">
                            <a href=""><img
                                    src="{{ asset('images/abstract-geometric-logo-or-infinity-line-logo-for-your-company-free-vector.jpg') }}"
                                    alt=""></a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="core_businessess_img">
                            <a href=""><img
                                    src="{{ asset('images/abstract-geometric-logo-or-infinity-line-logo-for-your-company-free-vector.jpg') }}"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end Core Businesses section  --}}



    {{-- Brand section  --}}
    <div class="brand">
        <p class="fs-5 text-center">Our Brand</p>
        <div class="brand_img d-none d-md-flex">
            <a href=""><img src="{{ asset('images/untitled1.png') }}" alt=""></a>
        </div>
        {{-- slider for mobile view  --}}
        <div class="d-block d-md-none industries_footprint_mobile_margin">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="brand_img">
                            <a href=""><img src="{{ asset('images/untitled1.png') }}" alt=""></a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="brand_img">
                            <a href=""><img src="{{ asset('images/untitled1.png') }}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end brand section  --}}





    {{-- start Associate Businesses --}}
    <div class="associate_businesses">
        <p class="fs-5 text-center">Associate Businesses</p>
        <div class="associate_businesses_img d-none d-md-flex">
            <a href=""><img
                    src="{{ asset('images/abstract-geometric-logo-or-infinity-line-logo-for-your-company-free-vector.jpg') }}"
                    alt=""></a>
            <a href=""><img
                    src="{{ asset('images/abstract-geometric-logo-or-infinity-line-logo-for-your-company-free-vector.jpg') }}"
                    alt=""></a>
            <a href=""><img
                    src="{{ asset('images/abstract-geometric-logo-or-infinity-line-logo-for-your-company-free-vector.jpg') }}"
                    alt=""></a>
            <a href=""><img
                    src="{{ asset('images/abstract-geometric-logo-or-infinity-line-logo-for-your-company-free-vector.jpg') }}"
                    alt=""></a>
            <a href=""><img
                    src="{{ asset('images/abstract-geometric-logo-or-infinity-line-logo-for-your-company-free-vector.jpg') }}"
                    alt=""></a>
            <a href=""><img
                    src="{{ asset('images/abstract-geometric-logo-or-infinity-line-logo-for-your-company-free-vector.jpg') }}"
                    alt=""></a>
            <a href=""><img
                    src="{{ asset('images/abstract-geometric-logo-or-infinity-line-logo-for-your-company-free-vector.jpg') }}"
                    alt=""></a>
            <a href=""><img
                    src="{{ asset('images/abstract-geometric-logo-or-infinity-line-logo-for-your-company-free-vector.jpg') }}"
                    alt=""></a>
        </div>

        {{-- slider for mobile view  --}}
        <div class="d-block d-md-none industries_footprint_mobile_margin">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="associate_businesses_img">
                            <a href=""><img
                                    src="{{ asset('images/abstract-geometric-logo-or-infinity-line-logo-for-your-company-free-vector.jpg') }}"
                                    alt=""></a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="associate_businesses_img">
                            <a href=""><img
                                    src="{{ asset('images/abstract-geometric-logo-or-infinity-line-logo-for-your-company-free-vector.jpg') }}"
                                    alt=""></a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="associate_businesses_img">
                            <a href=""><img
                                    src="{{ asset('images/abstract-geometric-logo-or-infinity-line-logo-for-your-company-free-vector.jpg') }}"
                                    alt=""></a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="associate_businesses_img">
                            <a href=""><img
                                    src="{{ asset('images/abstract-geometric-logo-or-infinity-line-logo-for-your-company-free-vector.jpg') }}"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end associat businessess section  --}}



    {{-- Our Values section  --}}
    <div class="our_values">
        <div class="our_value_width">
            <h1 class="fs-1 fw-bold fs-sm-3 fs-md-1 text-center">Our Values</h1>
            <p class="fs-5 text-center">At our core, we embody fundamental beliefs that drive excellence and integrity</p>

            <div class="our_values_main d-none d-md-flex">
                <img src="https://www.edison-bd.com/images/values/1.svg" alt="">
                <img src="https://www.edison-bd.com/images/values/2.svg" alt="">
                <img src="https://www.edison-bd.com/images/values/3.svg" alt="">
                <img src="https://www.edison-bd.com/images/values/4.svg" alt="">
                <img src="https://www.edison-bd.com/images/values/5.svg" alt="">
            </div>

            {{-- slider for mobile view  --}}
            <div class="d-block d-md-none industries_footprint_mobile_margin">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="our_values_main">
                                <a href=""><img src="https://www.edison-bd.com/images/values/1.svg"
                                        alt=""></a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="our_values_main">
                                <a href=""><img src="https://www.edison-bd.com/images/values/2.svg"
                                        alt=""></a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="our_values_main">
                                <a href=""><img src="https://www.edison-bd.com/images/values/3.svg"
                                        alt=""></a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="our_values_main">
                                <a href=""><img src="https://www.edison-bd.com/images/values/4.svg"
                                        alt=""></a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="our_values_main">
                                <a href=""><img src="https://www.edison-bd.com/images/values/5.svg"
                                        alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end our values section  --}}



    {{-- Headlines  section  --}}
    <div class="headlines">
        <div class="headlines_width">
            <h1 class="fs-1 fw-bold fs-sm-3 fs-md-1">We Have Made Headlines !</h1>
            <p>Exploring the Achievements Across Our Group Entities</p>
            <div class="d-flex flex-column flex-md-row align-items-center align-items-md-start gap-3 flex-md-wrap">
                <a class="headlines_post" href="#">
                    <img class="rounded-4"
                        src="https://cms.webmanza.com/uploads/Snipaste_2024_03_10_14_41_34_45900df06b.png" alt="">
                    <p>Symphony to launch its latest smartphone Z70</p>
                </a>
                <a class="headlines_post" href="#">
                    <img class="rounded-4"
                        src="https://api.admin.webmanza.com/cc1f39ea-d2a1-49bf-bd77-738a3f6c25db/uploads/268_1708323635585-13-crorejpg.jpeg"
                        alt="">
                    <p>130 Million Users for Symphony Mobile</p>
                </a>
                <a class="headlines_post" href="#">
                    <img class="rounded-4"
                        src="https://api.admin.webmanza.com/cc1f39ea-d2a1-49bf-bd77-738a3f6c25db/uploads/268_1710057519611-snipaste2024-03-1013-58-21png.png"
                        alt="">
                    <p> A Grateful Acknowledgment: MD Sir's Impact on Women's Cricket</p>
                </a>
                <a class="headlines_post" href="#">
                    <img class="rounded-4"
                        src="https://www.tbsnews.net/sites/default/files/styles/big_3/public/images/2023/05/02/motorola_edison.jpg"
                        alt="">
                    <p>Edison Group becomes Motorola Mobile's new national distributor</p>
                </a>
                <a class="headlines_post" href="#">
                    <img class="rounded-4" src="https://cms.webmanza.com/uploads/iso_image_44704ba8da.png"
                        alt="">
                    <p>Edison Industries Ltd. Is Now ISO Certified</p>
                </a>
            </div>
            <a href="{{ route('news.index') }}" class="d-flex justify-content-center"><button
                    class="btn btn-primary">View
                    More</button></a>
        </div>
    </div>
    {{-- end heading section  --}}


    {{-- start contact section  --}}
    <div class="contact" id="connect">
        <h1 class="fs-1 fw-bold fs-sm-3 fs-md-1 text-center">Questions? <br>
            Let's connect</h1>

        <div class="contact_main d-flex flex-column flex-md-row align-items-center">
            <div class="me-4">
                <div class="contact_location">
                    <img src="https://www.edison-bd.com/images/contact-map.svg" alt="">
                    <p>Our Head Office</p>
                    <p>Rangs Babylonia, Level 6-9, 246, Bir Uttam Mir
                        Shawkat Sarak, Tejgaon I/A, Dhaka-1208
                    </p>
                </div>
                <div class="contact_number">
                    <img src="https://www.edison-bd.com/images/contact-phone.svg" alt="">
                    <p>Let's Speak</p>
                    <a href="tel:(+880) 2 8878057">
                        <p>(+880) 2 8878057</p>
                    </a>
                </div>
            </div>
            <div class="map">
                <a href="https://maps.app.goo.gl/7LVpTXAhcNS59n4MA" class="css-1wr59ft"><img alt="location"
                        src="https://www.edison-bd.com/images/map.png" class="chakra-image css-2qcby8"></a>
            </div>
        </div>

    </div>
    {{-- end contact section  --}}
@endsection
