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
                                    <img src="{{asset('img/svg/minus.svg')}}" alt="minus" class="svg"> Backward
                                </button>
                            </div>
                        </form>

                        <!-- Forward Status Button -->
                        <form action="{{ route('case.forward', $case->id) }}" method="POST">
                            @csrf
                            <div class="action-btn me-10 my-sm-0">
                                <button type="submit" class="btn btn-primary bg-primary fs-12 fw-500">
                                    <img src="{{asset('img/svg/plus.svg')}}" alt="plus" class="svg"> Forward
                                </button>
                            </div>
                        </form>

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
                                <button type="submit" class="breadcrumb-remove border-0 color-danger content-center bg-white fs-12 fw-500 ms-10 radius-md">
                                    <img class="svg" src="{{asset('img/svg/trash-2.svg')}}" alt="trash-2">remove
                                </button>
                            </form>
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
                                    <img class="svg wh-25 text-secondary" src="{{asset('img/svg/at.svg')}}" alt="img">
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
                                    <img class="svg wh-25 text-primary" src="{{asset('img/svg/at2.svg')}}" alt="img">
                                </div> --}}
                                <div class="application-task-content">
                                    <h4>Start Date</h4>
                                    <span class="text-light fs-14 mt-1 text-capitalize">{{ $case->created_at->format('d M Y') }}</span>
                                </div>
                            </div>
                            {{-- <div class="application-task d-flex align-items-center mb-25">
                                <div class="application-task-icon wh-60 bg-opacity-success content-center">
                                    <img class="svg wh-25 text-success" src="{{asset('img/svg/at4.svg')}}" alt="img">
                                </div>
                                <div class="application-task-content">
                                    <h4>$27,500</h4>
                                    <span class="text-light fs-14 mt-1 text-capitalize">Spendings</span>
                                </div>
                            </div> --}}
                            {{-- <div class="application-task d-flex align-items-center">
                                <div class="application-task-icon wh-60 bg-opacity-warning content-center">
                                    <img class="svg wh-25 text-warning" src="{{asset('img/svg/at3.svg')}}" alt="img">
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
                            <div class="case-files">
                                @php $limit = 4; @endphp
                                @foreach($caseFiles as $index => $file)
                                    @if($index < $limit)
                                        <div class="mb-20">
                                            <div class="files-area d-flex justify-content-between align-items-center">
                                                <div class="files-area__left d-flex align-items-center">
                                                    <div class="files-area__img">
                                                        @php
                                                            $fileExtension = pathinfo($file->filename, PATHINFO_EXTENSION);
                                                        @endphp

                                                        <!-- Dynamic content based on file type -->
                                                        @if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                                            <span class="fs-12 fw-500 color-primary">{{ pathinfo($file->filename, PATHINFO_BASENAME) }}</span>
                                                        @elseif($fileExtension === 'pdf')
                                                            <a href="{{ asset($file->filename) }}" class="fs-12 fw-500 color-primary" target="_blank">View PDF</a>
                                                        @else
                                                            <span class="fs-12 fw-500 color-primary">{{ pathinfo($file->filename, PATHINFO_BASENAME) }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="files-area__title">
                                                        <div class="d-flex text-capitalize">
                                                            <a href="{{ asset($file->file_path) }}" class="fs-12 fw-500 color-primary" download>Download</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                                @if(count($caseFiles) > $limit)
                                    <div class="see-all-btn mt-3 text-end">
                                        <button class="btn btn-primary btn-default btn-squared drawer-trigger" id="seeAllFilesBtn">
                                            See All Files
                                        </button>
                                    </div>
                                @endif
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

                <!-- Drawer -->
<div class="drawer-basic-wrap">
    <div class="dm-drawer drawer-basic d-none" id="fileDrawer">
        <div class="dm-drawer__header d-flex justify-content-between align-items-center">
            <h6 class="drawer-title">All Case Files</h6>
            <button class="btn-close" id="closeDrawerBtn"></button>
        </div>
        <div class="dm-drawer__body">
            <div class="drawer-content" id="drawerContent">
                @foreach($caseFiles as $file)
                    <div class="mb-20">
                        <div class="files-area d-flex justify-content-between align-items-center">
                            <div class="files-area__left d-flex align-items-center">
                                <div class="files-area__img">
                                    @php
                                        $fileExtension = pathinfo($file->filename, PATHINFO_EXTENSION);
                                    @endphp

                                    <!-- Dynamic content based on file type -->
                                    @if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                        <span class="fs-12 fw-500 color-primary">{{ pathinfo($file->filename, PATHINFO_BASENAME) }}</span>
                                    @elseif($fileExtension === 'pdf')
                                        <a href="{{ asset($file->filename) }}" class="fs-12 fw-500 color-primary" target="_blank">View PDF</a>
                                    @else
                                        <span class="fs-12 fw-500 color-primary">{{ pathinfo($file->filename, PATHINFO_BASENAME) }}</span>
                                    @endif
                                </div>
                                <div class="files-area__title">
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


                <div class="chat-area d-flex mb-40 mt-3">
                    <div class="mb-lg-0 mb-40 chat-sidebar">
                        <div class="sidebar-group left-sidebar chat_sidebar">
                            <div id="chat" class="left-sidebar-wrap radius-xl active">
                                <div class="chat-wrapper py-25">
                                    <div class="search-header">
                                        <form action="/" class="d-flex align-items-center">
                                            <img src="img/svg/search.svg" alt="search" class="svg">
                                            <input class="form-control me-sm-2 border-0 box-shadow-none" type="search"
                                                placeholder="Search" aria-label="Search">
                                        </form>
                                    </div>
                                    <div class="search-tab">
                                        <ul class="nav ap-tab-main border-bottom text-capitalize" id="ueberTab"
                                            role="tablist">
                                            <li class="nav-item me-0">
                                                <a class="nav-link active" id="first-tab" data-bs-target="#panel_b_first"
                                                    data-secondary="#panel_a_first" data-bs-toggle="tab" href="#first"
                                                    role="tab" aria-selected="true">private
                                                    chat</a>
                                            </li>
                                            <li class="nav-item me-0">
                                                <a class="nav-link group-notification" id="second-tab"
                                                    data-bs-target="#panel_b_second" data-secondary="#panel_a_second"
                                                    data-bs-toggle="tab" href="#second" role="tab" aria-selected="false">
                                                    group chat
                                                    <span class="total-message ms-1">
                                                        <span class="badge badge-danger ">5</span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nav-item me-0">
                                                <a class="nav-link" id="third-tab" data-bs-target="#panel_b_thrid"
                                                    data-secondary="#panel_a_third" data-bs-toggle="tab" href="#third"
                                                    role="tab" aria-selected="false">all
                                                    contact</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="search-body">
                                        <div class="tab-content" id="ueberTabA">
                                            <div class="tab-pane fade show active" id="panel_a_first" role="tabpanel"
                                                aria-labelledby="first-tab">
                                                <ul class="user-list">
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse1.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet fdsfdsf sdf dsf dsf dsf dsf dsf
                                                                                d</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                    <div
                                                                        class="total-message mt-1 d-flex justify-content-end">
                                                                        <span class="badge badge-success ">5</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse2.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-offline"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Shreyu Neu</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse3.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Domnic Harris</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                    <div
                                                                        class="total-message mt-1 d-flex justify-content-end">
                                                                        <span class="badge badge-success ">15</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse4.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-offline"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Khalid Hasan</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse5.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Tuhin Molla</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse6.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Billal Hossain</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse7.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Ibn Adam</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse8.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-offline"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Tanim</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse9.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Tabib Rahman</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse2.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Shreyu Neu</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse1.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse3.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-offline"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Domnic Harris</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse4.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Khalid Hasan</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse1.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse6.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-offline"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Billal Hossain</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane fade" id="panel_a_second" role="tabpanel"
                                                aria-labelledby="second-tab">
                                                <ul class="user-list">
                                                    <li>
                                                        <div class="user-button-top">
                                                            <button type="button"
                                                                class="border bg-normal color-gray rounded-pill content-center"><img
                                                                    class="svg" src="img/svg/edit.svg" alt="edit">create a
                                                                new group</button>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse1.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                    <div
                                                                        class="total-message mt-1 d-flex justify-content-end">
                                                                        <span class="badge badge-success ">2</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse2.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-offline"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse3.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                    <div
                                                                        class="total-message mt-1 d-flex justify-content-end">
                                                                        <span class="badge badge-success ">12</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse4.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-offline"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse5.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse6.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse7.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse8.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse9.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse10.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-offline"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse11.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse12.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse13.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse2.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-offline"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse15.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane fade" id="panel_a_third" role="tabpanel"
                                                aria-labelledby="third-tab">
                                                <ul class="user-list">
                                                    <li>
                                                        <div class="user-button-top">
                                                            <button type="button"
                                                                class="border bg-normal color-gray rounded-pill content-center"><img
                                                                    class="svg" src="img/svg/user-plus.svg"
                                                                    alt="user-plus">Add New Contact</button>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse1.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                    <div
                                                                        class="total-message mt-1 d-flex justify-content-end">
                                                                        <span class="badge badge-success ">4</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse2.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-offline"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse3.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                    <div
                                                                        class="total-message mt-1 d-flex justify-content-end">
                                                                        <span class="badge badge-success ">24</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse4.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-offline"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse5.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse6.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-offlien"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse7.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse8.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                    <div
                                                                        class="total-message mt-1 d-flex justify-content-end">
                                                                        <span class="badge badge-success ">3</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse9.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-offline"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse10.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse11.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse12.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse13.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-offline"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                    <div
                                                                        class="total-message mt-1 d-flex justify-content-end">
                                                                        <span class="badge badge-success ">3</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse2.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="user-list-item">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="img/ellipse15.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6>Meyri Carles</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="ueberTabB">
                        <div class="tab-pane fade  show active" id="panel_b_first" role="tabpanel"
                            aria-labelledby="first-tab">
                            <div class="chat">
                                <div class="chat-body bg-white radius-xl">
                                    <div class="chat-header">
                                        <div class="media chat-name align-items-center">
                                            <div class="media-body align-self-center ">
                                                <h5 class=" mb-0 fw-500 mb-2">Domnic Harys</h5>
                                                <div class="media-body__content d-flex align-items-center">
                                                    <span class="badge-dot dot-success me-1"></span>
                                                    <small class="d-flex color-light fs-12 text-capitalize">
                                                        active now
                                                    </small>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="nav flex-nowrap">
                                            <li class="nav-item list-inline-item me-0">
                                                <div class="dropdown">
                                                    <a href="#" role="button" title="Details" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <img class="svg" src="img/svg/more-vertical.svg"
                                                            alt="more-vertical">
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item align-items-center d-flex" href="#"
                                                            data-chat-info-toggle>

                                                            <img class="svg" src="img/svg/users.svg" alt="users">
                                                            <span>Create new group</span>
                                                        </a>
                                                        <a class="dropdown-item align-items-center d-flex" href="#">

                                                            <img class="svg" src="img/svg/trash-2.svg" alt>
                                                            <span>Delete conversation</span>
                                                        </a>
                                                        <a class="dropdown-item align-items-center d-flex" href="#">

                                                            <img class="svg" src="img/svg/x-octagon.svg" alt="x-octagon">
                                                            <span>Block & report</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="chat-box chat-box--big p-xl-30 ps-lg-20 pe-lg-0">

                                        <div class="flex-1 incoming-chat">
                                            <div class="chat-text-box ">
                                                <div class="media d-flex">
                                                    <div class="chat-text-box__photo ">
                                                        <img src="img/author/1.jpg" class="align-self-start me-15 wh-46"
                                                            alt="img">
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="chat-text-box__content">
                                                            <div class="chat-text-box__title d-flex align-items-center">
                                                                <h6 class="fs-14">Domnic Harys</h6>
                                                                <span
                                                                    class="chat-text-box__time fs-12 color-light fw-400 ms-15">8:30
                                                                    PM</span>
                                                            </div>
                                                            <div class="d-flex align-items-center mb-20 mt-10">
                                                                <div class="chat-text-box__subtitle p-20 bg-primary">
                                                                    <p class="color-white">Jam nonumy eirmod tempor invidunt
                                                                        ut
                                                                        labore
                                                                        et dolore magna aliquyam erat consetetur sadipscing
                                                                        elitr
                                                                        sed
                                                                        diam nonumy eirmod tempor invidunt ut labore et
                                                                        dolore magna
                                                                        aliquyam erat sed diam voluptua..</p>
                                                                </div>
                                                                <div class="chat-text-box__other d-flex">
                                                                    <div class="chat-text-box__reaction px-sm-15 px-2">
                                                                        <div class="emotions">
                                                                            <div class="dropdown  dropdown-click ">
                                                                                <button
                                                                                    class="btn-link border-0 bg-transparent p-0"
                                                                                    data-bs-toggle="dropdown"
                                                                                    aria-haspopup="true"
                                                                                    aria-expanded="false">
                                                                                    <img class="svg" src="img/svg/smile.svg"
                                                                                        alt="smile"> </button>
                                                                                <div
                                                                                    class="dropdown-default dropdown-bottomLeft dropdown-menu-left dropdown-menu">
                                                                                    <ul class="emotions__parent d-flex">
                                                                                        <li>
                                                                                            <a class href="#">
                                                                                                <img src="img/svg/cool.png"
                                                                                                    alt="emotions">
                                                                                            </a>
                                                                                        </li>
                                                                                        <li><a class href="#">
                                                                                                <img src="img/svg/happy2.png"
                                                                                                    alt="emotions">
                                                                                            </a></li>
                                                                                        <li><a class href="#">
                                                                                                <img src="img/svg/happy.png"
                                                                                                    alt="emotions">
                                                                                            </a></li>
                                                                                        <li><a class href="#">
                                                                                                <img src="img/svg/shocked.png"
                                                                                                    alt="emotions">
                                                                                            </a></li>
                                                                                        <li><a class href="#">
                                                                                                <img src="img/svg/like.png"
                                                                                                    alt="emotions">
                                                                                            </a></li>
                                                                                        <li><a class href="#">
                                                                                                <img src="img/svg/heart.png"
                                                                                                    alt="emotions">
                                                                                            </a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="dropdown dropdown-click">
                                                                        <button class="btn-link border-0 bg-transparent p-0"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false">
                                                                            <img src="img/svg/more-horizontal.svg"
                                                                                alt="more-horizontal" class="svg">
                                                                        </button>
                                                                        <div class="dropdown-default dropdown-bottomLeft dropdown-menu-left dropdown-menu"
                                                                            style>
                                                                            <a class="dropdown-item" href="#">Copy</a>
                                                                            <a class="dropdown-item" href="#">Quote</a>
                                                                            <a class="dropdown-item" href="#">Forward</a>
                                                                            <a class="dropdown-item" href="#">Report</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <p class="social-connector text-center text-capitalize">
                                            <span>today</span>
                                        </p>

                                        <div class="flex-1 justify-content-end d-flex outgoing-chat mt-20">
                                            <div class="chat-text-box">
                                                <div class="media ">
                                                    <div class="media-body">
                                                        <div class="chat-text-box__content">
                                                            <div
                                                                class="chat-text-box__title d-flex align-items-center justify-content-end mb-2">
                                                                <span
                                                                    class="chat-text-box__time fs-12 color-light fw-400">8:30
                                                                    PM</span>
                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-end">
                                                                <div class="chat-text-box__other d-flex">
                                                                    <div class="px-15">
                                                                        <div class="dropdown dropdown-click">
                                                                            <button
                                                                                class="btn-link border-0 bg-transparent p-0"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-haspopup="true" aria-expanded="false">
                                                                                <img src="img/svg/more-horizontal.svg"
                                                                                    alt="more-horizontal" class="svg">
                                                                            </button>
                                                                            <div class="dropdown-default dropdown-bottomRight dropdown-menu-right dropdown-menu"
                                                                                style>
                                                                                <a class="dropdown-item" href="#">Copy</a>
                                                                                <a class="dropdown-item" href="#">Quote</a>
                                                                                <a class="dropdown-item"
                                                                                    href="#">Forward</a>
                                                                                <a class="dropdown-item" href="#">Report</a>
                                                                                <a class="dropdown-item" href="#">remove</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="chat-text-box__subtitle p-20 bg-deep">
                                                                    <p class="color-gray">Jam nonumy eirmod tempor invidunt
                                                                        ut
                                                                        labore
                                                                        et dolore magna aliquyam erat consetetur sadipscing
                                                                        elitr
                                                                        sed
                                                                        diam nonumy eirmod tempor invidunt ut labore et
                                                                        dolore magna
                                                                        aliquyam erat sed diam voluptua..</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-1 justify-content-end d-flex outgoing-chat">
                                            <div class="chat-text-box">
                                                <div class="media ">
                                                    <div class="media-body">
                                                        <div class="chat-text-box__content">
                                                            <div class="d-flex align-items-center justify-content-end">
                                                                <div class="chat-text-box__other d-flex">
                                                                    <div class="px-15">
                                                                        <div class="dropdown dropdown-click">
                                                                            <button
                                                                                class="btn-link border-0 bg-transparent p-0"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-haspopup="true" aria-expanded="false">
                                                                                <img src="img/svg/more-horizontal.svg"
                                                                                    alt="more-horizontal" class="svg">
                                                                            </button>
                                                                            <div class="dropdown-default dropdown-bottomRight dropdown-menu-right dropdown-menu"
                                                                                style>
                                                                                <a class="dropdown-item" href="#">Copy</a>
                                                                                <a class="dropdown-item" href="#">Quote</a>
                                                                                <a class="dropdown-item"
                                                                                    href="#">Forward</a>
                                                                                <a class="dropdown-item" href="#">Report</a>
                                                                                <a class="dropdown-item" href="#">remove</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="chat-text-box__subtitle p-20 bg-deep">
                                                                    <p class="color-gray">Jam nonumy eirmod tempor invidunt
                                                                        ut
                                                                        labore et
                                                                        dolore magna.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="flex-1 incoming-chat mt-30">
                                            <div class="chat-text-box">
                                                <div class="media d-flex">
                                                    <div class="chat-text-box__photo ">
                                                        <img src="img/author/1.jpg" class="align-self-start me-15 wh-46"
                                                            alt="img">
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="chat-text-box__content">
                                                            <div class="chat-text-box__title d-flex align-items-center">
                                                                <h6 class="fs-14">Domnic Harys</h6>
                                                                <span
                                                                    class="chat-text-box__time fs-12 color-light fw-400 ms-15">8:30
                                                                    PM</span>
                                                            </div>
                                                            <div class="d-flex align-items-center mb-20 mt-10">
                                                                <div class="chat-text-box__subtitle p-20 bg-primary">
                                                                    <p class="color-white">Jam nonumy eirmod tempor invidunt
                                                                        ut
                                                                        labore
                                                                        et dolore magna.</p>
                                                                </div>
                                                                <div class="chat-text-box__other d-flex">
                                                                    <div class="chat-text-box__reaction px-sm-15 px-2">
                                                                        <div class="emotions">
                                                                            <div class="dropdown  dropdown-click ">
                                                                                <button
                                                                                    class="btn-link border-0 bg-transparent p-0"
                                                                                    data-bs-toggle="dropdown"
                                                                                    aria-haspopup="true"
                                                                                    aria-expanded="false">
                                                                                    <img class="svg" src="img/svg/smile.svg"
                                                                                        alt="smile"> </button>
                                                                                <div
                                                                                    class="dropdown-default dropdown-bottomLeft dropdown-menu-left dropdown-menu">
                                                                                    <ul class="emotions__parent d-flex">
                                                                                        <li>
                                                                                            <a class href="#">
                                                                                                <img src="img/svg/cool.png"
                                                                                                    alt="emotions">
                                                                                            </a>
                                                                                        </li>
                                                                                        <li><a class href="#">
                                                                                                <img src="img/svg/happy2.png"
                                                                                                    alt="emotions">
                                                                                            </a></li>
                                                                                        <li><a class href="#">
                                                                                                <img src="img/svg/happy.png"
                                                                                                    alt="emotions">
                                                                                            </a></li>
                                                                                        <li><a class href="#">
                                                                                                <img src="img/svg/shocked.png"
                                                                                                    alt="emotions">
                                                                                            </a></li>
                                                                                        <li><a class href="#">
                                                                                                <img src="img/svg/like.png"
                                                                                                    alt="emotions">
                                                                                            </a></li>
                                                                                        <li><a class href="#">
                                                                                                <img src="img/svg/heart.png"
                                                                                                    alt="emotions">
                                                                                            </a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="dropdown dropdown-click">
                                                                        <button class="btn-link border-0 bg-transparent p-0"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false">
                                                                            <img src="img/svg/more-horizontal.svg"
                                                                                alt="more-horizontal" class="svg">
                                                                        </button>
                                                                        <div class="dropdown-default dropdown-bottomLeft dropdown-menu-left dropdown-menu"
                                                                            style>
                                                                            <a class="dropdown-item" href="#">Copy</a>
                                                                            <a class="dropdown-item" href="#">Quote</a>
                                                                            <a class="dropdown-item" href="#">Forward</a>
                                                                            <a class="dropdown-item" href="#">Report</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="flex-1 justify-content-end d-flex outgoing-chat">
                                            <div class="chat-text-box">
                                                <div class="media ">
                                                    <div class="media-body">
                                                        <div class="chat-text-box__content">
                                                            <div
                                                                class="chat-text-box__title d-flex align-items-center justify-content-end mb-2">
                                                                <span
                                                                    class="chat-text-box__time fs-12 color-light fw-400">8:30
                                                                    PM</span>
                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-end">
                                                                <div class="chat-text-box__other d-flex">
                                                                    <div class="px-15">
                                                                        <div class="dropdown dropdown-click">
                                                                            <button
                                                                                class="btn-link border-0 bg-transparent p-0"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-haspopup="true" aria-expanded="false">
                                                                                <img src="img/svg/more-horizontal.svg"
                                                                                    alt="more-horizontal" class="svg">
                                                                            </button>
                                                                            <div class="dropdown-default dropdown-bottomRight dropdown-menu-right dropdown-menu"
                                                                                style>
                                                                                <a class="dropdown-item" href="#">Copy</a>
                                                                                <a class="dropdown-item" href="#">Quote</a>
                                                                                <a class="dropdown-item"
                                                                                    href="#">Forward</a>
                                                                                <a class="dropdown-item" href="#">Report</a>
                                                                                <a class="dropdown-item" href="#">remove</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="chat-text-box__subtitle p-20 bg-deep">
                                                                    <p class="color-gray">Jam nonumy eirmod tempor invidunt
                                                                        ut
                                                                        labore et
                                                                        dolore magna.</p>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="seen-chat d-flex align-items-center  justify-content-end mb-2 mt-10">
                                                                <div
                                                                    class="chat-text-box__title d-flex align-items-center me-10 ">
                                                                    <span
                                                                        class="chat-text-box__time fs-12 color-light fw-400">Seen
                                                                        9:20
                                                                        PM</span>
                                                                </div>
                                                                <img src="img/author/1.jpg" alt="img"
                                                                    class="wh-20 rounded-circle">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="flex-1 incoming-chat mt-30">
                                            <div class="chat-text-box">
                                                <div class="media d-flex">
                                                    <div class="chat-text-box__photo ">
                                                        <img src="img/author/1.jpg" class="align-self-start me-15 wh-46"
                                                            alt="img">
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="chat-text-box__content">
                                                            <div class="d-flex align-items-center ">
                                                                <div class="chat-text-box__subtitle typing cbg-light pe-30">
                                                                    <p class="color-light text-capitalize">typing...</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="chat-footer px-xl-30 px-lg-20 pb-lg-30 pt-1">
                                        <div class="chat-type-text">
                                            <div class="pt-0 outline-0 pb-0 pe-0 ps-0 rounded-0 position-relative d-flex align-items-center"
                                                tabindex="-1">
                                                <div
                                                    class="d-flex justify-content-between align-items-center w-100 flex-wrap">
                                                    <div
                                                        class=" flex-1 d-flex align-items-center chat-type-text__write ms-0">
                                                        <a href="#">
                                                            <img class="svg" src="img/svg/smile.svg" alt="smile">
                                                        </a>
                                                        <input class="form-control border-0 bg-transparent box-shadow-none"
                                                            placeholder="Type your message...">
                                                    </div>
                                                    <div class="chat-type-text__btn">
                                                        <button type="button"
                                                            class="border-0 btn-deep color-light wh-50 p-10 rounded-circle">
                                                            <img class="svg" src="img/svg/image.svg" alt="image"></button>
                                                        <button type="button"
                                                            class="border-0 btn-deep color-light wh-50 p-10 rounded-circle">
                                                            <img class="svg" src="img/svg/paperclip.svg"
                                                                alt="paperclip"></button>
                                                        <button type="button"
                                                            class="border-0 btn-primary wh-50 p-10 rounded-circle">
                                                            <img class="svg" src="img/svg/send.svg" alt="send"></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="panel_b_second" role="tabpanel" aria-labelledby="second-tab">
                            <div class="chat">
                                <div class="chat-body bg-white radius-xl">
                                    <div class="chat-header ">
                                        <div class="media chat-name align-items-center">
                                            <div class="media-body align-self-center ">
                                                <h5 class=" mb-0 fw-500 text-uppercase">ui/ux group</h5>
                                            </div>
                                        </div>
                                        <div class="image-group">
                                            <ul class="d-flex">
                                                <li>
                                                    <img src="img/author/1.jpg" alt="img" class="wh-30 rounded-circle">
                                                </li>
                                                <li>
                                                    <img src="img/author/1.jpg" alt="img" class="wh-30 rounded-circle">
                                                </li>
                                                <li>
                                                    <img src="img/author/1.jpg" alt="img" class="wh-30 rounded-circle">
                                                </li>
                                                <li>
                                                    <img src="img/author/1.jpg" alt="img" class="wh-30 rounded-circle">
                                                </li>
                                                <li>
                                                    <img src="img/author/1.jpg" alt="img" class="wh-30 rounded-circle">
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="bg-primary rounded-circle wh-30 color-white content-center fs-10 fw-500">20+</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="border rounded-circle wh-30 color-extra-light content-center">
                                                        <img src="img/svg/plus.svg" alt="plus" class="svg">
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <ul class="nav flex-nowrap">
                                            <li class="nav-item list-inline-item d-none d-sm-block me-0">
                                                <div class="dropdown">
                                                    <a href="#" role="button" title="Details" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <img class="svg" src="img/svg/more-vertical.svg"
                                                            alt="more-vertical">
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item align-items-center d-flex" href="#"
                                                            data-chat-info-toggle>

                                                            <img class="svg" src="img/svg/users.svg" alt="users">
                                                            <span>Create new group</span>
                                                        </a>
                                                        <a class="dropdown-item align-items-center d-flex" href="#">

                                                            <img class="svg" src="img/svg/trash-2.svg" alt>
                                                            <span>Delete conversation</span>
                                                        </a>
                                                        <a class="dropdown-item align-items-center d-flex" href="#">

                                                            <img class="svg" src="img/svg/x-octagon.svg" alt="x-octagon">
                                                            <span>Block & report</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="chat-box chat-box--big p-xl-30 ps-lg-20 pe-lg-0">

                                        <div class="flex-1 incoming-chat">
                                            <div class="chat-text-box">
                                                <div class="media ">
                                                    <div class="chat-text-box__photo ">
                                                        <img src="img/author/1.jpg" class="align-self-start me-15 wh-46"
                                                            alt="img">
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="chat-text-box__content">
                                                            <div class="chat-text-box__title d-flex align-items-center">
                                                                <h6 class="fs-14">Domnic Harys</h6>
                                                                <span
                                                                    class="chat-text-box__time fs-12 color-light fw-400 ms-15">8:30
                                                                    PM</span>
                                                            </div>
                                                            <div class="d-flex align-items-center mb-20 mt-10">
                                                                <div class="chat-text-box__subtitle p-20 bg-primary">
                                                                    <p class="color-white">Jam nonumy eirmod tempor invidunt
                                                                        ut
                                                                        labore
                                                                        et dolore magna aliquyam erat consetetur sadipscing
                                                                        elitr
                                                                        sed
                                                                        diam nonumy eirmod tempor invidunt ut labore et
                                                                        dolore magna
                                                                        aliquyam erat sed diam voluptua..</p>
                                                                </div>
                                                                <div class="chat-text-box__other d-flex">
                                                                    <div class="chat-text-box__reaction px-sm-15 px-2">
                                                                        <div class="emotions">
                                                                            <div class="dropdown  dropdown-click ">
                                                                                <button
                                                                                    class="btn-link border-0 bg-transparent p-0"
                                                                                    data-bs-toggle="dropdown"
                                                                                    aria-haspopup="true"
                                                                                    aria-expanded="false">
                                                                                    <img class="svg" src="img/svg/smile.svg"
                                                                                        alt="smile"> </button>
                                                                                <div
                                                                                    class="dropdown-default dropdown-bottomLeft dropdown-menu-left dropdown-menu">
                                                                                    <ul class="emotions__parent d-flex">
                                                                                        <li>
                                                                                            <a class href="#">
                                                                                                <img src="img/svg/cool.png"
                                                                                                    alt="emotions">
                                                                                            </a>
                                                                                        </li>
                                                                                        <li><a class href="#">
                                                                                                <img src="img/svg/happy2.png"
                                                                                                    alt="emotions">
                                                                                            </a></li>
                                                                                        <li><a class href="#">
                                                                                                <img src="img/svg/happy.png"
                                                                                                    alt="emotions">
                                                                                            </a></li>
                                                                                        <li><a class href="#">
                                                                                                <img src="img/svg/shocked.png"
                                                                                                    alt="emotions">
                                                                                            </a></li>
                                                                                        <li><a class href="#">
                                                                                                <img src="img/svg/like.png"
                                                                                                    alt="emotions">
                                                                                            </a></li>
                                                                                        <li><a class href="#">
                                                                                                <img src="img/svg/heart.png"
                                                                                                    alt="emotions">
                                                                                            </a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="dropdown dropdown-click">
                                                                        <button class="btn-link border-0 bg-transparent p-0"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false">
                                                                            <img src="img/svg/more-horizontal.svg"
                                                                                alt="more-horizontal" class="svg">
                                                                        </button>
                                                                        <div class="dropdown-default dropdown-bottomLeft dropdown-menu-left dropdown-menu"
                                                                            style>
                                                                            <a class="dropdown-item" href="#">Copy</a>
                                                                            <a class="dropdown-item" href="#">Quote</a>
                                                                            <a class="dropdown-item" href="#">Forward</a>
                                                                            <a class="dropdown-item" href="#">Report</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <p class="social-connector text-center text-capitalize">
                                            <span>today</span>
                                        </p>

                                        <div class="flex-1 justify-content-end d-flex outgoing-chat mt-20">
                                            <div class="chat-text-box">
                                                <div class="media ">
                                                    <div class="media-body">
                                                        <div class="chat-text-box__content">
                                                            <div
                                                                class="chat-text-box__title d-flex align-items-center justify-content-end mb-2">
                                                                <span
                                                                    class="chat-text-box__time fs-12 color-light fw-400">8:30
                                                                    PM</span>
                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-end">
                                                                <div class="chat-text-box__other d-flex">
                                                                    <div class="px-15">
                                                                        <div class="dropdown dropdown-click">
                                                                            <button
                                                                                class="btn-link border-0 bg-transparent p-0"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-haspopup="true" aria-expanded="false">
                                                                                <img src="img/svg/more-horizontal.svg"
                                                                                    alt="more-horizontal" class="svg">
                                                                            </button>
                                                                            <div class="dropdown-default dropdown-bottomRight dropdown-menu-right dropdown-menu"
                                                                                style>
                                                                                <a class="dropdown-item" href="#">Copy</a>
                                                                                <a class="dropdown-item" href="#">Quote</a>
                                                                                <a class="dropdown-item"
                                                                                    href="#">Forward</a>
                                                                                <a class="dropdown-item" href="#">Report</a>
                                                                                <a class="dropdown-item" href="#">remove</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="chat-text-box__subtitle p-20 bg-deep">
                                                                    <p class="color-gray">Jam nonumy eirmod tempor invidunt
                                                                        ut
                                                                        labore
                                                                        et dolore magna aliquyam erat consetetur sadipscing
                                                                        elitr
                                                                        sed
                                                                        diam nonumy eirmod tempor invidunt ut labore et
                                                                        dolore magna
                                                                        aliquyam erat sed diam voluptua..</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-1 justify-content-end d-flex outgoing-chat">
                                            <div class="chat-text-box">
                                                <div class="media ">
                                                    <div class="media-body">
                                                        <div class="chat-text-box__content">
                                                            <div class="d-flex align-items-center justify-content-end">
                                                                <div class="chat-text-box__other d-flex">
                                                                    <div class="px-15">
                                                                        <div class="dropdown dropdown-click">
                                                                            <button
                                                                                class="btn-link border-0 bg-transparent p-0"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-haspopup="true" aria-expanded="false">
                                                                                <img src="img/svg/more-horizontal.svg"
                                                                                    alt="more-horizontal" class="svg">
                                                                            </button>
                                                                            <div class="dropdown-default dropdown-bottomLeft dropdown-menu-left dropdown-menu"
                                                                                style>
                                                                                <a class="dropdown-item" href="#">Copy</a>
                                                                                <a class="dropdown-item" href="#">Quote</a>
                                                                                <a class="dropdown-item"
                                                                                    href="#">Forward</a>
                                                                                <a class="dropdown-item" href="#">Report</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="chat-text-box__subtitle p-20 bg-deep">
                                                                    <p class="color-gray">Jam nonumy eirmod tempor invidunt
                                                                        ut
                                                                        labore et
                                                                        dolore magna.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="flex-1 incoming-chat mt-30">
                                            <div class="chat-text-box">
                                                <div class="media ">
                                                    <div class="chat-text-box__photo ">
                                                        <img src="img/author/1.jpg" class="align-self-start me-15 wh-46"
                                                            alt="img">
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="chat-text-box__content">
                                                            <div class="chat-text-box__title d-flex align-items-center">
                                                                <h6 class="fs-14">Domnic Harys</h6>
                                                                <span
                                                                    class="chat-text-box__time fs-12 color-light fw-400 ms-15">8:30
                                                                    PM</span>
                                                            </div>
                                                            <div class="d-flex align-items-center mb-20 mt-10">
                                                                <div class="chat-text-box__subtitle p-20 bg-primary">
                                                                    <p class="color-white">Jam nonumy eirmod tempor invidunt
                                                                        ut
                                                                        labore
                                                                        et dolore magna.</p>
                                                                </div>
                                                                <div class="chat-text-box__other d-flex">
                                                                    <div class="chat-text-box__reaction px-sm-15 px-2">
                                                                        <div class="emotions">
                                                                            <div class="dropdown  dropdown-click ">
                                                                                <button
                                                                                    class="btn-link border-0 bg-transparent p-0"
                                                                                    data-bs-toggle="dropdown"
                                                                                    aria-haspopup="true"
                                                                                    aria-expanded="false">
                                                                                    <img class="svg" src="img/svg/smile.svg"
                                                                                        alt="smile"> </button>
                                                                                <div
                                                                                    class="dropdown-default dropdown-bottomLeft dropdown-menu-left dropdown-menu">
                                                                                    <ul class="emotions__parent d-flex">
                                                                                        <li>
                                                                                            <a class href="#">
                                                                                                <img src="img/svg/cool.png"
                                                                                                    alt="emotions">
                                                                                            </a>
                                                                                        </li>
                                                                                        <li><a class href="#">
                                                                                                <img src="img/svg/happy2.png"
                                                                                                    alt="emotions">
                                                                                            </a></li>
                                                                                        <li><a class href="#">
                                                                                                <img src="img/svg/happy.png"
                                                                                                    alt="emotions">
                                                                                            </a></li>
                                                                                        <li><a class href="#">
                                                                                                <img src="img/svg/shocked.png"
                                                                                                    alt="emotions">
                                                                                            </a></li>
                                                                                        <li><a class href="#">
                                                                                                <img src="img/svg/like.png"
                                                                                                    alt="emotions">
                                                                                            </a></li>
                                                                                        <li><a class href="#">
                                                                                                <img src="img/svg/heart.png"
                                                                                                    alt="emotions">
                                                                                            </a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="dropdown dropdown-click">
                                                                        <button class="btn-link border-0 bg-transparent p-0"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false">
                                                                            <img src="img/svg/more-horizontal.svg"
                                                                                alt="more-horizontal" class="svg">
                                                                        </button>
                                                                        <div class="dropdown-default dropdown-bottomLeft dropdown-menu-left dropdown-menu"
                                                                            style>
                                                                            <a class="dropdown-item" href="#">Copy</a>
                                                                            <a class="dropdown-item" href="#">Quote</a>
                                                                            <a class="dropdown-item" href="#">Forward</a>
                                                                            <a class="dropdown-item" href="#">Report</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="flex-1 justify-content-end d-flex outgoing-chat">
                                            <div class="chat-text-box">
                                                <div class="media ">
                                                    <div class="media-body">
                                                        <div class="chat-text-box__content">
                                                            <div
                                                                class="chat-text-box__title d-flex align-items-center justify-content-end mb-2">
                                                                <span
                                                                    class="chat-text-box__time fs-12 color-light fw-400">8:30
                                                                    PM</span>
                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-end">
                                                                <div class="chat-text-box__other d-flex">
                                                                    <div class="px-15">
                                                                        <div class="dropdown dropdown-click">
                                                                            <button
                                                                                class="btn-link border-0 bg-transparent p-0"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-haspopup="true" aria-expanded="false">
                                                                                <img src="img/svg/more-horizontal.svg"
                                                                                    alt="more-horizontal" class="svg">
                                                                            </button>
                                                                            <div class="dropdown-default dropdown-bottomRight dropdown-menu-right dropdown-menu"
                                                                                style>
                                                                                <a class="dropdown-item" href="#">Copy</a>
                                                                                <a class="dropdown-item" href="#">Quote</a>
                                                                                <a class="dropdown-item"
                                                                                    href="#">Forward</a>
                                                                                <a class="dropdown-item" href="#">Report</a>
                                                                                <a class="dropdown-item" href="#">remove</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="chat-text-box__subtitle p-20 bg-deep">
                                                                    <p class="color-gray">Jam nonumy eirmod tempor invidunt
                                                                        ut
                                                                        labore et
                                                                        dolore magna.</p>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="seen-chat seen-chat-group  d-flex align-items-center  justify-content-end mb-2 mt-10">
                                                                <ul class="d-flex">
                                                                    <li>
                                                                        <img src="img/author/1.jpg" alt="img"
                                                                            class="wh-20 rounded-circle">
                                                                    </li>
                                                                    <li>
                                                                        <img src="img/author/2.jpg" alt="img"
                                                                            class="wh-20 rounded-circle">
                                                                    </li>
                                                                    <li>
                                                                        <img src="img/author/3.jpg" alt="img"
                                                                            class="wh-20 rounded-circle">
                                                                    </li>
                                                                    <li>
                                                                        <img src="img/author/4.jpg" alt="img"
                                                                            class="wh-20 rounded-circle">
                                                                    </li>
                                                                    <li>
                                                                        <img src="img/author/1.jpg" alt="img"
                                                                            class="wh-20 rounded-circle">
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="flex-1 incoming-chat mt-30">
                                            <div class="chat-text-box">
                                                <div class="media ">
                                                    <div class="chat-text-box__photo ">
                                                        <img src="img/author/1.jpg" class="align-self-start me-15 wh-46"
                                                            alt="img">
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="chat-text-box__content">
                                                            <div class="d-flex align-items-center ">
                                                                <div class="chat-text-box__subtitle typing cbg-light pe-30">
                                                                    <p class="color-light text-capitalize">typing...</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="chat-footer px-xl-30 px-lg-20 pb-lg-30 pt-1">
                                        <div class="chat-type-text">
                                            <div class="pt-0 outline-0 pb-0 pe-0 ps-0 rounded-0 position-relative d-flex align-items-center"
                                                tabindex="-1">
                                                <div
                                                    class="d-flex justify-content-between align-items-center w-100 flex-wrap">
                                                    <div
                                                        class=" flex-1 d-flex align-items-center chat-type-text__write ms-0">
                                                        <a href="#">
                                                            <img class="svg" src="img/svg/smile.svg" alt="smile"></a>
                                                        <input class="form-control border-0 bg-transparent"
                                                            placeholder="Type your message...">
                                                    </div>
                                                    <div class="chat-type-text__btn">
                                                        <button type="button"
                                                            class="border-0 btn-deep color-light wh-50 p-10 rounded-circle">
                                                            <img class="svg" src="img/svg/image.svg" alt="image"></button>
                                                        <button type="button"
                                                            class="border-0 btn-deep color-light wh-50 p-10 rounded-circle">
                                                            <img class="svg" src="img/svg/paperclip.svg"
                                                                alt="paperclip"></button>
                                                        <button type="button"
                                                            class="border-0 btn-primary wh-50 p-10 rounded-circle">
                                                            <img class="svg" src="img/svg/send.svg" alt="send"></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="panel_b_thrid" role="tabpanel" aria-labelledby="third-tab">
                            <div class="chat">
                                <div class="chat-body bg-white radius-xl">
                                    <div class="chat-header">
                                        <div class="media chat-name align-items-center">
                                            <div class="media-body align-self-center ">
                                                <h5 class=" mb-0 fw-500 mb-2">Domnic Harys</h5>
                                                <div class="d-flex align-items-center">
                                                    <span class="badge-dot dot-success me-1"></span>
                                                    <small class="d-flex color-light fs-12 text-capitalize">
                                                        active now
                                                    </small>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="nav flex-nowrap">
                                            <li class="nav-item list-inline-item d-none d-sm-block me-0">
                                                <div class="dropdown">
                                                    <a href="#" role="button" title="Details" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <img class="svg" src="img/svg/more-vertical.svg"
                                                            alt="more-vertical">
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item align-items-center d-flex" href="#"
                                                            data-chat-info-toggle>

                                                            <img class="svg" src="img/svg/users.svg" alt="users">
                                                            <span>Create new group</span>
                                                        </a>
                                                        <a class="dropdown-item align-items-center d-flex" href="#">

                                                            <img class="svg" src="img/svg/trash-2.svg" alt>
                                                            <span>Delete conversation</span>
                                                        </a>
                                                        <a class="dropdown-item align-items-center d-flex" href="#">

                                                            <img class="svg" src="img/svg/x-octagon.svg" alt="x-octagon">
                                                            <span>Block & report</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="chat-box chat-box--big p-xl-30 ps-lg-20 pe-lg-0">

                                        <div class="flex-1 incoming-chat">
                                            <div class="chat-text-box">
                                                <div class="media ">
                                                    <div class="chat-text-box__photo ">
                                                        <img src="img/author/1.jpg" class="align-self-start me-15 wh-46"
                                                            alt="img">
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="chat-text-box__content">
                                                            <div class="chat-text-box__title d-flex align-items-center">
                                                                <h6 class="fs-14">Domnic Harys</h6>
                                                                <span
                                                                    class="chat-text-box__time fs-12 color-light fw-400 ms-15">8:30
                                                                    PM</span>
                                                            </div>
                                                            <div class="d-flex align-items-center mb-20 mt-10">
                                                                <div class="chat-text-box__subtitle p-20 bg-primary">
                                                                    <p class="color-white">Jam nonumy eirmod tempor invidunt
                                                                        ut
                                                                        labore
                                                                        et dolore magna aliquyam erat consetetur sadipscing
                                                                        elitr
                                                                        sed
                                                                        diam nonumy eirmod tempor invidunt ut labore et
                                                                        dolore magna
                                                                        aliquyam erat sed diam voluptua..</p>
                                                                </div>
                                                                <div class="chat-text-box__other d-flex">
                                                                    <div class="chat-text-box__reaction px-sm-15 px-2">
                                                                        <div class="emotions">
                                                                            <div class="dropdown  dropdown-click ">
                                                                                <button
                                                                                    class="btn-link border-0 bg-transparent p-0"
                                                                                    data-bs-toggle="dropdown"
                                                                                    aria-haspopup="true"
                                                                                    aria-expanded="false">
                                                                                    <img class="svg" src="img/svg/smile.svg"
                                                                                        alt="smile"> </button>
                                                                                <div
                                                                                    class="dropdown-default dropdown-bottomLeft dropdown-menu-left dropdown-menu">
                                                                                    <ul class="emotions__parent d-flex">
                                                                                        <li>
                                                                                            <a class href="#">
                                                                                                <img src="img/svg/cool.png"
                                                                                                    alt="emotions">
                                                                                            </a>
                                                                                        </li>
                                                                                        <li><a class href="#">
                                                                                                <img src="img/svg/happy2.png"
                                                                                                    alt="emotions">
                                                                                            </a></li>
                                                                                        <li><a class href="#">
                                                                                                <img src="img/svg/happy.png"
                                                                                                    alt="emotions">
                                                                                            </a></li>
                                                                                        <li><a class href="#">
                                                                                                <img src="img/svg/shocked.png"
                                                                                                    alt="emotions">
                                                                                            </a></li>
                                                                                        <li><a class href="#">
                                                                                                <img src="img/svg/like.png"
                                                                                                    alt="emotions">
                                                                                            </a></li>
                                                                                        <li><a class href="#">
                                                                                                <img src="img/svg/heart.png"
                                                                                                    alt="emotions">
                                                                                            </a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="dropdown dropdown-click">
                                                                        <button class="btn-link border-0 bg-transparent p-0"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false">
                                                                            <img src="img/svg/more-horizontal.svg"
                                                                                alt="more-horizontal" class="svg">
                                                                        </button>
                                                                        <div class="dropdown-default dropdown-bottomLeft dropdown-menu-left dropdown-menu"
                                                                            style>
                                                                            <a class="dropdown-item" href="#">Copy</a>
                                                                            <a class="dropdown-item" href="#">Quote</a>
                                                                            <a class="dropdown-item" href="#">Forward</a>
                                                                            <a class="dropdown-item" href="#">Report</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <p class="social-connector text-center text-capitalize">
                                            <span>today</span>
                                        </p>

                                        <div class="flex-1 justify-content-end d-flex outgoing-chat mt-20">
                                            <div class="chat-text-box">
                                                <div class="media ">
                                                    <div class="media-body">
                                                        <div class="chat-text-box__content">
                                                            <div
                                                                class="chat-text-box__title d-flex align-items-center justify-content-end mb-2">
                                                                <span
                                                                    class="chat-text-box__time fs-12 color-light fw-400">8:30
                                                                    PM</span>
                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-end">
                                                                <div class="chat-text-box__other d-flex">
                                                                    <div class="px-15">
                                                                        <div class="dropdown dropdown-click">
                                                                            <button
                                                                                class="btn-link border-0 bg-transparent p-0"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-haspopup="true" aria-expanded="false">
                                                                                <img src="img/svg/more-horizontal.svg"
                                                                                    alt="more-horizontal" class="svg">
                                                                            </button>
                                                                            <div class="dropdown-default dropdown-bottomRight dropdown-menu-right dropdown-menu"
                                                                                style>
                                                                                <a class="dropdown-item" href="#">Copy</a>
                                                                                <a class="dropdown-item" href="#">Quote</a>
                                                                                <a class="dropdown-item"
                                                                                    href="#">Forward</a>
                                                                                <a class="dropdown-item" href="#">Report</a>
                                                                                <a class="dropdown-item" href="#">remove</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="chat-text-box__subtitle p-20 bg-deep">
                                                                    <p class="color-gray">Jam nonumy eirmod tempor invidunt
                                                                        ut
                                                                        labore
                                                                        et dolore magna aliquyam erat consetetur sadipscing
                                                                        elitr
                                                                        sed
                                                                        diam nonumy eirmod tempor invidunt ut labore et
                                                                        dolore magna
                                                                        aliquyam erat sed diam voluptua..</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-1 justify-content-end d-flex outgoing-chat">
                                            <div class="chat-text-box">
                                                <div class="media ">
                                                    <div class="media-body">
                                                        <div class="chat-text-box__content">
                                                            <div class="d-flex align-items-center justify-content-end">
                                                                <div class="chat-text-box__other d-flex">
                                                                    <div class="px-15">
                                                                        <div class="dropdown dropdown-click">
                                                                            <button
                                                                                class="btn-link border-0 bg-transparent p-0"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-haspopup="true" aria-expanded="false">
                                                                                <img src="img/svg/more-horizontal.svg"
                                                                                    alt="more-horizontal" class="svg">
                                                                            </button>
                                                                            <div class="dropdown-default dropdown-bottomRight dropdown-menu-right dropdown-menu"
                                                                                style>
                                                                                <a class="dropdown-item" href="#">Copy</a>
                                                                                <a class="dropdown-item" href="#">Quote</a>
                                                                                <a class="dropdown-item"
                                                                                    href="#">Forward</a>
                                                                                <a class="dropdown-item" href="#">Report</a>
                                                                                <a class="dropdown-item" href="#">remove</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="chat-text-box__subtitle p-20 bg-deep">
                                                                    <p class="color-gray">Jam nonumy eirmod tempor invidunt
                                                                        ut
                                                                        labore et
                                                                        dolore magna.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="flex-1 incoming-chat mt-30">
                                            <div class="chat-text-box">
                                                <div class="media ">
                                                    <div class="chat-text-box__photo ">
                                                        <img src="img/author/1.jpg" class="align-self-start me-15 wh-46"
                                                            alt="img">
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="chat-text-box__content">
                                                            <div class="chat-text-box__title d-flex align-items-center">
                                                                <h6 class="fs-14">Domnic Harys</h6>
                                                                <span
                                                                    class="chat-text-box__time fs-12 color-light fw-400 ms-15">8:30
                                                                    PM</span>
                                                            </div>
                                                            <div class="d-flex align-items-center mb-20 mt-10">
                                                                <div class="chat-text-box__subtitle p-20 bg-primary">
                                                                    <p class="color-white">Jam nonumy eirmod tempor invidunt
                                                                        ut
                                                                        labore
                                                                        et dolore magna.</p>
                                                                </div>
                                                                <div class="chat-text-box__other d-flex">
                                                                    <div class="chat-text-box__reaction px-sm-15 px-2">
                                                                        <div class="emotions">
                                                                            <div class="dropdown  dropdown-click ">
                                                                                <button
                                                                                    class="btn-link border-0 bg-transparent p-0"
                                                                                    data-bs-toggle="dropdown"
                                                                                    aria-haspopup="true"
                                                                                    aria-expanded="false">
                                                                                    <img class="svg" src="img/svg/smile.svg"
                                                                                        alt="smile"> </button>
                                                                                <div
                                                                                    class="dropdown-default dropdown-bottomLeft dropdown-menu-left dropdown-menu">
                                                                                    <ul class="emotions__parent d-flex">
                                                                                        <li>
                                                                                            <a class href="#">
                                                                                                <img src="img/svg/cool.png"
                                                                                                    alt="emotions">
                                                                                            </a>
                                                                                        </li>
                                                                                        <li><a class href="#">
                                                                                                <img src="img/svg/happy2.png"
                                                                                                    alt="emotions">
                                                                                            </a></li>
                                                                                        <li><a class href="#">
                                                                                                <img src="img/svg/happy.png"
                                                                                                    alt="emotions">
                                                                                            </a></li>
                                                                                        <li><a class href="#">
                                                                                                <img src="img/svg/shocked.png"
                                                                                                    alt="emotions">
                                                                                            </a></li>
                                                                                        <li><a class href="#">
                                                                                                <img src="img/svg/like.png"
                                                                                                    alt="emotions">
                                                                                            </a></li>
                                                                                        <li><a class href="#">
                                                                                                <img src="img/svg/heart.png"
                                                                                                    alt="emotions">
                                                                                            </a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="dropdown dropdown-click">
                                                                        <button class="btn-link border-0 bg-transparent p-0"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false">
                                                                            <img src="img/svg/more-horizontal.svg"
                                                                                alt="more-horizontal" class="svg">
                                                                        </button>
                                                                        <div class="dropdown-default dropdown-bottomLeft dropdown-menu-left dropdown-menu"
                                                                            style>
                                                                            <a class="dropdown-item" href="#">Copy</a>
                                                                            <a class="dropdown-item" href="#">Quote</a>
                                                                            <a class="dropdown-item" href="#">Forward</a>
                                                                            <a class="dropdown-item" href="#">Report</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="flex-1 justify-content-end d-flex outgoing-chat">
                                            <div class="chat-text-box">
                                                <div class="media ">
                                                    <div class="media-body">
                                                        <div class="chat-text-box__content">
                                                            <div
                                                                class="chat-text-box__title d-flex align-items-center justify-content-end mb-2">
                                                                <span
                                                                    class="chat-text-box__time fs-12 color-light fw-400">8:30
                                                                    PM</span>
                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-end">
                                                                <div class="chat-text-box__other d-flex">
                                                                    <div class="px-15">
                                                                        <div class="dropdown dropdown-click">
                                                                            <button
                                                                                class="btn-link border-0 bg-transparent p-0"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-haspopup="true" aria-expanded="false">
                                                                                <img src="img/svg/more-horizontal.svg"
                                                                                    alt="more-horizontal" class="svg">
                                                                            </button>
                                                                            <div class="dropdown-default dropdown-bottomLeft dropdown-menu-left dropdown-menu"
                                                                                style>
                                                                                <a class="dropdown-item" href="#">Copy</a>
                                                                                <a class="dropdown-item" href="#">Quote</a>
                                                                                <a class="dropdown-item"
                                                                                    href="#">Forward</a>
                                                                                <a class="dropdown-item" href="#">Report</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="chat-text-box__subtitle p-20 bg-deep">
                                                                    <p class="color-gray">Jam nonumy eirmod tempor invidunt
                                                                        ut
                                                                        labore et
                                                                        dolore magna.</p>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="seen-chat d-flex align-items-center  justify-content-end mb-2 mt-10">
                                                                <div
                                                                    class="chat-text-box__title d-flex align-items-center me-10 ">
                                                                    <span
                                                                        class="chat-text-box__time fs-12 color-light fw-400">Seen
                                                                        9:20
                                                                        PM</span>
                                                                </div>
                                                                <img src="img/author/1.jpg" alt="img"
                                                                    class="wh-20 rounded-circle">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="flex-1 incoming-chat mt-30">
                                            <div class="chat-text-box">
                                                <div class="media ">
                                                    <div class="chat-text-box__photo ">
                                                        <img src="img/author/1.jpg" class="align-self-start me-15 wh-46"
                                                            alt="img">
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="chat-text-box__content">
                                                            <div class="d-flex align-items-center ">
                                                                <div class="chat-text-box__subtitle typing cbg-light pe-30">
                                                                    <p class="color-light text-capitalize">typing...</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="chat-footer px-xl-30 px-lg-20 pb-lg-30 pt-1">
                                        <div class="chat-type-text">
                                            <div class="pt-0 outline-0 pb-0 pe-0 ps-0 rounded-0 position-relative d-flex align-items-center"
                                                tabindex="-1">
                                                <div
                                                    class="d-flex justify-content-between align-items-center w-100 flex-wrap">
                                                    <div
                                                        class=" flex-1 d-flex align-items-center chat-type-text__write ms-0">
                                                        <a href="#">
                                                            <img class="svg" src="img/svg/smile.svg" alt="smile"></a>
                                                        <input class="form-control border-0 bg-transparent box-shadow-none"
                                                            placeholder="Type your message...">
                                                    </div>
                                                    <div class="chat-type-text__btn">
                                                        <button type="button"
                                                            class="border-0 btn-deep color-light wh-50 p-10 rounded-circle">
                                                            <img class="svg" src="img/svg/image.svg" alt="image"></button>
                                                        <button type="button"
                                                            class="border-0 btn-deep color-light wh-50 p-10 rounded-circle">
                                                            <img class="svg" src="img/svg/paperclip.svg"
                                                                alt="paperclip"></button>
                                                        <button type="button"
                                                            class="border-0 btn-primary wh-50 p-10 rounded-circle">
                                                            <img class="svg" src="img/svg/send.svg" alt="send"></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                <img class="svg" src="{{asset('img/svg/user-plus.svg')}}" alt> add user</button>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-25">
                                <img src="{{asset('img/tm1.png')}}" class="wh-46 me-15" alt="img">
                                <div>
                                    <p class="fs-14 fw-600 color-dark mb-0">Meyri Carles</p>
                                    <span class=" mt-1 fs-14  color-light ">UI Designer</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-25">
                                <img src="{{asset('img/tm2.png')}}" class="wh-46 me-15" alt="img">
                                <div>
                                    <p class="fs-14 fw-600 color-dark mb-0">Shreyu Neu</p>
                                    <span class=" mt-1 fs-14  color-light ">Web Developer</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-25">
                                <img src="{{asset('img/tm3.png')}}" class="wh-46 me-15" alt="img">
                                <div>
                                    <p class="fs-14 fw-600 color-dark mb-0">Tuhin Molla</p>
                                    <span class=" mt-1 fs-14  color-light ">Project Manager</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-25">
                                <img src="{{asset('img/tm4.png')}}" class="wh-46 me-15" alt="img">
                                <div>
                                    <p class="fs-14 fw-600 color-dark mb-0">Billal Hossain</p>
                                    <span class=" mt-1 fs-14  color-light ">App Developer</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <img src="{{asset('img/tm5.png')}}" class="wh-46 me-15" alt="img">
                                <div>
                                    <p class="fs-14 fw-600 color-dark mb-0">Khalid Hasan</p>
                                    <span class=" mt-1 fs-14  color-light ">App Developer</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> --}}

                {{-- <div class="col-xxl-8 col-md-8  mb-25">
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

                </div> --}}

                {{-- <div class="col-xxl-4 col-lg-4 col-md-4 order-lg-0 order-md-1">
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
                                                    <img src="{{asset($file->file_path) }}" alt="img" class="wh-42">
                                                @elseif(in_array($fileExtension, ['pdf']))
                                                    <a href="{{ asset($file->file_path) }}" class="fs-12 fw-500 color-primary" target="_blank">View PDF</a>
                                                @elseif(in_array($fileExtension, ['zip']))
                                                    <img src="{{asset($file->file_path) }}" alt="img" class="wh-42">
                                                @else
                                                    <img src="{{asset($file->file_path) }}" alt="img" class="wh-42">
                                                @endif
                                            </div>
                                            <div class="files-area__title">
                                                <p class="mb-0 fs-14 fw-500 color-dark text-capitalize"></p>

                                                <div class="d-flex text-capitalize">
                                                    <a href="{{ asset($file->file_path) }}" class="fs-12 fw-500 color-primary" download>Download</a>
                                                    <a href="#" class="fs-12 fw-500 color-primary ms-10">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="files-area__right">
                                            <div class="dropdown dropleft">

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
                        </div>
                    </div>

                </div> --}}





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

<script>
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
</script>
@endsection
