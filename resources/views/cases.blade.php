@extends('layouts.main')

<style>
#search-results {
    border: 1px solid #ddd;
    padding: 5px;
    background-color: #f9f9f9;
    max-height: 200px; /* Limit the height of the container */
    overflow-y: auto;  /* Enable scrolling if content overflows */
    height: 100px;      /* Adjust height based on the content */
}

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
</style>
@section('main-container')
    <div class="contents">
        <div class="container-fluid">
            {{-- form start --}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="project-progree-breadcrumb">
                        <div class="breadcrumb-main user-member justify-content-sm-between ">
                            <div class=" d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                                <div class="d-flex align-items-center user-member__title justify-content-center me-sm-25">
                                    <h4 class="text-capitalize fw-500 breadcrumb-title">Cases</h4>
                                    <span class="sub-title ms-sm-25 ps-sm-25">12 Running Cases</span>
                                </div>
                            </div>
                            <div class="action-btn">
                                <a href="#" class="btn px-15 btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#new-member">
                                    <i class="las la-plus fs-16"></i>create Cases</a>

                                <div class="modal fade new-member " id="new-member" role="dialog" tabindex="-1"
                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content  radius-xl">
                                            <div class="modal-header">
                                                <h6 class="modal-title fw-500" id="staticBackdropLabel">Create project</h6>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <img src="img/svg/x.svg" alt="x" class="svg">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="new-member-modal">

                                                    <form action="{{ route('case.store') }}" method="POST">
                                                        @csrf
                                                        <div class="row d-flex align-items-center">
                                                            <h6 class="form-group fw-500 mt-1" style="background: lightgrey;">Case Information</h6>

                                                            <div class="form-group col-md-6 mb-20">
                                                                <div class="category-member">
                                                                    <label for="">Case Status</label>
                                                                    <select name="case_status" class="form-select form-control" aria-label="Default select example" required>
                                                                        <option selected disabled>Select Status</option>
                                                                       {{-- {{dd($statuses)}} --}}
                                                                        @foreach ($statuses as $item)

                                                                            <option value="{{ $item->id }}">{{ $item->status_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-6 mb-20">
                                                                <div class="category-member">
                                                                    <label for="">Case Origin</label>
                                                                    <select name="case_origin" class="form-select form-control" aria-label="Default select example" required>
                                                                        <option selected>Select Origin</option>
                                                                        <option value="Email">Email</option>
                                                                        <option value="Contact">Contact</option>
                                                                        <option value="Reference">Reference</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-6 mb-20">
                                                                <div class="category-member">
                                                                    <label for="">Priority</label>
                                                                    <select name="priority" class="form-select form-control" aria-label="Default select example" required>
                                                                        <option selected>Select Priority</option>
                                                                        <option value="High">High</option>
                                                                        <option value="Medium">Medium</option>
                                                                        <option value="Low">Low</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-6 mb-20">
                                                                <label for="">Case Owner</label>
                                                                <input type="text" name="case_owner" class="form-control" value="{{ $case_owner }}" placeholder="Case Creator" required>
                                                            </div>

                                                            <div class="form-group col-md-6 mb-20">
                                                                <label for="">Case No</label>
                                                                <input type="text" name="case_no" class="form-control" value="{{ $randomNumber }}" placeholder="" required>
                                                            </div>

                                                            <h6 class="form-group fw-500 mt-1" style="background: lightgrey;">Contact Information</h6>

                                                            <div class="form-group col-md-6 mb-10">
                                                                <label for="name47">Select User</label>
                                                                <input type="text" name="account_name" class="form-control" id="name47" placeholder="Search members" onkeyup="searchMembers(this.value)" required>
                                                                <div id="search-results" class="form-control" style="display: none; max-height: 200px; overflow-y: auto;"></div>
                                                            </div>

                                                            <div class="form-group col-md-6 mb-20">
                                                                <label for="">Account Name</label>
                                                                <input type="text" name="account_name" class="form-control" value="METRO TEXTILE INC" placeholder="METRO TEXTILE INC" required>
                                                            </div>

                                                            <h6 class="fw-500 mt-1 mb-10" style="background: lightgrey;">Subject Information</h6>

                                                            <div class="form-group col-md-12">
                                                                <label for="">Subject</label>
                                                                <input type="text" name="subject" class="form-control" value="" placeholder="Enter Subject" required>
                                                            </div>

                                                            <div class="form-group col-md-12 mb-20">
                                                                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description" required></textarea>
                                                            </div>

                                                            <div class="mb-3">
                                                                <div class="checkbox-theme-default custom-checkbox ">
                                                                    <input class="checkbox" type="checkbox" id="check-un1">
                                                                    <label for="check-un1"><span class="checkbox-text">Checked</span></label>
                                                                </div>
                                                            </div>

                                                            <div class="button-group d-flex pt-25">
                                                                <button class="btn btn-primary btn-default btn-squared text-capitalize">Add New Case</button>
                                                                <button type="button" class="btn btn-light btn-default btn-squared fw-400 text-capitalize b-light color-light" data-bs-dismiss="modal">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

                        </div>
                        {{-- <div class="project-top-right d-flex flex-wrap">
                            <div class="project-category">
                                <div class="d-flex align-items-center">
                                    <p class="mb-0 me-10 fs-14 color-light">sort by:</p>
                                    <div class="project-category__select">
                                        <select class="js-example-basic-single js-states form-control"
                                            id="event-category">
                                            <option value="all" selected>Status</option>
                                            <option value="JAN">event</option>
                                            <option value="FBR">Venues</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="project-search project-search--height global-shadow ms-md-20 my-10 order-md-2 order-1">
                                <form action="/" class="d-flex align-items-center user-member__form">
                                    <img src="img/svg/search.svg" alt="search" class="svg">
                                    <input class="form-control me-sm-2 border-0 box-shadow-none" type="search"
                                        placeholder="Search by Name" aria-label="Search">
                                </form>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="projects-tab-content projects-tab-content--progress">
                <div class="tab-content mt-25" id="ap-tabContent">
                    <!-- All Cases Tab -->
                    <div class="tab-pane fade show active" id="ap-overview" role="tabpanel" aria-labelledby="ap-overview-tab">
                        <div class="row">
                            @foreach($cases as $case)
                                <div class="col-xl-4 mb-25 col-md-6">
                                    <div class="user-group radius-xl media-ui media-ui--early pt-30 pb-25">
                                        <div class="border-bottom px-30">
                                            <div class="media user-group-media d-flex justify-content-between">
                                                <div class="media-body d-flex align-items-center flex-wrap text-capitalize my-sm-0 my-n2">
                                                    <a href="{{ route('case.view', ['id' => $case->id]) }}">
                                                        <h6 class="mt-0 fw-500 user-group media-ui__title bg-transparent">
                                                            {{ $case->subject }}
                                                        </h6>
                                                    </a>
                                                    <span class="my-sm-0 my-2 media-badge text-uppercase color-white bg-primary">{{ $case->status->status_name }}</span>
                                                </div>
                                                <div class="mt-n15">
                                                    <div class="dropdown dropleft">
                                                        <button class="btn-link border-0 bg-transparent p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <img src="{{ asset('img/svg/more-horizontal.svg') }}" alt="more-horizontal" class="svg">
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="{{ route('case.view', ['id' => $case->id]) }}">View</a>
                                                            <a class="dropdown-item" href="#">Edit</a>
                                                            <a class="dropdown-item" href="#">Leave</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="user-group-people mt-15 text-capitalize">
                                                <p>{{ $case->description }}</p>
                                                <div class="user-group-project">
                                                    <div class="d-flex align-items-center user-group-progress-top">
                                                        <div class="media-ui__start">
                                                            <span class="color-light fs-12">Created Date</span>
                                                            <p class="fs-14 fw-500 color-dark mb-0">{{ $case->created_at->format('d M Y') }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="user-group-progress-bar">
                                                <div class="progress-wrap d-flex align-items-center mb-0">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 83%;" aria-valuenow="83" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <span class="progress-percentage">83%</span>
                                                </div>
                                                <p class="color-light fs-12 mb-20">12 / 15 tasks completed</p>
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
                            @endforeach
                        </div>
                    </div>

                    <!-- Status-Specific Tabs -->
                    @foreach ($statuses as $status)
                    <div class="tab-pane fade" id="{{ strtolower(str_replace(' ', '', $status->status_name)) }}" role="tabpanel" aria-labelledby="{{ strtolower(str_replace(' ', '', $status->status_name)) }}-tab">
                            <div class="row">
                                @forelse($cases->where('status_id', $status->id) as $case)
                                    <div class="col-xl-4 mb-25 col-md-6">
                                        <div class="user-group radius-xl media-ui media-ui--early pt-30 pb-25">
                                            <!-- Same Card Structure as Above -->
                                            <div class="border-bottom px-30">
                                                <div class="media user-group-media d-flex justify-content-between">
                                                    <div class="media-body d-flex align-items-center flex-wrap text-capitalize my-sm-0 my-n2">
                                                        <a href="{{ route('case.view', ['id' => $case->id]) }}">
                                                            <h6 class="mt-0 fw-500 user-group media-ui__title bg-transparent">
                                                                {{ $case->subject }}
                                                            </h6>
                                                        </a>
                                                        <span class="my-sm-0 my-2 media-badge text-uppercase color-white bg-primary">{{ $case->status->status_name }}</span>
                                                    </div>
                                                    <div class="mt-n15">
                                                        <div class="dropdown dropleft">
                                                            <button class="btn-link border-0 bg-transparent p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <img src="{{ asset('img/svg/more-horizontal.svg') }}" alt="more-horizontal" class="svg">
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="{{ route('case.view', ['id' => $case->id]) }}">View</a>
                                                                <a class="dropdown-item" href="#">Edit</a>
                                                                <a class="dropdown-item" href="#">Leave</a>
                                                                <a class="dropdown-item" href="#">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="user-group-people mt-15 text-capitalize">
                                                    <p>{{ $case->description }}</p>
                                                    <div class="user-group-project">
                                                        <div class="d-flex align-items-center user-group-progress-top">
                                                            <div class="media-ui__start">
                                                                <span class="color-light fs-12">Created Date</span>
                                                                <p class="fs-14 fw-500 color-dark mb-0">{{ $case->created_at->format('d M Y') }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="user-group-progress-bar">
                                                    <div class="progress-wrap d-flex align-items-center mb-0">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 83%;" aria-valuenow="83" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span class="progress-percentage">83%</span>
                                                    </div>
                                                    <p class="color-light fs-12 mb-20">12 / 15 tasks completed</p>
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
@endsection




