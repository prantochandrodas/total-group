@extends('layouts.frontend')
@section('frontend-content')
    <div class="container career">
        <h3 class="text-center">Jobs</h3>

        <div class="input-group mb-3 w-50 mx-auto">
            <input type="text" class="form-control" placeholder="Search Jobs" aria-label="Recipient's username"
                aria-describedby="basic-addon2">
            <span class="input-group-text btn btn-primary" id="basic-addon2">Search</span>
        </div>

        <div class="row" style="margin-top: 50px">
            <div class="col-6 my-4">
                <a href="{{route('career-details.details')}}" class="card">
                    <div class="card-body">
                        <div class="d-flex flex-wrap">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1"
                                viewBox="0 0 48 48" enable-background="new 0 0 48 48" class="mx-2" height="1em"
                                width="1em" xmlns="http://www.w3.org/2000/svg" style="font-size: 44px;">
                                <path fill="#424242"
                                    d="M27,7h-6c-1.7,0-3,1.3-3,3v3h2v-3c0-0.6,0.4-1,1-1h6c0.6,0,1,0.4,1,1v3h2v-3C30,8.3,28.7,7,27,7z">
                                </path>
                                <path fill="#E65100"
                                    d="M40,43H8c-2.2,0-4-1.8-4-4V15c0-2.2,1.8-4,4-4h32c2.2,0,4,1.8,4,4v24C44,41.2,42.2,43,40,43z">
                                </path>
                                <path fill="#FF6E40"
                                    d="M40,28H8c-2.2,0-4-1.8-4-4v-9c0-2.2,1.8-4,4-4h32c2.2,0,4,1.8,4,4v9C44,26.2,42.2,28,40,28z">
                                </path>
                                <path fill="#FFF3E0"
                                    d="M26,26h-4c-0.6,0-1-0.4-1-1v-2c0-0.6,0.4-1,1-1h4c0.6,0,1,0.4,1,1v2C27,25.6,26.6,26,26,26z">
                                </path>
                            </svg>
                            <div>
                                <h5 class="card-title job-title" style="margin-bottom: 30px; margin-top:10px; ">Frontend Developer</h5>
                                <div class="d-flex align-items-center">
                                    <svg class="me-2" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="mr-2" color="#4a4a4a" height="20" width="20" xmlns="http://www.w3.org/2000/svg" style="color: rgb(74, 74, 74);"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm3.3 14.71L11 12.41V7h2v4.59l3.71 3.71-1.42 1.41z"></path></svg>
                                    <h6 class="card-subtitle text-body-secondary">Card subtitle</h6>
                                </div>
                                <div class="d-flex align-items-center my-4">
                                    <svg class="me-2" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class=" mr-2" color="#4a4a4a" height="20" width="20" xmlns="http://www.w3.org/2000/svg" style="color: rgb(74, 74, 74);"><path fill="none" d="M0 0h24v24H0z"></path><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"></path></svg>
                                    <h6 class="card-subtitle text-body-secondary">Experience: 2 years</h6>
                                </div>
                                <div class="d-flex align-items-center">
                                    <svg class="me-2" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class=" mr-2" color="#4a4a4a" height="20" width="20" xmlns="http://www.w3.org/2000/svg" style="color: rgb(74, 74, 74);"><path fill="none" d="M0 0h24v24H0z"></path><path d="M12 2C8.13 2 5 5.13 5 9c0 1.74.5 3.37 1.41 4.84.95 1.54 2.2 2.86 3.16 4.4.47.75.81 1.45 1.17 2.26.26.55.47 1.5 1.26 1.5s1-.95 1.25-1.5c.37-.81.7-1.51 1.17-2.26.96-1.53 2.21-2.85 3.16-4.4C18.5 12.37 19 10.74 19 9c0-3.87-3.13-7-7-7zm0 9.75a2.5 2.5 0 010-5 2.5 2.5 0 010 5z"></path></svg>
                                    <h6 class="card-subtitle text-body-secondary">On-Site</h6>
                                </div>
                                <div class="d-flex align-items-center mt-4 ">
                                    <svg class="me-2" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 640 512" class="mb-2 mr-2" color="#4a4a4a" height="20" width="20" xmlns="http://www.w3.org/2000/svg" style="color: rgb(74, 74, 74);"><path d="M608 64H32C14.33 64 0 78.33 0 96v320c0 17.67 14.33 32 32 32h576c17.67 0 32-14.33 32-32V96c0-17.67-14.33-32-32-32zM48 400v-64c35.35 0 64 28.65 64 64H48zm0-224v-64h64c0 35.35-28.65 64-64 64zm272 176c-44.19 0-80-42.99-80-96 0-53.02 35.82-96 80-96s80 42.98 80 96c0 53.03-35.83 96-80 96zm272 48h-64c0-35.35 28.65-64 64-64v64zm0-224c-35.35 0-64-28.65-64-64h64v64z"></path></svg>
                                    <h6 class="card-subtitle text-primary fw-bold">Negotiable</h6>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h6 class="card-subtitle text-danger float-end">Deadline: 05 Apr, 2024</h6>
                        </div>
                    </div>
                </a>
            </div>
           
            <div class="col-6 my-4">
                <a href="{{route('career-details.details')}}" class="card">
                    <div class="card-body">
                        <div class="d-flex flex-wrap">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1"
                                viewBox="0 0 48 48" enable-background="new 0 0 48 48" class="mx-2" height="1em"
                                width="1em" xmlns="http://www.w3.org/2000/svg" style="font-size: 44px;">
                                <path fill="#424242"
                                    d="M27,7h-6c-1.7,0-3,1.3-3,3v3h2v-3c0-0.6,0.4-1,1-1h6c0.6,0,1,0.4,1,1v3h2v-3C30,8.3,28.7,7,27,7z">
                                </path>
                                <path fill="#E65100"
                                    d="M40,43H8c-2.2,0-4-1.8-4-4V15c0-2.2,1.8-4,4-4h32c2.2,0,4,1.8,4,4v24C44,41.2,42.2,43,40,43z">
                                </path>
                                <path fill="#FF6E40"
                                    d="M40,28H8c-2.2,0-4-1.8-4-4v-9c0-2.2,1.8-4,4-4h32c2.2,0,4,1.8,4,4v9C44,26.2,42.2,28,40,28z">
                                </path>
                                <path fill="#FFF3E0"
                                    d="M26,26h-4c-0.6,0-1-0.4-1-1v-2c0-0.6,0.4-1,1-1h4c0.6,0,1,0.4,1,1v2C27,25.6,26.6,26,26,26z">
                                </path>
                            </svg>
                            <div>
                                <h5 class="card-title job-title" style="margin-bottom: 30px; margin-top:10px; ">Frontend Developer</h5>
                                <div class="d-flex align-items-center">
                                    <svg class="me-2" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="mr-2" color="#4a4a4a" height="20" width="20" xmlns="http://www.w3.org/2000/svg" style="color: rgb(74, 74, 74);"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm3.3 14.71L11 12.41V7h2v4.59l3.71 3.71-1.42 1.41z"></path></svg>
                                    <h6 class="card-subtitle text-body-secondary">Card subtitle</h6>
                                </div>
                                <div class="d-flex align-items-center my-4">
                                    <svg class="me-2" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class=" mr-2" color="#4a4a4a" height="20" width="20" xmlns="http://www.w3.org/2000/svg" style="color: rgb(74, 74, 74);"><path fill="none" d="M0 0h24v24H0z"></path><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"></path></svg>
                                    <h6 class="card-subtitle text-body-secondary">Experience: 2 years</h6>
                                </div>
                                <div class="d-flex align-items-center">
                                    <svg class="me-2" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class=" mr-2" color="#4a4a4a" height="20" width="20" xmlns="http://www.w3.org/2000/svg" style="color: rgb(74, 74, 74);"><path fill="none" d="M0 0h24v24H0z"></path><path d="M12 2C8.13 2 5 5.13 5 9c0 1.74.5 3.37 1.41 4.84.95 1.54 2.2 2.86 3.16 4.4.47.75.81 1.45 1.17 2.26.26.55.47 1.5 1.26 1.5s1-.95 1.25-1.5c.37-.81.7-1.51 1.17-2.26.96-1.53 2.21-2.85 3.16-4.4C18.5 12.37 19 10.74 19 9c0-3.87-3.13-7-7-7zm0 9.75a2.5 2.5 0 010-5 2.5 2.5 0 010 5z"></path></svg>
                                    <h6 class="card-subtitle text-body-secondary">On-Site</h6>
                                </div>
                                <div class="d-flex align-items-center mt-4 ">
                                    <svg class="me-2" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 640 512" class="mb-2 mr-2" color="#4a4a4a" height="20" width="20" xmlns="http://www.w3.org/2000/svg" style="color: rgb(74, 74, 74);"><path d="M608 64H32C14.33 64 0 78.33 0 96v320c0 17.67 14.33 32 32 32h576c17.67 0 32-14.33 32-32V96c0-17.67-14.33-32-32-32zM48 400v-64c35.35 0 64 28.65 64 64H48zm0-224v-64h64c0 35.35-28.65 64-64 64zm272 176c-44.19 0-80-42.99-80-96 0-53.02 35.82-96 80-96s80 42.98 80 96c0 53.03-35.83 96-80 96zm272 48h-64c0-35.35 28.65-64 64-64v64zm0-224c-35.35 0-64-28.65-64-64h64v64z"></path></svg>
                                    <h6 class="card-subtitle text-primary fw-bold">Negotiable</h6>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h6 class="card-subtitle text-danger float-end">Deadline: 05 Apr, 2024</h6>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
