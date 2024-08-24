@extends('layouts.frontend')
@section('frontend-content')
    {{-- start news banner  --}}
    <div class="news_banner">
        <div class="container news_banner_slider">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active news-carousel-item">
                        <a href="#">
                            <img src="{{ asset('images/2-2312030359.jpg') }}" class="d-block w-100" alt="...">
                            <div class="overlay"></div>
                            <div class="text-light">
                                <h1>Latest News</h1>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, rerum.</p>
                            </div>
                        </a>
                    </div>
                    <div class="carousel-item news-carousel-item">
                        <a href="#">
                            <img src="{{ asset('images/pr_image_0.jpg') }}" class="d-block w-100" alt="...">
                            <div class="overlay"></div>
                            <div class="text-light">
                                <h1>Latest News</h1>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, rerum.</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end news banner  --}}

    {{-- start Headlines section  --}}
    <div class="news_headlines">
        <h1 class="text-light text-center">We Have Made Headlines !</h1>
        <p class="text-light text-center">Exploring the Achievements Across Our Group Entities</p>
        <div class="news_headlines_width container mt-4">
            <div class="d-flex flex-column flex-md-row gap-4 gap-md-0">
                <div class="w-md-50 pe-2">
                    <img class="img-fluid rounded-4"
                        src="https://cms.webmanza.com/uploads/Snipaste_2024_03_10_14_41_34_45900df06b.png" alt="">
                    <a href="#" class="text-light">Symphony to launch its latest smartphone Z70
                        Symphony Mobile, a trailblazer in the mobile technology industry, is poised to introduce its latest
                        smartphone - Symphony Z70, say the company in a statement.</a>
                </div>
                <div class="w-md-50">
                    <div class="mb-md-2 mb-4">
                        <img class="img-fluid rounded-4"
                            src="https://api.admin.webmanza.com/cc1f39ea-d2a1-49bf-bd77-738a3f6c25db/uploads/268_1708323635585-13-crorejpg.jpeg"
                            alt="">
                        <a href="#" class="text-light">130 Million Users for Symphony Mobile</a>
                    </div>
                    <div class="d-flex flex-column flex-md-row gap-4 gap-md-0">
                        <div class="w-md-50 pe-2">
                            <img class="img-fluid rounded-4"
                                src="https://api.admin.webmanza.com/cc1f39ea-d2a1-49bf-bd77-738a3f6c25db/uploads/268_1710057519611-snipaste2024-03-1013-58-21png.png"
                                alt="">
                            <a href="#" class="text-light"> A Grateful Acknowledgment: MD Sir's Impact on Women's
                                Cricket</a>
                        </div>
                        <div class="w-md-50" style="object-fit: cover">
                            <img class="img-fluid rounded-4"
                                src="https://www.tbsnews.net/sites/default/files/styles/big_3/public/images/2023/05/02/motorola_edison.jpg"
                                alt="">
                            <a href="#" class="text-light">Edison Group becomes Motorola Mobile's new national
                                distributor</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end headlines section  --}}
    
    {{-- start stories section --}}
    <div class="stories">
        <h1 class="text-center fw-bold mb-4">More Stories</h1>
        <div class="d-flex flex-column flex-md-row align-items-center align-items-md-start gap-3 flex-md-wrap">
            <a class="stories_post" href="#">
                <img class="rounded-4"
                    src="https://cms.webmanza.com/uploads/Snipaste_2024_03_10_14_41_34_45900df06b.png" alt="">
                <p>Symphony to launch its latest smartphone Z70</p>
            </a>
            <a class="stories_post" href="#">
                <img class="rounded-4"
                    src="https://api.admin.webmanza.com/cc1f39ea-d2a1-49bf-bd77-738a3f6c25db/uploads/268_1708323635585-13-crorejpg.jpeg"
                    alt="">
                <p>130 Million Users for Symphony Mobile</p>
            </a>
            <a class="stories_post" href="#">
                <img class="rounded-4"
                    src="https://api.admin.webmanza.com/cc1f39ea-d2a1-49bf-bd77-738a3f6c25db/uploads/268_1710057519611-snipaste2024-03-1013-58-21png.png"
                    alt="">
                <p> A Grateful Acknowledgment: MD Sir's Impact on Women's Cricket</p>
            </a>
            <a class="stories_post" href="#">
                <img class="rounded-4"
                    src="https://www.tbsnews.net/sites/default/files/styles/big_3/public/images/2023/05/02/motorola_edison.jpg"
                    alt="">
                <p>Edison Group becomes Motorola Mobile's new national distributor</p>
            </a>
            <a class="stories_post" href="#">
                <img class="rounded-4" src="https://cms.webmanza.com/uploads/iso_image_44704ba8da.png"
                    alt="">
                <p>Edison Industries Ltd. Is Now ISO Certified</p>
            </a>
            <a class="stories_post" href="#">
                <img class="rounded-4"
                    src="https://cms.webmanza.com/uploads/Snipaste_2024_03_10_14_41_34_45900df06b.png" alt="">
                <p>Symphony to launch its latest smartphone Z70</p>
            </a>
            <a class="stories_post" href="#">
                <img class="rounded-4"
                    src="https://api.admin.webmanza.com/cc1f39ea-d2a1-49bf-bd77-738a3f6c25db/uploads/268_1708323635585-13-crorejpg.jpeg"
                    alt="">
                <p>130 Million Users for Symphony Mobile</p>
            </a>
            <a class="stories_post" href="#">
                <img class="rounded-4"
                    src="https://api.admin.webmanza.com/cc1f39ea-d2a1-49bf-bd77-738a3f6c25db/uploads/268_1710057519611-snipaste2024-03-1013-58-21png.png"
                    alt="">
                <p> A Grateful Acknowledgment: MD Sir's Impact on Women's Cricket</p>
            </a>
            <a class="stories_post" href="#">
                <img class="rounded-4"
                    src="https://www.tbsnews.net/sites/default/files/styles/big_3/public/images/2023/05/02/motorola_edison.jpg"
                    alt="">
                <p>Edison Group becomes Motorola Mobile's new national distributor</p>
            </a>
            <a class="stories_post" href="#">
                <img class="rounded-4" src="https://cms.webmanza.com/uploads/iso_image_44704ba8da.png"
                    alt="">
                <p>Edison Industries Ltd. Is Now ISO Certified</p>
            </a>
        </div>
    </div>
    {{-- end stories section  --}}
@endsection
