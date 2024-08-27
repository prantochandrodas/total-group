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
      Milestones 
    @endsection

    
   <!--begin::Toolbar-->
   <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container  d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Milestones</h1>
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
                <li class="breadcrumb-item text-muted">Milestones</li>
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
            <h2 style="text-align: center;">Create Milestones</h2>
        </div>

        <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
            <form method="POST" action="{{ route('milestones.store') }}" enctype="multipart/form-data">
                @csrf

                {{-- milestones start  --}}
                <div style="margin-bottom: 20px;">
                    <label for="milestones" style="display: block; margin-bottom: 5px;">Milestones:</label>
                    <input type="text" id="milestones" name="milestones" class="form-control"
                        style="width: 100%; padding: 8px;">
                    @error('milestones')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- end name --}}

                {{-- start images  --}}
                <div style="margin-bottom: 20px;">
                    <label for="images" style="display: block; margin-bottom: 5px;">Images:</label>
                    <input type="file" id="images" name="images[]" class="form-control"
                        style="width: 100%; padding: 8px;" multiple>
                    @error('images')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <h3>Existing Images:</h3>
                    <div>
                        @foreach ($data as $image)
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
                {{-- end images  --}}
                 
                <button type="submit"
                    style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer; border-radius: 5px;">Create</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.delete-image').on('click', function() {
                const imageId = $(this).data('image-id');
                const container = $(this).closest('.image-container');
    
                $.ajax({
                    url: '/milestone/delete-image/' + imageId,
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
        });
    </script>
@endsection
