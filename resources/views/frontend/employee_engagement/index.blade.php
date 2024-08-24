@extends('layouts.frontend')
@section('frontend-content')
    <div class="bg-black">
        <div class="album min-vh-100 text-light">
            <h1 class="text-center fw-bold pt-4">Albums</h1>
            <p class="text-center mt-2">Vibrant and joyous life at Edison</p>
            <div class="d-flex flex-column flex-md-row align-items-center align-items-md-start gap-3 flex-md-wrap">
                <a class="album_post text-decoration-none" href="{{route('album-details.details')}}">
                    <img class="rounded-4"
                        src="https://cms.webmanza.com/uploads/IMG_2598_Large_39bb259d8b.JPG" alt="">
                    <p class="text-light text-center">Symphony to launch its latest smartphone Z70</p>
                </a>
            </div>
        </div>
    </div>
@endsection
