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
       Application
    @endsection

    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Application</h1>
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
                    <li class="breadcrumb-item text-muted">Application</li>
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
            <h2 style="text-align: center;">Application</h2>
        </div>

        <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
            <form action="{{ route('applications.update', $application->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- company_name  --}}
                <div class="form-group">
                    <label for="company_name" class="h5 mb-2">Company Name:</label>
                    <input type="text" class="form-control mb-2" id="company_name" name="company_name"
                        value="{{ old('company_name', $application->company_name) }}">
                    @error('company_name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- end company_name  --}}

                {{-- email  --}}
                <div class="form-group">
                    <label for="email" class="h5 mb-2">Email:</label>
                    <input type="email" class="form-control mb-2" id="email" name="email"
                        value="{{ old('email', $application->email) }}">
                    @error('email')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- end email --}}

                {{-- address  --}}
                <div class="form-group">
                    <label for="address" class="h5 mb-2">address:</label>
                    <textarea name="address" id="address" cols="30" rows="10" class="form-control mb-2">
                        {{$application->address}}
                    </textarea>
                    @error('address')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- address end  --}}

                {{-- Logo --}}
                <div class="form-group">
                    <label for="logo" class="h5 mb-2">Logo:</label>
                    <input type="file" class="form-control mb-2" id="logo" name="logo">
                    @error('logo')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                    @if ($application->logo)
                        <img src="{{ asset('images/' . $application->logo) }}" height="100" class="mb-2"
                            alt="Current Image">
                    @endif
                </div>
                {{-- Logo end  --}}

                {{-- phone_1 --}}
                <div class="form-group">
                    <label for="phone_1" class="h5 mb-2">Phone No1:</label>
                    <input type="phone_1" class="form-control mb-2" id="phone_1" name="phone_1"
                        value="{{ old('phone_1', $application->phone_1) }}">
                    @error('phone_1')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- end phone_1 --}}

                {{-- phone_2 --}}
                <div class="form-group">
                    <label for="phone_2" class="h5 mb-2">Phone No2:</label>
                    <input type="phone_2" class="form-control mb-2" id="phone_2" name="phone_2"
                        value="{{ old('phone_2', $application->phone_2) }}">
                    @error('phone_2')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- end phone_2 --}}

                <button type="submit" class="btn btn-primary btn-sm mt-2">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
