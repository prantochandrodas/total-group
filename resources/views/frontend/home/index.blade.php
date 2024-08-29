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
            <h2 class="journy-heading fs-1 fw-bold fs-sm-3 fs-md-1 ">{{ $about->home_title }}</h2>
            <p class="fs-5 fs-sm-6 fs-md-5">{{ $about->short_description }}</p>
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
                            <a href="{{ $industry->link }}" class="relative-div">
                                <img style="height: 300px; width: 100%; object-fit: cover;"
                                    src="{{ asset('images/' . $industry->image) }}" class="d-block w-100"
                                    alt="{{ $industry->name }}">
                                <div class="absolute-div">
                                    <p>{{ $industry->name }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="next">
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
                                    <a href="{{ $industry->link }}" class="relative-div">
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
                                <a href="{{ $associate_industry[2]->title }}" class="relative-div">
                                    <img src="{{ asset('images/' . $associate_industry[2]->image) }}"
                                        alt="{{ $associate_industry[2]->name }}" class="associate_industry_img_2">
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
                                <a href="{{ $associate_industry[3]->link }}" class="relative-div">
                                    <img src="{{ asset('images/' . $associate_industry[3]->image) }}"
                                        alt="{{ $associate_industry[3]->name }}" class="associate_industry_img_3">
                                    <div class="absolute-div">
                                        <p>{{ $associate_industry[3]->name }}</p>
                                    </div>
                                </a>
                            </div>
                        @endif

                        @if ($associate_industry->count() > 4)
                            <div class="col-md-6">
                                <a href="{{ $associate_industry[4]->link }}" class="relative-div">
                                    <img src="{{ asset('images/' . $associate_industry[4]->image) }}"
                                        alt="{{ $associate_industry[4]->name }}" class="associate_industry_img_4 mb-2">
                                    <div class="absolute-div">
                                        <p>{{ $associate_industry[4]->name }}</p>
                                    </div>
                                </a>
                                @if ($associate_industry->count() > 5)
                                    <a href="{{ $associate_industry[5]->link }}" class="relative-div">
                                        <img src="{{ asset('images/' . $associate_industry[5]->image) }}"
                                            alt="{{ $associate_industry[5]->name }}" class="associate_industry_img_4">
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
                    <a href="{{ $industry->link }}"
                        class="col-md-3 img-div-4 p-0 relative-div associate_industry_section_post">
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
                            <a href="{{ $industry->link }}" class="relative-div">
                                <img src="{{ asset('images/' . $industry->image) }}" class="d-block w-100"
                                    alt="{{ $industry->name }}" style="height: 300px; width: 100%; object-fit: cover;">
                                <div class="absolute-div">
                                    <p>{{ $industry->name }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFad"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFad"
                    data-bs-slide="next">
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
                    @foreach ($milestones as $item)
                        <li>
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                                color="#005fac" style="color:#005fac" height="1em" width="1em"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z">
                                </path>
                            </svg>
                            <p> {{ $item->milestones }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="milestones_image">
                <div class="row">
                    @foreach ($milestonesImages as $item)
                        <div class="col-6 mt-4">
                            <img class="img-fluid" src="{{ asset('images/' . $item->image) }}" alt="">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- end milestones section  --}}




    {{-- Core Businesses section  --}}
    <div class="core_businessess" id="business">
        <p class="journy-heading fs-1 fw-bold fs-sm-3 fs-md-1 text-center">Conglomerate Snapshot</p>
        <p class="fs-5 text-center">Core Businesses</p>

        <div class="core_businessess_img d-none d-md-flex flex-wrap">
            @foreach ($core_business as $item)
                <a href="{{ $item->link }}">
                    <img src="{{ asset('images/' . $item->image) }}" height="100" width="100" alt="">
                </a>
            @endforeach
        </div>
        {{-- slider for mobile view  --}}
        <div class="d-block d-md-none industries_footprint_mobile_margin">
            <div id="coreBusinessSlider" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($core_business as $index => $item)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <a href="{{ $item->link }}" class="relative-div">
                                <img src="{{ asset('images/' . $item->image) }}" class="d-block mx-auto"
                                    alt="{{ $item->name }}" style="height: 150px; width: 220px;">
                            </a>
                        </div>
                    @endforeach
                    <button class="carousel-control-prev" type="button" data-bs-target="#coreBusinessSlider"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#coreBusinessSlider"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

    </div>
    {{-- end Core Businesses section  --}}



    {{-- Brand section  --}}
    <div class="brand">
        <p class="fs-5 text-center">Our Brand</p>
        <div class="brand_img d-none d-md-flex flex-wrap">
            @foreach ($our_brand as $item)
                <a href="{{ $item->link }}">
                    <img src="{{ asset('images/' . $item->image) }}" alt="">
                </a>
            @endforeach
        </div>
        {{-- slider for mobile view  --}}
        <div class="d-block d-md-none industries_footprint_mobile_margin">
            <div id="ourBrandCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($our_brand as $index => $item)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <a href="{{ $item->link }}" class="relative-div">
                                <img src="{{ asset('images/' . $item->image) }}" class="d-block mx-auto"
                                    alt="{{ $item->name }}" style="height: 150px; width: 220px;">
                            </a>
                        </div>
                    @endforeach
                    <button class="carousel-control-prev" type="button" data-bs-target="#ourBrandCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#ourBrandCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- end brand section  --}}





    {{-- start Associate Businesses --}}
    <div class="associate_businesses">
        <p class="fs-5 text-center">Associate Businesses</p>
        <div class="associate_businesses_img d-none d-md-flex">
            @foreach ($associat_business as $item)
                <a href="{{ $item->link }}">
                    <img src="{{ asset('images/' . $item->image) }}" alt="">
                </a>
            @endforeach
        </div>

        {{-- slider for mobile view  --}}
        <div class="d-block d-md-none industries_footprint_mobile_margin">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($associat_business as $index => $item)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <a href="{{ $item->link }}" class="relative-div">
                                <img src="{{ asset('images/' . $item->image) }}" class="d-block mx-auto"
                                    alt="{{ $item->name }}" style="height: 150px; width: 220px;">
                            </a>
                        </div>
                    @endforeach
                    <button class="carousel-control-prev" type="button" data-bs-target="#coreBusinessSlider"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#coreBusinessSlider"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- end associat businessess section  --}}



    {{-- Our Values section  --}}
    <div class="our_values">
        <div class="our_value_width">
            <h1 class="fs-1 fw-bold fs-sm-3 fs-md-1 text-center">{{ $our_value->title }}</h1>
            <p class="fs-5 text-center">{{ $our_value->short_description }}</p>

            <div class="our_values_main d-none d-md-flex flex-wrap">
                @foreach ($our_services as $item)
                    <img src="{{ asset('images/' . $item->image) }}" alt="">
                @endforeach
            </div>

            {{-- slider for mobile view  --}}
            <div class="d-block d-md-none industries_footprint_mobile_margin">
                <div id="ourValueSlider" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($our_services as $index => $value)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <div class="our_values_main">
                                    <a href="{{ $value->link }}"><img src="{{ asset('images/' . $value->image) }}"
                                            alt=""></a>
                                </div>
                            </div>
                        @endforeach
                        <button class="carousel-control-prev" type="button" data-bs-target="#ourValueSlider"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#ourValueSlider"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end our values section  --}}



    {{-- Headlines  section  --}}
    <div class="headlines">
        <div class="headlines_width">
            <h1 class="fs-1 fw-bold fs-sm-3 fs-md-1">{{ $headline->title }}</h1>
            <p>{{ $headline->short_description }}</p>
            <div class="d-flex flex-column flex-md-row align-items-center align-items-md-start gap-3 flex-md-wrap">
                @foreach ($stories as $item)
                    <a class="headlines_post" href="{{$item->link}}">
                        <img class="rounded-4"
                            src="{{asset('images/'. $item->image)}}"
                            alt="">
                        <p>{{$item->title}}</p>
                    </a>
                @endforeach
            </div>
            <a href="{{ route('news.index') }}" class="d-flex justify-content-center" style="text-decoration:none; border:none"><button
                    class="btn btn-primary">View
                    More</button></a>
        </div>
    </div>
    {{-- end heading section  --}}


    {{-- start contact section  --}}
    <div class="contact" id="connect">
        <h1 class="fs-1 fw-bold fs-sm-3 fs-md-1 text-center">{{$contact->title}}</h1>

        <div class="contact_main d-flex flex-column flex-md-row align-items-center">
            <div class="me-4">
                <div class="contact_location">
                    <img src="{{asset('images/'. $contact->location_icon)}}" alt="">
                    <p>{{$contact->location_title}}</p>
                    <p>{{$contact->location}}</p>
                </div>
                <div class="contact_number">
                    <img src="{{asset('images/'.$contact->contact_icon)}}" alt="">
                    <p>{{$contact->contact_title}}</p>
                    <a href="{{$contact->contact_number}}">
                        <p>{{$contact->contact_number}}</p>
                    </a>
                </div>
            </div>
            <div class="map">
                <a href="{{$contact->map_link}}" class="css-1wr59ft"><img alt="location"
                        src="{{asset('images/'.$contact->map_image)}}" class="map_image"></a>
            </div>
        </div>

    </div>
    {{-- end contact section  --}}
@endsection
