@extends('layouts.main')

@section('container')
    @include('partials.sidebar')
    <section class="home-section">
        <h4 class="pt-3">PEMANTAUAN TEMPAT SAMPAH PINTAR</h4>
        <h5 class="mb-2">POLITEKNIK NEGERI SEMARANG</h5>
        <hr>
        <div class="row justify-content-center">
            <div class="row row-cols-1 row-cols-md-4 pt-2 text-center">
                <div class="col-lg-3 col-md-6">
                    <a href="" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <div class="card">
                            {{-- <div class="card-header text-end">
                                <a href="" class="link-warning"><i class="fa-solid fa-square-pen"></i></i></a>
                                <a href="" class="link-danger"><i class="fa-solid fa-square-minus"></i></a>
                            </div> --}}
                            <h4 class="card-title mt-2">Tempat Sampah</h4>
                            <div class="trash mx-auto">
                                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 285.5 374" data-percent="30" data-color="#ff5733" data-animation="2000"
                                    width="150" height="150" fill="currentColor"
                                    class="bi bi-alarm-fill progressIcon d-flex" viewBox="0 0 16 16">
                                    <defs>
                                        <style>
                                            .cls-1 {
                                                fill: #444e3f;
                                            }

                                        </style>
                                    </defs>
                                    <title>sampah</title>
                                    <path class="cls-1"
                                        d="M459.75,732.75c-4.58-2.4-9.63-4.21-13.63-7.35-5.41-4.24-7.75-10.51-8.21-17.44q-4.87-73.69-9.82-147.38-3.16-47.31-6.33-94.63c-.06-.86,0-1.73,0-2.9h238c-.2,4.12-.34,8.19-.61,12.25q-3.57,53.49-7.18,107-3.18,47.7-6.28,95.39c-.71,10.6-1.37,21.2-2.23,31.79-.85,10.38-8.57,19.36-18.92,22.36-.94.28-1.86.63-2.79.94Zm117-60.79c-.21,6.78,4.56,12.36,11.19,12.76s12.14-4.46,12.78-11.51c.79-8.71,1.51-17.42,2.28-26.13q3.21-36.78,6.43-73.56c1.1-12.69,2.34-25.38,3.22-38.09a11.82,11.82,0,0,0-11.15-12.65,12.06,12.06,0,0,0-12.74,11.12c-.3,3-.52,6-.78,9l-6.42,73.55C580,634.83,578.39,653.26,576.77,672Zm-72.07-.8c-.42-4.42-.9-9.27-1.32-14.12q-5.33-61.42-10.64-122.85c-.6-6.94-6.21-11.88-12.85-11.41a12,12,0,0,0-11.09,12.75c.14,3.74.57,7.47.89,11.2q5.52,63.1,11,126.2c.63,7.21,6.1,12.27,12.88,11.79C500.22,684.25,505,678.65,504.7,671.16Zm24.05-67.94q0,34.31,0,68.61c0,7.56,5.17,13,12.12,12.91,6.79-.07,11.85-5.43,11.85-12.79q0-68.25,0-136.48a14.79,14.79,0,0,0-.76-4.77A11.93,11.93,0,0,0,528.78,535C528.72,557.73,528.75,580.47,528.75,603.22Z"
                                        transform="translate(-397.25 -358.75)" />
                                    <path class="cls-1"
                                        d="M582.05,358.75c1,.36,2,.76,3,1.08,10.43,3.37,17.5,13.12,17.71,24.58.1,5.24,0,10.49,0,16.34h3.84q25,0,50,0c15.64,0,26.13,11.09,26.17,27.56,0,6.62,0,13.23,0,20.14H397.59c0-8.85-.88-17.78.21-26.45a24.06,24.06,0,0,1,24-21.23c17-.11,34,0,51.06,0h4.18c0-4.92,0-9.51,0-14.09,0-14.29,6.72-23.52,19.82-27.34a4.31,4.31,0,0,0,.89-.57Zm-42.13,42c12,0,24-.07,36.05.05,2.91,0,4.15-.94,4-4.09a100.47,100.47,0,0,1,0-10.12c.14-3-1.08-3.95-3.81-3.88-5.35.14-10.7,0-16.06,0-18.68,0-37.36.05-56-.05-3.06,0-4.37.94-4.15,4.28a68,68,0,0,1,0,9.36c-.25,3.53,1.13,4.52,4.35,4.47C516.13,400.65,528,400.75,539.92,400.75Z"
                                        transform="translate(-397.25 -358.75)" />
                                </svg>
                            </div>
                            <div class="card-body">
                                <span class="num fs-1" data-val="30">0</span>
                                <span class="text fs-1">%</span>
                                <p class="card-text">{{ $location }}</p>
                            </div>
                        </div>
                    </a>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tempat Sampah Lab Barat 01</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <iframe
                                        src="https://www.google.com/maps/d/u/0/embed?mid=1OzYrTADBeLOnTaeJhqDUmkzaDEJkEm7W&ehbc=2E312F"
                                        width="440" height="300" class="rounded"></iframe>
                                    <div class="row justify-content-evenly pt-2">
                                        <div class="col-4 bg-secondary bg-opacity-25  rounded">
                                            <div class="row">
                                                <p class="mb-0 mt-1">Volume sampah saat ini : </p>
                                            </div>
                                            <div class="row row-cols-auto justify-content-center">
                                                <span class="num fs-1 px-0" data-val="70">0</span>
                                                <span class="text fs-1 px-0">%</span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row bg-secondary bg-opacity-25 rounded">
                                                <p class="my-1">Lokasi : {{ $location }}</p>
                                            </div>
                                            <div class="row bg-secondary bg-opacity-25 rounded mt-1">
                                                <p class="my-1">Last Update : 11-04-2022 12:44:32</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary">Hide</button>
                                    <button type="button" class="btn btn-primary">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        {{-- <div class="card-header text-end">
                            <a href="" class="link-warning"><i class="fa-solid fa-square-pen"></i></i></a>
                            <a href="" class="link-danger"><i class="fa-solid fa-square-minus"></i></a>
                        </div> --}}
                        <h4 class="card-title mt-2">Tempat Sampah</h4>
                        <div class="trash mx-auto">
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 285.5 374"
                                data-percent="70" data-color="#ff5733" data-animation="2000" width="150" height="150"
                                fill="currentColor" class="bi bi-alarm-fill progressIcon d-flex" viewBox="0 0 16 16">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            fill: #444e3f;
                                        }

                                    </style>
                                </defs>
                                <title>sampah</title>
                                <path class="cls-1"
                                    d="M459.75,732.75c-4.58-2.4-9.63-4.21-13.63-7.35-5.41-4.24-7.75-10.51-8.21-17.44q-4.87-73.69-9.82-147.38-3.16-47.31-6.33-94.63c-.06-.86,0-1.73,0-2.9h238c-.2,4.12-.34,8.19-.61,12.25q-3.57,53.49-7.18,107-3.18,47.7-6.28,95.39c-.71,10.6-1.37,21.2-2.23,31.79-.85,10.38-8.57,19.36-18.92,22.36-.94.28-1.86.63-2.79.94Zm117-60.79c-.21,6.78,4.56,12.36,11.19,12.76s12.14-4.46,12.78-11.51c.79-8.71,1.51-17.42,2.28-26.13q3.21-36.78,6.43-73.56c1.1-12.69,2.34-25.38,3.22-38.09a11.82,11.82,0,0,0-11.15-12.65,12.06,12.06,0,0,0-12.74,11.12c-.3,3-.52,6-.78,9l-6.42,73.55C580,634.83,578.39,653.26,576.77,672Zm-72.07-.8c-.42-4.42-.9-9.27-1.32-14.12q-5.33-61.42-10.64-122.85c-.6-6.94-6.21-11.88-12.85-11.41a12,12,0,0,0-11.09,12.75c.14,3.74.57,7.47.89,11.2q5.52,63.1,11,126.2c.63,7.21,6.1,12.27,12.88,11.79C500.22,684.25,505,678.65,504.7,671.16Zm24.05-67.94q0,34.31,0,68.61c0,7.56,5.17,13,12.12,12.91,6.79-.07,11.85-5.43,11.85-12.79q0-68.25,0-136.48a14.79,14.79,0,0,0-.76-4.77A11.93,11.93,0,0,0,528.78,535C528.72,557.73,528.75,580.47,528.75,603.22Z"
                                    transform="translate(-397.25 -358.75)" />
                                <path class="cls-1"
                                    d="M582.05,358.75c1,.36,2,.76,3,1.08,10.43,3.37,17.5,13.12,17.71,24.58.1,5.24,0,10.49,0,16.34h3.84q25,0,50,0c15.64,0,26.13,11.09,26.17,27.56,0,6.62,0,13.23,0,20.14H397.59c0-8.85-.88-17.78.21-26.45a24.06,24.06,0,0,1,24-21.23c17-.11,34,0,51.06,0h4.18c0-4.92,0-9.51,0-14.09,0-14.29,6.72-23.52,19.82-27.34a4.31,4.31,0,0,0,.89-.57Zm-42.13,42c12,0,24-.07,36.05.05,2.91,0,4.15-.94,4-4.09a100.47,100.47,0,0,1,0-10.12c.14-3-1.08-3.95-3.81-3.88-5.35.14-10.7,0-16.06,0-18.68,0-37.36.05-56-.05-3.06,0-4.37.94-4.15,4.28a68,68,0,0,1,0,9.36c-.25,3.53,1.13,4.52,4.35,4.47C516.13,400.65,528,400.75,539.92,400.75Z"
                                    transform="translate(-397.25 -358.75)" />
                            </svg>
                        </div>
                        <div class="card-body">
                            <span class="num fs-1" data-val="70">0</span>
                            <span class="text fs-1">%</span>
                            <p class="card-text">{{ $location }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        {{-- <div class="card-header text-end">
                            <a href="" class="link-warning"><i class="fa-solid fa-square-pen"></i></i></a>
                            <a href="" class="link-danger"><i class="fa-solid fa-square-minus"></i></a>
                        </div> --}}
                        <h4 class="card-title mt-2">Tempat Sampah</h4>
                        <div class="trash mx-auto">
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 285.5 374"
                                data-percent="90" data-color="#ff5733" data-animation="2000" width="150" height="150"
                                fill="currentColor" class="bi bi-alarm-fill progressIcon d-flex" viewBox="0 0 16 16">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            fill: #444e3f;
                                        }

                                    </style>
                                </defs>
                                <title>sampah</title>
                                <path class="cls-1"
                                    d="M459.75,732.75c-4.58-2.4-9.63-4.21-13.63-7.35-5.41-4.24-7.75-10.51-8.21-17.44q-4.87-73.69-9.82-147.38-3.16-47.31-6.33-94.63c-.06-.86,0-1.73,0-2.9h238c-.2,4.12-.34,8.19-.61,12.25q-3.57,53.49-7.18,107-3.18,47.7-6.28,95.39c-.71,10.6-1.37,21.2-2.23,31.79-.85,10.38-8.57,19.36-18.92,22.36-.94.28-1.86.63-2.79.94Zm117-60.79c-.21,6.78,4.56,12.36,11.19,12.76s12.14-4.46,12.78-11.51c.79-8.71,1.51-17.42,2.28-26.13q3.21-36.78,6.43-73.56c1.1-12.69,2.34-25.38,3.22-38.09a11.82,11.82,0,0,0-11.15-12.65,12.06,12.06,0,0,0-12.74,11.12c-.3,3-.52,6-.78,9l-6.42,73.55C580,634.83,578.39,653.26,576.77,672Zm-72.07-.8c-.42-4.42-.9-9.27-1.32-14.12q-5.33-61.42-10.64-122.85c-.6-6.94-6.21-11.88-12.85-11.41a12,12,0,0,0-11.09,12.75c.14,3.74.57,7.47.89,11.2q5.52,63.1,11,126.2c.63,7.21,6.1,12.27,12.88,11.79C500.22,684.25,505,678.65,504.7,671.16Zm24.05-67.94q0,34.31,0,68.61c0,7.56,5.17,13,12.12,12.91,6.79-.07,11.85-5.43,11.85-12.79q0-68.25,0-136.48a14.79,14.79,0,0,0-.76-4.77A11.93,11.93,0,0,0,528.78,535C528.72,557.73,528.75,580.47,528.75,603.22Z"
                                    transform="translate(-397.25 -358.75)" />
                                <path class="cls-1"
                                    d="M582.05,358.75c1,.36,2,.76,3,1.08,10.43,3.37,17.5,13.12,17.71,24.58.1,5.24,0,10.49,0,16.34h3.84q25,0,50,0c15.64,0,26.13,11.09,26.17,27.56,0,6.62,0,13.23,0,20.14H397.59c0-8.85-.88-17.78.21-26.45a24.06,24.06,0,0,1,24-21.23c17-.11,34,0,51.06,0h4.18c0-4.92,0-9.51,0-14.09,0-14.29,6.72-23.52,19.82-27.34a4.31,4.31,0,0,0,.89-.57Zm-42.13,42c12,0,24-.07,36.05.05,2.91,0,4.15-.94,4-4.09a100.47,100.47,0,0,1,0-10.12c.14-3-1.08-3.95-3.81-3.88-5.35.14-10.7,0-16.06,0-18.68,0-37.36.05-56-.05-3.06,0-4.37.94-4.15,4.28a68,68,0,0,1,0,9.36c-.25,3.53,1.13,4.52,4.35,4.47C516.13,400.65,528,400.75,539.92,400.75Z"
                                    transform="translate(-397.25 -358.75)" />
                            </svg>
                        </div>
                        <div class="card-body">
                            <span class="num fs-1" data-val="90">0</span>
                            <span class="text fs-1">%</span>
                            <p class="card-text">{{ $location }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        {{-- <div class="card-header text-end">
                            <a href="" class="link-warning"><i class="fa-solid fa-square-pen"></i></i></a>
                            <a href="" class="link-danger"><i class="fa-solid fa-square-minus"></i></a>
                        </div> --}}
                        <h4 class="card-title mt-2">Tempat Sampah</h4>
                        <div class="trash mx-auto">
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 285.5 374"
                                data-percent="50" data-color="#ff5733" data-animation="2000" width="150" height="150"
                                fill="currentColor" class="bi bi-alarm-fill progressIcon d-flex" viewBox="0 0 16 16">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            fill: #444e3f;
                                        }

                                    </style>
                                </defs>
                                <title>sampah</title>
                                <path class="cls-1"
                                    d="M459.75,732.75c-4.58-2.4-9.63-4.21-13.63-7.35-5.41-4.24-7.75-10.51-8.21-17.44q-4.87-73.69-9.82-147.38-3.16-47.31-6.33-94.63c-.06-.86,0-1.73,0-2.9h238c-.2,4.12-.34,8.19-.61,12.25q-3.57,53.49-7.18,107-3.18,47.7-6.28,95.39c-.71,10.6-1.37,21.2-2.23,31.79-.85,10.38-8.57,19.36-18.92,22.36-.94.28-1.86.63-2.79.94Zm117-60.79c-.21,6.78,4.56,12.36,11.19,12.76s12.14-4.46,12.78-11.51c.79-8.71,1.51-17.42,2.28-26.13q3.21-36.78,6.43-73.56c1.1-12.69,2.34-25.38,3.22-38.09a11.82,11.82,0,0,0-11.15-12.65,12.06,12.06,0,0,0-12.74,11.12c-.3,3-.52,6-.78,9l-6.42,73.55C580,634.83,578.39,653.26,576.77,672Zm-72.07-.8c-.42-4.42-.9-9.27-1.32-14.12q-5.33-61.42-10.64-122.85c-.6-6.94-6.21-11.88-12.85-11.41a12,12,0,0,0-11.09,12.75c.14,3.74.57,7.47.89,11.2q5.52,63.1,11,126.2c.63,7.21,6.1,12.27,12.88,11.79C500.22,684.25,505,678.65,504.7,671.16Zm24.05-67.94q0,34.31,0,68.61c0,7.56,5.17,13,12.12,12.91,6.79-.07,11.85-5.43,11.85-12.79q0-68.25,0-136.48a14.79,14.79,0,0,0-.76-4.77A11.93,11.93,0,0,0,528.78,535C528.72,557.73,528.75,580.47,528.75,603.22Z"
                                    transform="translate(-397.25 -358.75)" />
                                <path class="cls-1"
                                    d="M582.05,358.75c1,.36,2,.76,3,1.08,10.43,3.37,17.5,13.12,17.71,24.58.1,5.24,0,10.49,0,16.34h3.84q25,0,50,0c15.64,0,26.13,11.09,26.17,27.56,0,6.62,0,13.23,0,20.14H397.59c0-8.85-.88-17.78.21-26.45a24.06,24.06,0,0,1,24-21.23c17-.11,34,0,51.06,0h4.18c0-4.92,0-9.51,0-14.09,0-14.29,6.72-23.52,19.82-27.34a4.31,4.31,0,0,0,.89-.57Zm-42.13,42c12,0,24-.07,36.05.05,2.91,0,4.15-.94,4-4.09a100.47,100.47,0,0,1,0-10.12c.14-3-1.08-3.95-3.81-3.88-5.35.14-10.7,0-16.06,0-18.68,0-37.36.05-56-.05-3.06,0-4.37.94-4.15,4.28a68,68,0,0,1,0,9.36c-.25,3.53,1.13,4.52,4.35,4.47C516.13,400.65,528,400.75,539.92,400.75Z"
                                    transform="translate(-397.25 -358.75)" />
                            </svg>
                        </div>
                        <div class="card-body">
                            <span class="num fs-1" data-val="50">0</span>
                            <span class="text fs-1">%</span>
                            <p class="card-text">{{ $location }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="" id="featured-3">
            <div class="row py-4 row-cols-1 row-cols-lg-4 justify-content-around fs-6">
                <div class="feature col pt-3 rounded text-light" style="background-color: #4d6360">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
                            class="bi bi-trash2" viewBox="0 0 16 16">
                            <path
                                d="M14 3a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2zM3.215 4.207l1.493 8.957a1 1 0 0 0 .986.836h4.612a1 1 0 0 0 .986-.836l1.493-8.957C11.69 4.689 9.954 5 8 5c-1.954 0-3.69-.311-4.785-.793z" />
                        </svg>
                    </div>
                    <h1 class="float-end mx-2 my-2">04</h1>
                    <h4>Total Tempat Sampah</h4>
                    <p>Jumlah total tempat sampah di lingkungan Politeknik Negeri Semarang yang dapat dipantau.</p>
                </div>
                <div class="feature col pt-3 rounded text-light" style="background-color: #62829f">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
                            class="bi bi-trash2-fill" viewBox="0 0 16 16">
                            <path
                                d="M2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z" />
                        </svg>
                    </div>
                    <h1 class="float-end mx-2 my-2">02</h1>
                    <h4>Tempat Sampah Penuh</h4>
                    <p>Jumlah tempat sampah yang terdeteksi penuh dan harus segera dikosongkan</p>
                </div>
                <div class="feature col pt-3 rounded text-light" style="background-color: #4f5e6c">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
                            class="bi bi-recycle" viewBox="0 0 16 16">
                            <path
                                d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242-2.532-4.431zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24l2.552-4.467zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.498.498 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244l-1.716-3.004z" />
                        </svg>
                    </div>
                    <h1 class="float-end mx-2 my-2">345</h1>
                    <h4>Total Volume Sampah</h4>
                    <p>Total volume sampah yang terkumpul (per hari) dari seluruh tempat sampah. <a href="#"
                            class="icon-link">Klik untuk informasi lebih detail</a></p>
                </div>
            </div>
        </div>
    </section>
@endsection
