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
    <style>
        @media (max-width: 768px) {
            .hidden-field {
                display: none;
            }

            .btn-group {
                flex-direction: column;
                gap: 3px;
                /* Hide btn-group on mobile devices */
            }

            .img-size {
                max-width: 50px;
                height: 50px
            }
        }
    </style>

@section('title')
Associate-Industry
@endsection


<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Associate-Industry
            </h1>
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
                <li class="breadcrumb-item text-muted">Core-Industry</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
    </div>
    <!--end::Toolbar container-->
</div>
<!--end::Toolbar-->


<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-fluid">
        <a href={{ route('associate-industries.create') }} class="btn btn-sm btn-primary">Add</a>
        <table id="mydata" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Serial ID</th>
                    <th>Name</th>
                    <th class="hidden-field">Short Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
    <!--end::Content container-->
</div>

<script>
    $(document).ready(function() {
        $('#mydata').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('associate-industries.getdata') }}',
            columns: [{
                    data: null, // Use null to signify that this column does not map directly to any data source
                    name: 'serial_number',
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart +
                            1; // Calculate the serial number
                    },
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'link',
                    name: 'link',
                    render: function(data, type, row) {
                        if (data && data !== null) {
                            return '<a href="' + data + '">' + data + '</a>';
                        } else {
                            return ''; // Return an empty string if no data
                        }
                    },
                    className: 'hidden-field'
                },
                {
                    data: 'first_image',
                    name: 'first_image',
                    render: function(data, type, row) {
                        return '<img src="' + data + '" height="100"/>'; // Render image
                    },
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row) {
                        return '<div class="btn-group">' + data + '</div>';
                    }
                }
            ]
        });
    });
</script>
@endsection
