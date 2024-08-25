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
        All-Products 
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
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">All-Products</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1" style="padding: 0">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{route('all-products')}}" class="text-muted text-hover-primary">Products</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">All-Products</li>
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
            <h2 style="text-align: center;">Create Products</h2>
        </div>

        <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf

                {{-- name start  --}}
                <div style="margin-bottom: 20px;">
                    <label for="name" style="display: block; margin-bottom: 5px;">Name:</label>
                    <input type="text" id="name" name="name" class="form-control"
                        style="width: 100%; padding: 8px;">
                    @error('name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- end name --}}

                {{-- start short_description  --}}
                <div style="margin-bottom: 20px;">
                    <label for="short_description" style="display: block; margin-bottom: 5px;">Short Description:</label>
                    <textarea name="short_description" id="summernote" cols="30" rows="10"></textarea>
                    
                    @error('short_description')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- end short_description --}}

                 {{-- start long_description  --}}
                 <div style="margin-bottom: 20px;">
                    <label for="long_description" style="display: block; margin-bottom: 5px;">Long Description:</label>
                    <textarea name="long_description" id="summernote2" cols="30" rows="10"></textarea>
                    @error('long_description')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- end long_description --}}


                 {{-- start warranty  --}}
                 <div style="margin-bottom: 20px;">
                    <label for="warranty" style="display: block; margin-bottom: 5px;">Warranty:</label>
                    <textarea name="warranty" id="summernote3" cols="30" rows="10"></textarea>
                    @error('warranty')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- end warranty --}}

                {{-- start images  --}}
                <div style="margin-bottom: 20px;">
                    <label for="images" style="display: block; margin-bottom: 5px;">Images:</label>
                    <input type="file" id="images" name="images[]" class="form-control"
                        style="width: 100%; padding: 8px;" multiple>
                    @error('images')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- end images  --}}
                 
                <button type="submit"
                    style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer; border-radius: 5px;">Create</button>
            </form>
        </div>
    </div>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 200
            });
            $('#summernote2').summernote({
                height: 200
            });
            $('#summernote3').summernote({
                height: 200
            });
        });
    </script>
@endsection
