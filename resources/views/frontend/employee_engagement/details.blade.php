@extends('layouts.frontend')
@section('frontend-content')
    <style>
        .card{
            border: none;
        }
       
        .card-img img {
            width: 100%;
            height: 440px;
        }

        .card-img {
            padding: 0px 5px;
        }
        .carousel-item .active{
            border: none;
        }

        @media (max-width: 767px) {
            .carousel-inner .carousel-item>div {
                display: none;
            }

            .carousel-inner .carousel-item>div:first-child {
                display: block;
            }
        }

        .carousel-inner .carousel-item.active,
        .carousel-inner .carousel-item-next,
        .carousel-inner .carousel-item-prev {
            display: flex;
        }

        /* medium and up screens */
        @media (min-width: 768px) {

            .carousel-inner .carousel-item-end.active,
            .carousel-inner .carousel-item-next {
                transform: translateX(25%);
            }

            .carousel-inner .carousel-item-start.active,
            .carousel-inner .carousel-item-prev {
                transform: translateX(-25%);
            }
        }

        .carousel-inner .carousel-item-end,
        .carousel-inner .carousel-item-start {
            transform: translateX(0);
        }
    </style>

    <div class="employee_engagement_details container">
        <h3 class="text-center mt-4">Symphony Mobile Factory celebrated the International Women's Day 2024</h3>
        <div class="video-container my-4 d-flex justify-content-center">
            <iframe style="border-radius: 15px" width="900" height="400" src="https://www.youtube.com/embed/Hxq3u7Nl_V0"
                title="Women&#39;s Day Celebration 2024 Mobile Factory_Symphony" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        <p>On this Day, the women associates working at Symphony Mobile's factory (Edison Industries) celebrated
            International Women's Day 2024. 250 women associates are working in Symphony Mobile's factory. Symphony not only
            believes but also practices women empowerment and development and career advancement. Symphony mobile factory
            has implemented a line fully operating by female associates and female leaders.</p>
        <h3 class="text-center mt-4">Gallery</h3>
        <div class="container text-center my-3">
            <div class="row mx-auto my-auto justify-content-center">
                <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="https://cms.webmanza.com/uploads/IMG_2621_Large_b391d36273.JPG"
                                            class="img-fluid">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="https://cms.webmanza.com/uploads/IMG_20240307_115614_Large_838bda3c67.jpg"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="https://cms.webmanza.com/uploads/IMG_2415_Large_f0f171ab26.JPG"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="https://cms.webmanza.com/uploads/IMG_2645_Large_a57a4b623b.JPG"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="https://cms.webmanza.com/uploads/IMG_2645_Large_a57a4b623b.JPG"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>



    <script>
        let items = document.querySelectorAll('.carousel .carousel-item')

        items.forEach((el) => {
            const minPerSlide = 3
            let next = el.nextElementSibling
            for (var i = 1; i < minPerSlide; i++) {
                if (!next) {
                    // wrap carousel by using first child
                    next = items[0]
                }
                let cloneChild = next.cloneNode(true)
                el.appendChild(cloneChild.children[0])
                next = next.nextElementSibling
            }
        })
    </script>
@endsection
