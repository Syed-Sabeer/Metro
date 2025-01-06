@extends('layouts.main')

@section('main-container')

<div class="contents">


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">


                    <!-- ends: .card -->



                <div class="breadcrumb-main application-ui mb-30">
                    <div class="breadcrumb-action d-flex">
                        <div class="d-flex align-items-center user-member__title me-sm-25 me-0">
                            <h4 class="text-capitalize fw-500 breadcrumb-title">Application UI Design</h4>
                        </div>
                        <!-- Backward Status Button -->
                        <form action="{{ route('case.back', $case->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="current_status_id" value="{{ $case->status_id }}">
                            <div class="action-btn me-10 my-sm-0">
                                <button type="submit" class="btn btn-primary bg-primary fs-12 fw-500">
                                    <img src="img/svg/minus.svg" alt="minus" class="svg"> Backward
                                </button>
                            </div>
                        </form>

                        <!-- Forward Status Button -->
                        <form action="{{ route('case.forward', $case->id) }}" method="POST">
                            @csrf
                            <div class="action-btn me-10 my-sm-0">
                                <button type="submit" class="btn btn-primary bg-primary fs-12 fw-500">
                                    <img src="img/svg/plus.svg" alt="plus" class="svg"> Forward
                                </button>
                            </div>
                        </form>

                    </div>
                    <div class="d-flex text-capitalize">
                        <button type="button"
                            class="breadcrumb-edit btn btn-white border-0 color-primary content-center fs-12 fw-500 radius-md">
                            <img src="img/svg/edit-3.svg" alt="edit-3" class="svg">edit</button>
                        <button type="button"
                            class="breadcrumb-remove border-0 color-danger content-center bg-white fs-12 fw-500 ms-10 radius-md">
                            <img class="svg" src="img/svg/trash-2.svg" alt="trash-2">remove</button>
                    </div>
                </div>

                <div class="card card-default card-md mb-4">

                    <div class="card-body">
                      <div class="dm-steps-wrap">


                        <div class="dm-steps">
                          <ul class="nav">

                            @foreach($statuses as $status)
                                <li class="dm-steps__item
                                    {{ $case->status_id >= $status->id ? 'finished' : '' }}
                                    {{ $case->status_id == $status->id ? 'active' : '' }}">
                                    <div class="dm-steps__line"></div>
                                    <div class="dm-steps__content">
                                        <span class="dm-steps__icon">
                                            <i class="la la-check"></i>
                                        </span>
                                        <span class="dm-steps__text">{{ $status->status_name }}</span> <!-- Status name from the Status table -->
                                    </div>
                                </li>
                            @endforeach

                            {{-- <li class="dm-steps__item finished">
                              <div class="dm-steps__line"></div>
                              <div class="dm-steps__content">
                                <span class="dm-steps__icon"><span class="dm-steps__count">2</span></span>
                                <span class="dm-steps__text">In Progress</span>
                              </div>
                            </li>
                            <li class="dm-steps__item finished">
                              <div class="dm-steps__content">
                                <span class="dm-steps__icon"><span class="dm-steps__count">3</span></span>
                                <span class="dm-steps__text">pending</span>
                              </div>
                            </li>
                            <li class="dm-steps__item active">
                                <div class="dm-steps__content">
                                  <span class="dm-steps__icon"><span class="dm-steps__count">3</span></span>
                                  <span class="dm-steps__text">Waiting</span>
                                </div>
                              </li>
                              <li class="dm-steps__item">
                                <div class="dm-steps__content">
                                  <span class="dm-steps__icon"><span class="dm-steps__count">3</span></span>
                                  <span class="dm-steps__text">Waiting</span>
                                </div>
                              </li>
                              <li class="dm-steps__item">
                                <div class="dm-steps__content">
                                  <span class="dm-steps__icon"><span class="dm-steps__count">3</span></span>
                                  <span class="dm-steps__text">Waiting</span>
                                </div>
                              </li>
                              <li class="dm-steps__item">
                                <div class="dm-steps__content">
                                  <span class="dm-steps__icon"><span class="dm-steps__count">3</span></span>
                                  <span class="dm-steps__text">Waiting</span>
                                </div>
                              </li> --}}


                          </ul>
                        </div>


                      </div>
                    </div>
                  </div>


            </div>
        </div>

        <div class="projects-tab-content mb-30">
            <div class="row">
                <div class="col-xxl-3 col-lg-4 mb-25">

                    <div class="progress-box px-25 pt-25 pb-10 bg-success radius-xl">
                        <div class="d-flex justify-content-between mb-3">
                            <h6 class="text-white fw-500 fs-16 text-capitalize">progress</h6>
                            <span class="progress-percentage text-white fw-500 fs-16 text-capitalize">64%</span>
                        </div>
                        <div class="progress-wrap d-flex align-items-center mb-15">
                            <div class="progress progress-height">
                                <div class="progress-bar bg-white" role="progressbar" style="width: 64%;"
                                    aria-valuenow="64" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-25">
                        <div class="card-body">
                            <div class="application-task d-flex align-items-center mb-25">
                                {{-- <div class="application-task-icon wh-60 bg-opacity-secondary content-center">
                                    <img class="svg wh-25 text-secondary" src="img/svg/at.svg" alt="img">
                                </div> --}}
                                <div class="application-task-content">
                                    <h4>Case owner</h4>
                                    @php
                                        $owner_name = App\Models\User::where('id', $case->owner_id)->value('name');
                                    @endphp
                                    <span class="text-light fs-14 mt-1 text-capitalize">{{ $owner_name }}</span>
                                </div>
                            </div>
                            <div class="application-task d-flex align-items-center mb-25">
                                {{-- <div class="application-task-icon wh-60 bg-opacity-primary content-center">
                                    <img class="svg wh-25 text-primary" src="img/svg/at2.svg" alt="img">
                                </div> --}}
                                <div class="application-task-content">
                                    <h4>Start Date</h4>
                                    <span class="text-light fs-14 mt-1 text-capitalize">{{ $case->created_at->format('d M Y') }}</span>
                                </div>
                            </div>
                            {{-- <div class="application-task d-flex align-items-center mb-25">
                                <div class="application-task-icon wh-60 bg-opacity-success content-center">
                                    <img class="svg wh-25 text-success" src="img/svg/at4.svg" alt="img">
                                </div>
                                <div class="application-task-content">
                                    <h4>$27,500</h4>
                                    <span class="text-light fs-14 mt-1 text-capitalize">Spendings</span>
                                </div>
                            </div> --}}
                            {{-- <div class="application-task d-flex align-items-center">
                                <div class="application-task-icon wh-60 bg-opacity-warning content-center">
                                    <img class="svg wh-25 text-warning" src="img/svg/at3.svg" alt="img">
                                </div>
                                <div class="application-task-content">
                                    <h4>250</h4>
                                    <span class="text-light fs-14 mt-1 text-capitalize">hours spent</span>
                                </div>
                            </div> --}}
                        </div>
                    </div>

                </div>
                <div class="col-xxl-6 col-lg-8 mb-25">
                    <div class="card border-0 pb-md-50 pb-15">
                        <div class="card-header py-sm-20 py-3  px-sm-25 px-3 ">
                            <h6>{{ $case->subject }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="about-projects">
                                <div class="about-projects__details">
                                    <p class="fs-15 mb-25">{{ $case->description }}</p>
                                </div>
                                {{-- <ul class="d-flex text-capitalize">
                                    <li>
                                        <span class="color-light fs-13">Project owner</span>
                                        <p class="color-dark fs-14 mt-1 mb-0 fw-500">Peter Jackson</p>
                                    </li>
                                    <li>
                                        <span class="color-light fs-13">Budget</span>
                                        <p class="color-dark fs-14 mt-1 mb-0 fw-500">$56,700</p>
                                    </li>
                                    <li>
                                        <span class="color-light fs-13">Start Date</span>
                                        <p class="color-primary fs-14 mt-1 mb-0 fw-500">26 Dec 2019</p>
                                    </li>
                                    <li>
                                        <span class="color-light fs-13">Deadline</span>
                                        <p class="color-danger fs-14 mt-1 mb-0 fw-500">18 Mar 2020</p>
                                    </li>
                                </ul> --}}
                            </div>
                        </div>
                    </div>

                </div>

                {{-- <div class="col-xxl-3 col-lg-6 col-12 mb-25 order-xxl-0 order-lg-1">
                    <div class="card h-100">
                        <div
                            class="card-header d-flex justify-content-between align-items-center py-10  px-sm-25 px-3">
                            <h6 class="fw-500 ">users</h6>
                            <button type="button"
                                class="border radius-lg color-primary fw-500 fs-12 bg-transparent acButton">
                                <img class="svg" src="img/svg/user-plus.svg" alt> add user</button>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-25">
                                <img src="img/tm1.png" class="wh-46 me-15" alt="img">
                                <div>
                                    <p class="fs-14 fw-600 color-dark mb-0">Meyri Carles</p>
                                    <span class=" mt-1 fs-14  color-light ">UI Designer</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-25">
                                <img src="img/tm2.png" class="wh-46 me-15" alt="img">
                                <div>
                                    <p class="fs-14 fw-600 color-dark mb-0">Shreyu Neu</p>
                                    <span class=" mt-1 fs-14  color-light ">Web Developer</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-25">
                                <img src="img/tm3.png" class="wh-46 me-15" alt="img">
                                <div>
                                    <p class="fs-14 fw-600 color-dark mb-0">Tuhin Molla</p>
                                    <span class=" mt-1 fs-14  color-light ">Project Manager</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-25">
                                <img src="img/tm4.png" class="wh-46 me-15" alt="img">
                                <div>
                                    <p class="fs-14 fw-600 color-dark mb-0">Billal Hossain</p>
                                    <span class=" mt-1 fs-14  color-light ">App Developer</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <img src="img/tm5.png" class="wh-46 me-15" alt="img">
                                <div>
                                    <p class="fs-14 fw-600 color-dark mb-0">Khalid Hasan</p>
                                    <span class=" mt-1 fs-14  color-light ">App Developer</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> --}}

                <div class="col-xxl-8 col-md-8  mb-25">
                    <div class="card">
                        <div class="card-header p-0">
                            <ul class="nav px-25 ap-tab-main app-ui-tab" id="project-ap-tab" role="tablist">

                                <li class="nav-item active">
                                    <a class="nav-link" id="project-timeline-tab" data-bs-toggle="pill"
                                        href="#project-timeline" role="tab" aria-selected="false">Activities</a>
                                </li>
                            </ul>
                        </div>
                        <div id="app">
                            <Roots>
                                
                             
                            
                            </Roots>
                        </div>
                    </div>

                </div>

                <div class="col-xxl-4 col-lg-4 col-md-4 order-lg-0 order-md-1">
                    <div class="card pb-10 border-0">
                        <div class="card-header py-20  px-sm-25 px-3 ">
                            <h6>files</h6>
                        </div>
                        <div class="card-body">

                            @foreach($caseFiles as $file)
                                <div class="mb-20">
                                    <div class="files-area d-flex justify-content-between align-items-center">
                                        <div class="files-area__left d-flex align-items-center">
                                            <div class="files-area__img">
                                                <!-- Check for file extension and dynamically display icons -->
                                                @php
                                                    $fileExtension = pathinfo($file->file_path, PATHINFO_EXTENSION);
                                                @endphp

                                                <!-- Dynamic icon based on file type -->
                                                @if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                                    <img src="{{ asset($file->file_path) }}" alt="img" class="wh-42">
                                                @elseif(in_array($fileExtension, ['pdf']))
                                                    <!-- Embed or provide a download link -->
                                                    <a href="{{ asset($file->file_path) }}" class="fs-12 fw-500 color-primary" target="_blank">View PDF</a>
                                                @elseif(in_array($fileExtension, ['zip']))
                                                    <img src="{{ asset($file->file_path) }}" alt="img" class="wh-42">
                                                @else
                                                    <img src="{{ asset($file->file_path) }}" alt="img" class="wh-42">
                                                @endif
                                            </div>
                                            <div class="files-area__title">
                                                <p class="mb-0 fs-14 fw-500 color-dark text-capitalize"></p>
                                                <!-- Display the file size (ensure the file exists) -->
                                                {{-- @if(file_exists(public_path($file->file_path)))
                                                    <span class="color-light fs-12 d-flex">{{ number_format(filesize(public_path($file->file_path)) / 1048576, 2) }} MB</span>
                                                @else
                                                    <span class="color-light fs-12 d-flex">File not found</span>
                                                @endif --}}
                                                <div class="d-flex text-capitalize">
                                                    <a href="{{ asset($file->file_path) }}" class="fs-12 fw-500 color-primary" download>Download</a>
                                                    <a href="#" class="fs-12 fw-500 color-primary ms-10">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="files-area__right">
                                            <div class="dropdown dropleft">
                                                {{-- <button class="btn-link border-0 bg-transparent p-0"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <img src="img/svg/more-horizontal.svg" alt="more-horizontal"
                                                        class="svg">
                                                </button> --}}
                                                <div class="dropdown-menu dropdown-menu--dynamic">
                                                    <a class="dropdown-item" href="#">View</a>
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="#">Leave</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <!-- File Upload Button -->
                            <div class="mb-3 text-end">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fileUploadModal">
                                    Upload File
                                </button>
                            </div>

                            <!-- Modal for File Upload -->
                            <div class="modal fade" id="fileUploadModal" tabindex="-1" aria-labelledby="fileUploadModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="fileUploadModalLabel">Upload File</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('case.file.upload', $case->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="file" class="form-label">Select File</label>
                                                    <input type="file" class="form-control" id="file" name="file">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Upload</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>




                            {{-- <div class="mb-20">
                                <div class="files-area d-flex justify-content-between align-items-center">
                                    <div class="files-area__left d-flex align-items-center">
                                        <div class="files-area__img">
                                            <img src="img/pdf@2x.png" alt="img" class="wh-42">
                                        </div>
                                        <div class="files-area__title">
                                            <p class="mb-0 fs-14 fw-500 color-dark text-capitalize">
                                                Product-guidelines.pdf</p>
                                            <span class="color-light fs-12 d-flex ">5.07 KB</span>
                                            <div class="d-flex text-capitalize">
                                                <a href="#" class="fs-12 fw-500 color-primary ">view</a>
                                                <a href="#"
                                                    class="fs-12 fw-500 color-primary ms-10">download</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="files-area__right">
                                        <div class="dropdown dropleft">
                                            <button class="btn-link border-0 bg-transparent p-0"
                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <img src="img/svg/more-horizontal.svg" alt="more-horizontal"
                                                    class="svg">
                                            </button>
                                            <div class="dropdown-menu dropdown-menu--dynamic">
                                                <a class="dropdown-item" href="#">view</a>
                                                <a class="dropdown-item" href="#">edit</a>
                                                <a class="dropdown-item" href="#">leave</a>
                                                <a class="dropdown-item" href="#">delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-20">
                                <div class="files-area d-flex justify-content-between align-items-center">
                                    <div class="files-area__left d-flex align-items-center">
                                        <div class="files-area__img">
                                            <img src="img/psd@2x.png" alt="img" class="wh-42">
                                        </div>
                                        <div class="files-area__title">
                                            <p class="mb-0 fs-14 fw-500 color-dark text-capitalize">
                                                admin-wireframe.psd</p>
                                            <span class="color-light fs-12 d-flex ">2.05 MB</span>
                                            <div class="d-flex text-capitalize">
                                                <a href="#" class="fs-12 fw-500 color-primary ">download</a>
                                                <a href="#" class="fs-12 fw-500 color-primary ms-10"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="files-area__right">
                                        <div class="dropdown dropleft">
                                            <button class="btn-link border-0 bg-transparent p-0"
                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <img src="img/svg/more-horizontal.svg" alt="more-horizontal"
                                                    class="svg">
                                            </button>
                                            <div class="dropdown-menu dropdown-menu--dynamic">
                                                <a class="dropdown-item" href="#">view</a>
                                                <a class="dropdown-item" href="#">edit</a>
                                                <a class="dropdown-item" href="#">leave</a>
                                                <a class="dropdown-item" href="#">delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-20">
                                <div class="files-area d-flex justify-content-between align-items-center">
                                    <div class="files-area__left d-flex align-items-center">
                                        <div class="files-area__img">
                                            <img src="img/jpg@2x.png" alt="img" class="wh-42">
                                        </div>
                                        <div class="files-area__title">
                                            <p class="mb-0 fs-14 fw-500 color-dark text-capitalize">
                                                Wirefram-escreenshots.jpg</p>
                                            <span class="color-light fs-12 d-flex ">522 KB</span>
                                            <div class="d-flex text-capitalize">
                                                <a href="#" class="fs-12 fw-500 color-primary ">view</a>
                                                <a href="#"
                                                    class="fs-12 fw-500 color-primary ms-10">download</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="files-area__right">
                                        <div class="dropdown dropleft">
                                            <button class="btn-link border-0 bg-transparent p-0"
                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <img src="img/svg/more-horizontal.svg" alt="more-horizontal"
                                                    class="svg">
                                            </button>
                                            <div class="dropdown-menu dropdown-menu--dynamic">
                                                <a class="dropdown-item" href="#">view</a>
                                                <a class="dropdown-item" href="#">edit</a>
                                                <a class="dropdown-item" href="#">leave</a>
                                                <a class="dropdown-item" href="#">delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="files-area d-flex justify-content-between align-items-center">
                                    <div class="files-area__left d-flex align-items-center">
                                        <div class="files-area__img">
                                            <img src="img/png@2x.png" alt="img" class="wh-42">
                                        </div>
                                        <div class="files-area__title">
                                            <p class="mb-0 fs-14 fw-500 color-dark text-capitalize">Logo.png</p>
                                            <span class="color-light fs-12 d-flex ">522 KB</span>
                                            <div class="d-flex text-capitalize">
                                                <a href="#" class="fs-12 fw-500 color-primary ">view</a>
                                                <a href="#"
                                                    class="fs-12 fw-500 color-primary ms-10">download</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="files-area__right">
                                        <div class="dropdown dropleft">
                                            <button class="btn-link border-0 bg-transparent p-0"
                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <img src="img/svg/more-horizontal.svg" alt="more-horizontal"
                                                    class="svg">
                                            </button>
                                            <div class="dropdown-menu dropdown-menu--dynamic">
                                                <a class="dropdown-item" href="#">view</a>
                                                <a class="dropdown-item" href="#">edit</a>
                                                <a class="dropdown-item" href="#">leave</a>
                                                <a class="dropdown-item" href="#">delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>

                </div>

             

            </div>
        </div>

    </div>
</div>

@vite('resources/js/app.js')
@endsection
