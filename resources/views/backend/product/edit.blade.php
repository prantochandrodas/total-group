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
Update-Project
@endsection


<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Update-Products</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1" style="padding: 0">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{route('products')}}" class="text-muted text-hover-primary">Products</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Update-Products</li>
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
        <h2 style="text-align: center;">Update-Products</h2>
    </div>

    <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
        <form method="POST" action="{{ route('products.update', $data->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          
            {{-- name field  --}}
            <div class="form-group">
                <label for="name" class="mb-2 fs-5">Name:</label>
                <input type="text" class="form-control mb-2" id="name" name="name"
                    value="{{$data->name}}">
                @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            {{-- end name  --}}


            {{-- short_description field  --}}
            <div class="form-group">
                <label for="short_description" class="mb-2 fs-5">Short Description:</label>
                <textarea name="short_description" id="short_description" class="form-control mb-2" cols="30" rows="5">{{ $data->short_description }}</textarea>
                @error('short_description')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            {{-- end short_description  --}}


            {{-- long_description field  --}}
            <div class="form-group">
                <label for="long_description" class="mb-2 fs-5">long_description:</label>
                <textarea name="long_description" id="long_description" class="form-control mb-2" cols="30" rows="5">{{ $data->long_description }}</textarea>
                @error('long_description')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            {{-- end of long_description --}}

            {{-- warranty field  --}}
            <div class="form-group">
                <label for="warranty" class="mb-2 fs-5">warranty:</label>
                <textarea name="warranty" id="summernote" class="form-control mb-2" cols="30" rows="10">{{ $data->warranty }}</textarea>
                @error('warranty')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            {{-- end of warranty --}}


            {{-- images field  --}}
            <div class="form-group">
                <label for="images" class="mb-2 fs-5">Images:</label>
                <input type="file" multiple class="form-control mb-2" id="images" name="images[]">
                @error('images')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <h3>Existing Images:</h3>
                <div>
                    @foreach ($data->images as $image)
                        <div class="image-container mb-3" style="position: relative; display: inline-block;">
                            <img src="{{ asset('images/' . $image->image) }}" alt="Image" width="150"
                                height="150" style="position: relative;">
                            <button type="button" class="btn btn-sm delete-image"
                                style="position: absolute; top: 15px; right: 15px; transform: translate(50%, -50%);"
                                data-image-id="{{ $image->id }}">
                                <i class="fas fa-times" style="font-size: 30px"></i>
                            </button>
                            <input type="hidden" name="existing_images[]" value="{{ $image->id }}">
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- end of image field  --}}

            <button type="submit" class="btn btn-primary btn-sm">Update</button>
        </form>
    </div>
</div>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">

<script>
    $(document).ready(function() {
        $('.delete-image').on('click', function() {
            const imageId = $(this).data('image-id');
            const container = $(this).closest('.image-container');

            $.ajax({
                url: '/product/delete-image/' + imageId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        container.remove();
                    }
                }
            });
        });
        $('#summernote').summernote({
            height: 250
        });
        $('#summernote2').summernote({
            height: 250
        });
    });
</script>
@endsection
