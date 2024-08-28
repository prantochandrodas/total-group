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


<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Our-Brand
            </h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1" style="padding: 0">
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

<div class="app-container container-fluid">
    <div style="background-color: #f0f0f0; padding: 20px;">
        <h2 style="text-align: center;">Edit Our-Brand</h2>
    </div>

    <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
        <form method="POST" action="{{ route('our-brands.update', $data->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

             {{-- link field  --}}
             <div class="form-group">
                <label for="link" class="mb-2 fs-5">Link:</label>
                <input type="text" class="form-control mb-2" id="link" name="link"
                    value="{{ $data->link }}">
                @error('link')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            {{-- end link  --}}


            {{-- image field  --}}
            <div class="form-group">
                <label for="image" class="mb-2 fs-5">Image:</label>
                <input type="file" class="form-control mb-2" id="image" name="image">
                @error('image')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
                @if ($data->image)
                    <img src="{{ asset('images/' . $data->image) }}" height="100" class="mb-2" alt="Current Image">
                @endif
            </div>
            {{-- end of image field  --}}

            <button type="submit" class="btn btn-primary btn-sm">Update</button>
        </form>
    </div>
</div>
@endsection
