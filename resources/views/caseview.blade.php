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
                        {{-- <form action="{{ route('case.back', $case->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="current_status_id" value="{{ $case->status_id }}">
                            <div class="action-btn me-10 my-sm-0">
                                <button type="submit" class="btn btn-primary bg-primary fs-12 fw-500">
                                    <img src="{{asset('img/svg/minus.svg')}}" alt="minus" class="svg"> Backward
                                </button>
                            </div>
                        </form> --}}

                        <!-- Forward Status Button -->
                        {{-- <form action="{{ route('case.forward', $case->id) }}" method="POST">
                            @csrf
                            <div class="action-btn me-10 my-sm-0">
                                <button type="submit" class="btn btn-primary bg-primary fs-12 fw-500">
                                    <img src="{{asset('img/svg/plus.svg')}}" alt="plus" class="svg"> Forward
                                </button>
                            </div>
                        </form> --}}

                    </div>
                    <div class="d-flex text-capitalize">
                        <button type="button"
                                class="breadcrumb-edit btn btn-white border-0 color-primary content-center fs-12 fw-500 radius-md"
                                data-bs-toggle="modal"
                                data-bs-target="#CasenewModal"
                                data-case-id="{{ $case->id }}"> <!-- Replace 123 with dynamic case ID -->
                            <img src="{{ asset('img/svg/edit-3.svg') }}" alt="edit-3" class="svg">edit
                        </button>

                        {{-- <button type="button"
                            class="breadcrumb-remove border-0 color-danger content-center bg-white fs-12 fw-500 ms-10 radius-md">
                            <img class="svg" src="{{asset('img/svg/trash-2.svg')}}" alt="trash-2">remove</button> --}}

                            <form action="{{ route('case.delete', $case->id) }}" method="GET">
                                @csrf
                                <button type="submit" id="delete" class="breadcrumb-remove border-0 color-danger content-center bg-white fs-12 fw-500 ms-10 radius-md">
                                    <img class="svg" src="{{asset('img/svg/trash-2.svg')}}" alt="trash-2">remove
                                </button>
                            </form>
                    </div>
                </div>

                <style>
                    /* Global CSS, you probably don't need that */

.clearfix:after {
    clear: both;
    content: "";
    display: block;
    height: 0;
}



.wrapper {
	display: table-cell;
	/* height: 400px; */
	vertical-align: middle;
}

.nav {
	margin-top: 40px;
}

.pull-right {
	float: right;
}

a, a:active {
	color: #333;
	text-decoration: none;
}

a:hover {
	color: #999;
}

/* Breadcrups CSS */

.arrow-steps .step {
	font-size: 14px;
	text-align: center;
	color: #666;
	cursor: default;
	margin: 0 3px;
	padding: 10px 10px 10px 30px;
	min-width: 100px;
	float: left;
	position: relative;
	background-color: #d9e3f7;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
  transition: background-color 0.2s ease;
}

.arrow-steps .step:after,
.arrow-steps .step:before {
	content: " ";
	position: absolute;
	top: 0;
	right: -17px;
	width: 0;
	height: 0;
	border-top: 19px solid transparent;
	border-bottom: 17px solid transparent;
	border-left: 17px solid #d9e3f7;
	z-index: 2;
  transition: border-color 0.2s ease;
}

.arrow-steps .step:before {
	right: auto;
	left: 0;
	border-left: 17px solid #fff;
	z-index: 0;
}

.arrow-steps .step:first-child:before {
	border: none;
}

.arrow-steps .step:first-child {
	border-top-left-radius: 4px;
	border-bottom-left-radius: 4px;
}

.arrow-steps .step span {
	position: relative;
}

.arrow-steps .step span:before {
	opacity: 0;
	content: "✔";
	position: absolute;
	top: -2px;
	left: -20px;
}

.arrow-steps .step.done span:before {
	opacity: 1;
	-webkit-transition: opacity 0.3s ease 0.5s;
	-moz-transition: opacity 0.3s ease 0.5s;
	-ms-transition: opacity 0.3s ease 0.5s;
	transition: opacity 0.3s ease 0.5s;
}

.arrow-steps .step.current {
	color: #fff;
	background-color: #8231D3;
}

.arrow-steps .step.current:after {
	border-left: 17px solid #8231D3;
}
                </style>

                 <div class="card card-default card-md mb-4">

                    {{-- <div class="card-body">
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
                                        <span class="dm-steps__text" style="font-size: 1rem">{{ $status->status_name }}</span> <!-- Status name from the Status table -->
                                    </div>
                                </li>
                            @endforeach
                          </ul>
                        </div>
                      </div>
                    </div> --}}
                    <div class="wrapper">
                        <div class="arrow-steps clearfix">
                            @foreach($statuses as $status)
                                <form action="{{ route('case.updateStatus', $case->id) }}" method="POST" class="step-form">
                                    @csrf
                                    <input type="hidden" name="status_id" value="{{ $status->id }}">
                                    <button type="submit" style="border: none !important;" class="step-btn step
                                        {{ $case->status_id >= $status->id ? 'finished' : '' }}
                                        {{ $case->status_id == $status->id ? 'current' : '' }}">
                                        <span style="border: none !important;">{{ $status->status_name }}</span>
                                    </button>
                                </form>
                            @endforeach
                        </div>
                    </div>
                  </div>




            </div>
        </div>

        <div class="projects-tab-content mb-30">
            <div class="row">
                <div class="col-xxl-3 col-lg-4 mb-25">
                    @php
                        // Calculate progress percentage
                        $completedTasks = $case->status->id; // Current status ID
                        $totalTasks = $totalRows;

                        $progressPercentage = ($completedTasks / $totalTasks) * 100; // Calculate percentage
                        $progressPercentage = round($progressPercentage); // Round off to nearest integer
                        @endphp

                    <div class="progress-box px-25 pt-25 pb-10 radius-xl" style="background-color: {{ $color }} !important;">
                        <div class="d-flex justify-content-between mb-3">
                            <h6 class="text-white fw-500 fs-16 text-capitalize">progress</h6>
                            <span class="progress-percentage text-white fw-500 fs-16 text-capitalize">
                                {{ $progressPercentage }}%
                            </span>
                        </div>
                        <div class="progress-wrap d-flex align-items-center mb-15">
                            <div class="progress progress-height">
                                <div class="progress-bar bg-white" role="progressbar"
                                    style="width: {{ $progressPercentage }}%;"
                                    aria-valuenow="{{ $progressPercentage }}"
                                    aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-25">
                        <div class="card-body">
                            <div class="application-task d-flex align-items-center mb-25">
                                <div class="application-task-content">
                                    <h4>Case owner</h4>
                                    @php
                                        $owner_name = App\Models\User::where('id', $case->owner_id)->value('name');
                                    @endphp
                                    <span class="text-light fs-14 mt-1 text-capitalize">{{ $owner_name }}</span>
                                </div>
                            </div>
                            <div class="application-task d-flex align-items-center mb-25">
                                <div class="application-task-content">
                                    <h4>Case Origin</h4>
                                    <span class="text-light fs-14 mt-1 text-capitalize">{{ $case->origin }}</span>
                                </div>
                            </div>
                            <div class="application-task d-flex align-items-center mb-25">
                                <div class="application-task-content">
                                    <h4>Case #</h4>
                                    <span class="text-light fs-14 mt-1 text-capitalize">{{ $case->case_no }}</span>
                                </div>
                            </div>
                            <div class="application-task d-flex align-items-center mb-25">

                                <div class="application-task-content">
                                    <h4>Start Date</h4>
                                    <span class="text-light fs-14 mt-1 text-capitalize">{{ $case->created_at->format('d M Y') }}</span>
                                </div>
                            </div>

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
                <div class="col-xxl-3 col-lg-4 mb-25">

                </div>
                <div class="col-xxl-6 col-lg-8 col-md-4 order-lg-0 order-md-1">
                    <div class="card pb-10 border-0">
                        <div class="card-header py-20 px-sm-25 px-3 d-flex justify-content-between align-items-center">
                            <h6>Files</h6>
                            <div class="mb-3 text-end">
                                <button type="button" class="btn btn-primary btn-rounded content-center" data-bs-toggle="modal" data-bs-target="#fileUploadModal">
                                    + Upload File
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="case-files" style="max-height: 300px; overflow-y: auto;">
                                @php $limit = 5; @endphp
                                @foreach($caseFiles as $index => $file)
                                    <div class="mb-20">
                                        <div class="files-area d-flex justify-content-between align-items-center">
                                            <div class="files-area__left d-flex align-items-center">
                                                <div class="files-area__img">
                                                    @php
                                                        $fileExtension = pathinfo($file->filename, PATHINFO_EXTENSION);
                                                    @endphp

                                                    @if (in_array($fileExtension, [ 'png']))
                                                        <img width="45" src="{{ asset('assetsCommon/svgs/png.svg') }}" alt="">
                                                    @elseif(in_array($fileExtension, ['pdf']))
                                                        <img width="45" src="{{ asset('assetsCommon/svgs/pdf.svg') }}" alt="">
                                                    @elseif(in_array($fileExtension, ['doc','docx']))
                                                        <img width="45" src="{{ asset('assetsCommon/svgs/doc.svg') }}" alt="">
                                                    @elseif(in_array($fileExtension, ['xls','xlsm','xlsx','xltx']))
                                                        <img width="45" src="{{ asset('assetsCommon/svgs/excel.svg') }}" alt="">
                                                    @elseif(in_array($fileExtension, ['jpg', 'jpeg']))
                                                        <img width="45" src="{{ asset('assetsCommon/svgs/jpg.svg') }}" alt="">
                                                    @elseif(in_array($fileExtension, ['zip']))
                                                        <img width="45" src="{{ asset('assetsCommon/svgs/zip.svg') }}" alt="">
                                                    @else
                                                        <img width="45" src="{{ asset('assetsCommon/svgs/defaultfile.svg') }}" alt="">
                                                    @endif
                                                </div>
                                                <div class="files-area__title">
                                                    <div class="d-flex text-capitalize">
                                                        <a class="fs-12 fw-500 color-primary">{{$file->filename}}</a>
                                                    </div>
                                                    <div class="d-flex text-capitalize">
                                                        <a href="{{ asset($file->file_path) }}" class="fs-12 fw-500 color-primary" download>Download</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Modal for File Upload -->
                <div class="modal fade" id="fileUploadModal" tabindex="-1" aria-labelledby="fileUploadModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="fileUploadModalLabel">Upload Files</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('case.file.upload', $case->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="file" class="form-label">Select Files</label>
                                        <input type="file" class="form-control" id="file" name="files[]" multiple>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="show_file" name="show_file" value="1">
                                        <label class="form-check-label" for="show_file">Show Files</label>
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



                <div id="app">
                <Roots></Roots>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="CasenewModal" tabindex="-1" aria-labelledby="CasenewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CasenewModalLabel">Case Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="caseForm" method="post" action="{{ route('update.case.sub.des', $case->id) }}">
                    @csrf
                    <div class="mb-3">
                        <label for="caseSubject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="caseSubject" name="subject">
                    </div>
                    <div class="mb-3">
                        <label for="caseDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="caseDescription" name="description" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="saveCaseBtn">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

@vite('resources/js/app.js')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const casenewModal = document.getElementById('CasenewModal');

        casenewModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget; // Button that triggered the modal
            const caseId = button.getAttribute('data-case-id'); // Extract info from data-* attributes

            // Dynamically generate the URL for the case details route
            const url = "{{ route('get-case-details', ['id' => ':id']) }}".replace(':id', caseId);

            // AJAX Request to get case data
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        console.error(data.error);
                    } else {
                        // Populate the modal fields
                        document.getElementById('caseSubject').value = data.subject;
                        document.getElementById('caseDescription').value = data.description;
                    }
                })
                .catch(error => {
                    console.error('Error fetching case details:', error);
                });
        });
    });
</script>

{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
    const drawer = document.getElementById('fileDrawer');
    const seeAllBtn = document.getElementById('seeAllFilesBtn');
    const closeDrawerBtn = document.getElementById('closeDrawerBtn');

    // Open drawer
    seeAllBtn.addEventListener('click', function () {
        drawer.classList.remove('d-none');
    });

    // Close drawer
    closeDrawerBtn.addEventListener('click', function () {
        drawer.classList.add('d-none');
    });
});
</script> --}}
@endsection
