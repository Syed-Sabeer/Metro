@extends('layouts.main')

<style>
#search-results {
    border: 1px solid #ddd;
    padding: 5px;
    background-color: #f9f9f9;
    max-height: 200px; /* Limit the height of the container */
    overflow-y: auto;  /* Enable scrolling if content overflows */
    height: 100px;      /* Adjust height based on the content */
}<td>{{ $user->userDetail?->first_name ?? '' }} {{ $user->userDetail?->last_name ?? '' }}</td>


#employee-search-results {
    border: 1px solid #ddd;
    padding: 5px;
    background-color: #f9f9f9;
    max-height: 200px; /* Limit the height of the container */
    overflow-y: auto;  /* Enable scrolling if content overflows */
    height: 100px;      /* Adjust height based on the content */
}

.search-item {
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ddd;
    background-color: #fff;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.search-item:hover {
    background-color: #f0f0f0;
}

.no-results {
    text-align: center;
    font-style: italic;
    color: #777;
}
.single-line-ellipsis {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    }
</style>
@section('main-container')
    <div class="contents">
        <div class="container-fluid">
            {{-- form start --}}
            <!-- resources/views/cases.blade.php -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="project-progree-breadcrumb">
                            <div class="breadcrumb-main user-member justify-content-sm-between">
                                <div class="d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                                    <div class="d-flex align-items-center user-member__title justify-content-center me-sm-25">
                                        <h4 class="text-capitalize fw-500 breadcrumb-title">Cases</h4>
                                        <span class="sub-title ms-sm-25 ps-sm-25">{{ $totalcaese }} Total Cases</span>
                                    </div>
                                </div>
                                <div class="action-btn">
                                    <a href="#" class="btn px-15 btn-primary" data-bs-toggle="modal" data-bs-target="#new-member">
                                        <i class="las la-plus fs-16"></i> Create Cases
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Include the modal partial -->
                @include('partials.create-case-modal', ['statuses' => $statuses])

            {{-- form end --}}



            <div class="row">
                <div class="col-lg-12">
                    <div class="project-top-wrapper project-top-progress d-flex justify-content-between flex-wrap">
                        <div
                            class="project-top-left d-flex flex-wrap justify-content-lg-between justify-content-center mt-n10">
                            <div class="project-tap global-shadow order-lg-1 order-2 my-10">
                                <ul class="nav px-1" id="ap-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="ap-overview-tab" data-bs-toggle="pill"
                                            href="#ap-overview" role="tab" aria-selected="true">All Cases</a>
                                    </li>
                                    @foreach ($statuses as $status)
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           id="{{ strtolower(str_replace(' ', '', $status['status_name'])) }}-tab"
                                           data-bs-toggle="pill"
                                           href="#{{ strtolower(str_replace(' ', '', $status['status_name'])) }}"
                                           role="tab"
                                           aria-selected="false">
                                            {{ $status['status_name'] }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="project-search project-search--height global-shadow ms-md-20 my-10 order-md-2 order-1">
                                <form action="/" method="GET" class="d-flex align-items-center user-member__form">
                                    <img src="{{ asset('img/svg/search.svg') }}" alt="search" class="svg">
                                    <input id="searchInput" class="form-control me-sm-2 border-0 box-shadow-none" type="search" placeholder="Search by Name" aria-label="Search">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="projects-tab-content projects-tab-content--progress">
                <div class="tab-content mt-25" id="ap-tabContent">
                    <!-- All Cases Tab -->
                    <div class="tab-pane fade show active" id="ap-overview" role="tabpanel" aria-labelledby="ap-overview-tab">
                        <div class="row">
                            @foreach($cases as $case)
                                <div class="col-xl-3 mb-25 col-md-3 case-item" data-id="{{ $case->id }}" data-name="{{ $case->subject }}" data-case_no="{{ $case->case_no }}" data-status_name="{{ $case->status->status_name }}">
                                    <div class="user-group radius-xl media-ui media-ui--early pt-30 pb-25">
                                        <div class="border-bottom px-20">
                                            <div class="media user-group-media d-flex justify-content-between">
                                                <div class="media-body d-flex align-items-start flex-column text-capitalize my-sm-0 my-n2 mb-3">
                                                    <a href="{{ route('case.view', ['id' => $case->id]) }}">
                                                        <h6 class="mt-0 fw-500 user-group media-ui__title bg-transparent">
                                                            {{ $case->subject }}
                                                        </h6>
                                                    </a>
                                                    <span class="my-sm-0 my-2 media-badge text-uppercase color-white" style="background-color: {{ $case->status->status_color_code }}">
                                                        {{ $case->status->status_name }}
                                                    </span>
                                                </div>
                                                <div class="mt-n15">
                                                    <div class="dropdown dropleft">
                                                        <button class="btn-link border-0 bg-transparent p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <img src="{{ asset('img/svg/more-horizontal.svg') }}" alt="more-horizontal" class="svg">
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            {{-- <a class="dropdown-item" href="{{ route('case.view', ['id' => $case->id]) }}">View</a> --}}
                                                            <a class="dropdown-item" id="delete" href="{{ route('case.delete', $case->id) }}">Delete</a>
                                                            {{-- <a class="dropdown-item" href="#">Edit</a> --}}
                                                            {{-- <a class="dropdown-item" href="#">Leave</a>
                                                            <a class="dropdown-item" href="#">Delete</a> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="user-group-people mt-15 text-capitalize">
                                                <p class="single-line-ellipsis">{{$case->description }}</p>
                                                <div class="user-group-project">
                                                    <div class="d-flex align-items-center justify-content-between user-group-progress-top">
                                                        <div class="media-ui__start">
                                                            <span class="color-light fs-12">Created Date</span>
                                                            <p class="fs-14 fw-500 color-dark mb-0">{{ $case->created_at->format('d M Y') }}</p>
                                                        </div>
                                                        <div class="media-ui__start text-end">
                                                            <span class="color-light fs-12">Case #</span>
                                                            <p class="fs-14 fw-500 color-dark mb-0">{{ $case->case_no }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="user-group-progress-bar">
                                                @php
                                                    // Determine the color for the current status
                                                    $progressColor = $case->status->status_color_code ?? 'bg-default'; // Default class if no match

                                                    // Calculate progress percentage
                                                    $completedTasks = $case->status->id; // Example: Use status ID or logic to determine completion level
                                                    $totalTasks = $totalRows;           // Example: Total tasks or steps
                                                    $progressPercentage = ($completedTasks / $totalTasks) * 100;
                                                @endphp

                                                <div class="progress-wrap d-flex align-items-center mb-0">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: {{ $progressPercentage }}%; background-color: {{ $progressColor }} !important;"
                                                            aria-valuenow="{{ $progressPercentage }}" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <span class="progress-percentage">{{ number_format($progressPercentage, 2) }}%</span>
                                                </div>
                                                <p class="color-light fs-12 mb-20">{{ $completedTasks }} / {{ $totalTasks }} tasks completed</p>
                                            </div>
                                        </div>
                                        <div class="mt-20 px-30">
                                            <div class="d-flex justify-content-between">
                                                {{-- <p class="fs-13 color-light mb-10">Assigned To</p> --}}
                                                <div class="dropdown dropdown-hover">
                                                    <a class="btn-link">Assigned To</a>
                                                    <div class="dropdown-default">
                                                        @foreach($case->room_participants as $participant)
                                                        {{-- {{ dd($participant) }} --}}

                                                                <a class="dropdown-item">{{ $participant->user->name }}</a>

                                                        @endforeach

                                                    </div>
                                                    </div>

                                                @php
                                                    $created_name = App\Models\User::where('id', $case->owner_id)->value('name');
                                                @endphp
                                                <p class="fs-13 color-light mb-10">Created By: <span class="user">{{ $created_name }}</span></p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Status-Specific Tabs -->
                    @foreach ($statuses as $status)
                    <div class="tab-pane fade" id="{{ strtolower(str_replace(' ', '', $status->status_name)) }}" role="tabpanel" aria-labelledby="{{ strtolower(str_replace(' ', '', $status->status_name)) }}-tab">
                            <div class="row">
                                @forelse($cases->where('status_id', $status->id) as $case)
                                    <div class="col-xl-3 mb-25 col-md-3">
                                        <div class="user-group radius-xl media-ui media-ui--early pt-30 pb-25">
                                            <!-- Same Card Structure as Above -->
                                            <div class="border-bottom px-30">
                                                <div class="media user-group-media d-flex justify-content-between">
                                                    <div class="media-body d-flex align-items-start flex-column text-capitalize my-sm-0 my-n2 mb-3">
                                                        <a href="{{ route('case.view', ['id' => $case->id]) }}">
                                                            <h6 class="mt-0 fw-500 user-group media-ui__title bg-transparent">
                                                                {{ $case->subject }}
                                                            </h6>
                                                        </a>
                                                        <span class="my-sm-0 my-2 media-badge text-uppercase color-white" style="background-color: {{ $case->status->status_color_code }}">
                                                            {{ $case->status->status_name }}
                                                        </span>
                                                    </div>
                                                    <div class="mt-n15">
                                                        <div class="dropdown dropleft">
                                                            <button class="btn-link border-0 bg-transparent p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <img src="{{ asset('img/svg/more-horizontal.svg') }}" alt="more-horizontal" class="svg">
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                {{-- <a class="dropdown-item" href="{{ route('case.view', ['id' => $case->id]) }}">View</a> --}}
                                                                <a class="dropdown-item" id="delete" href="{{ route('case.delete', $case->id) }}">Delete</a>
                                                                {{-- <a class="dropdown-item" href="#">Leave</a> --}}
                                                                {{-- <a class="dropdown-item" href="#">Delete</a> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="user-group-people mt-15 text-capitalize">
                                                    <p class="single-line-ellipsis">{{ $case->description }}...</p>
                                                    <div class="user-group-project">
                                                        <div class="d-flex align-items-center justify-content-between user-group-progress-top">
                                                            <div class="media-ui__start">
                                                                <span class="color-light fs-12">Created Date</span>
                                                                <p class="fs-14 fw-500 color-dark mb-0">{{ $case->created_at->format('d M Y') }}</p>
                                                            </div>
                                                            <div class="media-ui__start text-end">
                                                                <span class="color-light fs-12">Case #</span>
                                                                <p class="fs-14 fw-500 color-dark mb-0">{{ $case->case_no }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="user-group-progress-bar">
                                                    @php
                                                        // Determine the color for the current status
                                                        $progressColor = $case->status->status_color_code ?? 'bg-default'; // Default class if no match

                                                        // Calculate progress percentage
                                                        $completedTasks = $case->status->id; // Example: Use status ID or logic to determine completion level
                                                                // Example: Total tasks or steps
                                                        $progressPercentage = ($completedTasks / $totalRows) * 100;
                                                    @endphp

                                                    <div class="progress-wrap d-flex align-items-center mb-0">
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: {{ $progressPercentage }}%; background-color: {{ $progressColor }} !important;"
                                                                aria-valuenow="{{ $progressPercentage }}" aria-valuemin="0" aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                        <span class="progress-percentage">{{ number_format($progressPercentage, 2) }}%</span>
                                                    </div>
                                                    <p class="color-light fs-12 mb-20">{{ $completedTasks }} / {{ $totalRows }} tasks completed</p>
                                                </div>
                                            </div>
                                            <div class="mt-20 px-30">
                                                <div class="d-flex justify-content-between">
                                                    <p class="fs-13 color-light mb-10">Assigned To</p>
                                                    @php
                                                        $created_name = App\Models\User::where('id', $case->owner_id)->value('name');
                                                    @endphp
                                                    <p class="fs-13 color-light mb-10">Created By: <span class="user">{{ $created_name }}</span></p>
                                                </div>
                                                <ul class="d-flex flex-wrap user-group-people__parent">
                                                    @foreach($case->room_participants as $participant)
                                                        <li>
                                                            <span class="user">{{ $participant->user->name }}</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-center text-muted">No cases found for this status.</p>
                                @endforelse
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>



        </div>
    </div>
    <script>
        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function () {
            let searchQuery = this.value.toLowerCase().trim(); // Get search input and convert to lowercase
            let cases = document.querySelectorAll('.case-item'); // Select all case items

            cases.forEach(function (caseItem) {
                // Extract all data attributes
                let caseName = caseItem.getAttribute('data-name').toLowerCase();
                let caseNo = caseItem.getAttribute('data-case_no').toLowerCase();
                let statusName = caseItem.getAttribute('data-status_name').toLowerCase();

                // Check if search query matches any attribute
                if (
                    caseName.includes(searchQuery) ||
                    caseNo.includes(searchQuery) ||
                    statusName.includes(searchQuery)
                ) {
                    caseItem.style.display = 'block'; // Show matching case
                } else {
                    caseItem.style.display = 'none'; // Hide non-matching case
                }
            });
        });
    </script>




    @endsection
