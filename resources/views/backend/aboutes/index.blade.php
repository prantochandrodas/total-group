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
        About
    @endsection

    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    About</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('abouts.index') }}" class="text-muted text-hover-primary">About</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">About</li>
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
            <h2 style="text-align: center;">About</h2>
        </div>

        <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
            <form action="{{ route('aboutes.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- start home_title --}}
                <div class="form-group">
                    <label for="home_title" class="h5 mb-2">Home About Section Title:</label>
                    <input type="text" class="form-control mb-2" id="home_title" name="home_title"
                        value="{{ old('home_title', $data->home_title) }}">
                    @error('home_title')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- end home_title  --}}

                {{-- start short_description  --}}
                <div class="form-group">
                    <label for="short_description" class="h5 mb-2">Home About Section Description:</label>
                    <textarea name="short_description" id="short_description" cols="30" rows="10" class="form-control mb-2">
                        {{ $data->short_description }}
                    </textarea>
                    @error('description')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- end short_description  --}}

                 {{-- start about_title --}}
                 <div class="form-group">
                    <label for="about_title" class="h5 mb-2">About Title:</label>
                    <input type="text" class="form-control mb-2" id="about_title" name="about_title"
                        value="{{ old('about_title', $data->about_title) }}">
                    @error('about_title')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- end about_title  --}}

                {{-- start long_description  --}}
                <div class="form-group">
                    <label for="long_description" class="h5 mb-2">About Description:</label>
                    <textarea name="long_description" id="long_description" cols="30" rows="10" class="form-control mb-2">
                        {{ $data->long_description }}
                    </textarea>
                    @error('description')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- end long_description  --}}


                <div class="form-group">
                    <label for="image" class="h5 mb-2">Image:</label>
                    <input type="file" class="form-control mb-2" id="image" name="image">
                    @error('image')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                    @if ($data->image)
                        <img src="{{ asset('images/' . $data->image) }}" height="300" class="mb-2"
                            alt="Current Image">
                    @endif
                </div>


                <button type="submit" class="btn btn-primary btn-sm mt-2">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
