@extends('layouts.backend')
@section('content')
    <!-- success message  -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- error message  -->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @section('title')
    Our-Brand
    @endsection

    <!-- validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
   <!--begin::Toolbar-->
   <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container  d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Our-Brand</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1" style="padding: 0">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{route('home.index')}}" class="text-muted text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Our-Brand</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
    </div>
    <!--end::Toolbar container-->
</div>
<!--end::Toolbar-->

    <div class="container-fluid">
        <div style="background-color: #f0f0f0; padding: 20px;">
            <h2 style="text-align: center;">Create Our-Brand Post</h2>
        </div>

        <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
            <form method="POST" action="{{ route('our-brands.store') }}" enctype="multipart/form-data">
                @csrf

                 {{-- link start  --}}
                 <div style="margin-bottom: 20px;">
                    <label for="link" style="display: block; margin-bottom: 5px;">Link:</label>
                    <input type="text" id="link" name="link" class="form-control"
                        style="width: 100%; padding: 8px;">
                    @error('link')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- end link --}}

                {{-- start image  --}}
                <div style="margin-bottom: 20px;">
                    <label for="images" style="display: block; margin-bottom: 5px;">Images:</label>
                    <input type="file" id="image" name="image" class="form-control"
                        style="width: 100%; padding: 8px;">
                    @error('image')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- end image  --}}
                 
                <button type="submit"
                    style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer; border-radius: 5px;">Create</button>
            </form>
        </div>
    </div>
    
@endsection
