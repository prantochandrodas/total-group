@extends('layouts.frontend')
@section('frontend-content')
    <div class="product-page-container">
        <div class="product-gallery">
            <div class="main-image">
                <img src="{{ asset('images/' . $data->images[0]->image) }}"
                    alt="Main Product Image" id="mainProductImage">
            </div>
            <div class="thumbnail-images">
                @foreach ($data->images as $item)
                    <img src="{{asset('images/'.$item->image)}}"
                        alt="Product Image 1" onclick="changeImage(this.src)">
                @endforeach

                {{-- <img src="https://eshop.mepgroupbd.com/public/uploads/all/UG8FWtXZgGiI2gB24rPLDDUyAyBONzokzEQLzBsn.jpg"
                    alt="Product Image 2" onclick="changeImage(this.src)">
                <img src="https://eshop.mepgroupbd.com/public/uploads/all/Dx7XCA00i7k4TuMBVT6EZcNUe5SucXaiPkJwZWgn.jpg"
                    alt="Product Image 3" onclick="changeImage(this.src)"> --}}
            </div>
        </div>
        <div class="product-details">
            <h2>{{$data->name}}</h2>
            <p>{!!$data->short_description!!}</p>
        </div>
    </div>


    {{-- tab section  --}}
    <div class="product_description">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                    type="button" role="tab" aria-controls="nav-home" aria-selected="true">Description</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                    type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Warranty</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
                tabindex="0">{!!$data->long_description!!}</div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                {!!$data->warranty!!}
            </div>
        </div>
    </div>

    <script>
        // Function to change the main image when a thumbnail is clicked
        function changeImage(src) {
            const mainImage = document.getElementById('mainProductImage');
            mainImage.src = src;
        }

        // Zoom and move effect
        const mainImageContainer = document.querySelector('.main-image');
        const mainImage = document.getElementById('mainProductImage');

        mainImageContainer.addEventListener('mousemove', function(event) {
            const containerRect = mainImageContainer.getBoundingClientRect();
            const xPercent = (event.clientX - containerRect.left) / containerRect.width;
            const yPercent = (event.clientY - containerRect.top) / containerRect.height;

            mainImage.style.transformOrigin = `${xPercent * 100}% ${yPercent * 100}%`;
            mainImage.style.transform = 'scale(1.5)';
        });

        mainImageContainer.addEventListener('mouseleave', function() {
            mainImage.style.transform = 'scale(1)';
            mainImage.style.transformOrigin = 'center center';
        });
    </script>
@endsection
