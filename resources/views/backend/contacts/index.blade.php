<!-- resources/views/backend/home/slider/edit.blade.php -->
@extends('layouts.backend')

@section('content')
    <div class="container mt-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

    @section('title')
        Contact
    @endsection

    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Contact</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('home.index') }}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Contact</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->

    <div class="app-container container-fluid">
        <div style="background-color: #f0f0f0; padding: 20px;">
            <h2 style="text-align: center;">Contact</h2>
        </div>

        <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
            <form action="{{ route('contacts.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                 {{-- background_image field  --}}
                 <div class="form-group">
                    <label for="background_image" class="mb-2 h5">Background Image:</label>
                    <input type="file" class="form-control mb-2" id="background_image" name="background_image">
                    @error('background_image')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                    @if ($data->background_image)
                        <img src="{{ asset('images/' . $data->background_image) }}" height="100" class="mb-2"
                            alt="Current Image">
                    @endif
                </div>
                {{-- end of background_image field  --}}

                {{-- Start title  --}}
                <div class="form-group">
                    <label for="title" class="h5 mb-2">Title:</label>
                    <input type="text" class="form-control mb-2" id="title" name="title"
                        value="{{ old('title', $data->title) }}">
                    @error('title')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- end title  --}}

                {{-- Start map_link  --}}
                <div class="form-group">
                    <label for="map_link" class="h5 mb-2">Map Link:</label>
                    <input type="text" class="form-control mb-2" id="map_link" name="map_link"
                        value="{{ old('map_link', $data->map_link) }}">
                    @error('map_link')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- end map_link  --}}

                  {{-- map_image field  --}}
                  <div class="form-group">
                    <label for="map_image" class="mb-2 h5">Map Image:</label>
                    <input type="file" class="form-control mb-2" id="map_image" name="map_image">
                    @error('map_image')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                    @if ($data->map_image)
                        <img src="{{ asset('images/' . $data->map_image) }}" height="100" class="mb-2"
                            alt="Current Image">
                    @endif
                </div>
                {{-- end of map_image field  --}}


                {{-- Start location_title  --}}
                <div class="form-group">
                    <label for="location_title" class="h5 mb-2">Location Title:</label>
                    <input type="text" class="form-control mb-2" id="location_title" name="location_title"
                        value="{{ old('location_title', $data->location_title) }}">
                    @error('location_title')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- end title  --}}

                {{-- Start location address  --}}
                <div class="form-group">
                    <label for="location" class="h5 mb-2">Location:</label>
                    <textarea class="form-control mb-2" name="location" id="location" cols="30" rows="10">{{ $data->location }}</textarea>
                    @error('location')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- end location address --}}

                {{-- location_icon field  --}}
                <div class="form-group">
                    <label for="location_icon" class="mb-2 h5">Location Icon:</label>
                    <input type="file" class="form-control mb-2" id="location_icon" name="location_icon">
                    @error('location_icon')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                    @if ($data->location_icon)
                        <div style="background-color: gray">
                            <img src="{{ asset('images/' . $data->location_icon) }}" height="100" class="mb-2"
                            alt="Current Image">
                        </div>
                    @endif
                </div>
                {{-- end of location_icon field  --}}

                {{-- Start contact_title  --}}
                <div class="form-group">
                    <label for="contact_title" class="h5 mb-2">Contact Title:</label>
                    <input type="text" class="form-control mb-2" id="contact_title" name="contact_title"
                        value="{{ old('contact_title', $data->contact_title) }}">
                    @error('contact_title')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- end title  --}}


                {{-- Start contact_number  --}}
                <div class="form-group">
                    <label for="contact_number" class="h5 mb-2">Contact Number:</label>
                    <input type="text" class="form-control mb-2" id="contact_number" name="contact_number"
                        value="{{ old('contact_number', $data->contact_number) }}">
                    @error('contact_number')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- end title  --}}


                {{-- contact_icon field  --}}
                <div class="form-group">
                    <label for="contact_icon" class="mb-2 h5">Contact Icon</label>
                    <input type="file" class="form-control mb-2" id="contact_icon" name="contact_icon">
                    @error('contact_icon')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                    @if ($data->contact_icon)
                    <div style="background-color: gray">
                        <img src="{{ asset('images/' . $data->contact_icon) }}" height="100" class="mb-2"
                        alt="Current Image">
                    </div>
                       
                    @endif
                </div>
                {{-- end of contact_icon field  --}}


               
                <button type="submit" class="btn btn-primary btn-sm mt-2">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
