@extends('layouts.frontend')
@section('frontend-content')
    {{-- start Aboutus banner section --}}
    <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleRide" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleRide" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleRide" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active about_banner_img">
                <img src="{{asset('images/background-image-example.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item about_banner_img">
                <img src="https://www.insureon.com/-/media/blog/posts/2021/photo_group-of-employees-working-on-project.png?h=370&iar=0&w=750&rev=3faabd3c0f7c4e11966caaa037fa4fc8" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item about_banner_img">
                <img src="https://phytontalent.com/wp-content/uploads/2022/08/engament.jpg" class="d-block w-100" alt="...">
            </div>
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
        <h1>About Us</h1>
        <p>EDISON Group is a leading local conglomerate in Bangladesh, known for its commitment to enhancing customers’ lives through reliable products and services. The group has rapidly expanded its portfolio which includes technology, communication, power, electronics, real estate, as well as value-added services and footwear sectors. With a focus on powerful brands and diversified investments, Edison Group is committed to driving innovation and growth in Bangladesh’s dynamic business landscape.</p>
        <div class="about_images">
            <img src="https://edison-bd.com/images/about_cards/card_1.svg" alt="">
            <img src="https://edison-bd.com/images/about_cards/card_2.svg" alt="">
            <img src="https://edison-bd.com/images/about_cards/card_3.svg" alt="">
            <img src="https://edison-bd.com/images/about_cards/card_4.svg" alt="">
            <img src="https://edison-bd.com/images/about_cards/card_5.svg" alt="">
            <img src="https://edison-bd.com/images/about_cards/card_6.svg" alt="">
        </div>
    </div>
    {{-- end about description  --}}

    {{-- mission and vision section  --}}
    <div class="container">
        <div class="mission_vision_section d-flex gap-4 align-items-center flex-column flex-md-row">
            <img src="https://www.edison-bd.com/images/mission.png" alt="" class="img-fluid img-md-fluid">
            <div>
                <div>
                    <h1>MISSION</h1>
                    <p>Delivering difference to be the best in every market we serve, to the benefit of our customers and our stakeholders.</p>
                </div>
                <div>
                    <h1>VISION</h1>
                    <p>To be a responsible, respectable, and prominent company.</p>
                </div>
            </div>
        </div>
    </div>
    {{-- end mission and vision section  --}}

    {{-- start Management section  --}}
    <div class="management">
        <div class="container">
            <h1>Executive Management</h1>
            <div class="d-flex justify-content-center gap-4 flex-column align-items-center flex-md-row">
                <img class="rounded-4" src="https://www.edison-bd.com/images/team/aminur_sir.png" alt="">
                <img class="rounded-4" src="https://www.edison-bd.com/images/team/jakaria_sir.png" alt="">
            </div>
        </div>
    </div>
    {{-- end Management section  --}}

    
@endsection
