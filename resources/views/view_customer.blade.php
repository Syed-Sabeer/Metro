@extends('layouts.main')

@section('main-container')

<style>
    #global-loading {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.5); /* Dimmed background */
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999; /* Ensure it overlays everything */
    }

    #global-loading img {
        width: 100px; /* Increase size */
        height: 100px;
        animation: move-animation 2m infinite; /* Add animation */
    }

    @keyframes move-animation {
        0% { transform: translate(0, 0); }
        25% { transform: translate(50px, 50px); }
        50% { transform: translate(-50px, 50px); }
        75% { transform: translate(-50px, -50px); }
        100% { transform: translate(0, 0); }
    }
</style>

<div class="contents">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-main user-member justify-content-sm-between ">
                    <div class=" d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                        <div
                            class="d-flex align-items-center user-member__title justify-content-center me-sm-25">
                            <h4 class="text-capitalize fw-500 breadcrumb-title">Customer list </h4>
                            <span class="sub-title ms-sm-25 ps-sm-25">Home</span>
                        </div>
                        <div class="project-search project-search--height global-shadow ms-md-20 my-10 order-md-2 order-1">
                            <form action="/" method="GET" class="d-flex align-items-center user-member__form">
                                <img src="{{ asset('img/svg/search.svg') }}" alt="search" class="svg">
                                <input id="searchInput" class="form-control me-sm-2 border-0 box-shadow-none" type="search" placeholder="Search by Name" aria-label="Search">
                            </form>
                        </div>
                    </div>
                    <div class="action-btn">
                        {{-- <a href="#" class="btn px-15 btn-primary" data-bs-toggle="modal"
                            data-bs-target="#new-member">
                            <i class="las la-plus fs-16"></i>Supplier/Customer list </a> --}}

                        {{-- <div class="modal fade new-member " id="new-member" role="dialog" tabindex="-1"
                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content  radius-xl">
                                    <div class="modal-header">
                                        <h6 class="modal-title fw-500" id="staticBackdropLabel">Create project
                                        </h6>
                                        <button type="button" class="close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <img src="img/svg/x.svg" alt="x" class="svg">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="new-member-modal">
                                            <form>
                                                <div class="form-group mb-20">
                                                    <input type="text" class="form-control"
                                                        placeholder="Duran Clayton">
                                                </div>
                                                <div class="form-group mb-20">
                                                    <div class="category-member">
                                                        <select
                                                            class="js-example-basic-single js-states form-control"
                                                            id="category-member">
                                                            <option value="JAN">1</option>
                                                            <option value="FBR">2</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-20">
                                                    <textarea class="form-control"
                                                        id="exampleFormControlTextarea1" rows="3"
                                                        placeholder="Project description"></textarea>
                                                </div>
                                                <div class="form-group textarea-group">
                                                    <label class="mb-15">status</label>
                                                    <div class="d-flex">
                                                        <div
                                                            class="project-task-list__left d-flex align-items-center">
                                                            <div class="checkbox-group d-flex me-50 pe-10">
                                                                <div
                                                                    class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                                    <input class="checkbox" type="checkbox"
                                                                        id="check-grp-1" checked>
                                                                    <label for="check-grp-1"
                                                                        class="fs-14 color-light strikethrough">
                                                                        status
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="checkbox-group d-flex me-50 pe-10">
                                                                <div
                                                                    class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                                    <input class="checkbox" type="checkbox"
                                                                        id="check-grp-2">
                                                                    <label for="check-grp-2"
                                                                        class="fs-14 color-light strikethrough">
                                                                        Deactivated
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="checkbox-group d-flex">
                                                                <div
                                                                    class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                                    <input class="checkbox" type="checkbox"
                                                                        id="check-grp-3">
                                                                    <label for="check-grp-3"
                                                                        class="fs-14 color-light strikethrough">
                                                                        bloked
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-25">
                                                    <div class="form-group mb-10">
                                                        <label for="name47">project member</label>
                                                        <input type="text" class="form-control" id="name47"
                                                            placeholder="Search members">
                                                    </div>
                                                    <ul
                                                        class="d-flex flex-wrap mb-20 user-group-people__parent">
                                                        <li>
                                                            <a href="#"><img class="rounded-circle wh-34"
                                                                    src="img/tm1.png" alt="author"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><img class="rounded-circle wh-34"
                                                                    src="img/tm2.png" alt="author"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><img class="rounded-circle wh-34"
                                                                    src="img/tm3.png" alt="author"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><img class="rounded-circle wh-34"
                                                                    src="img/tm4.png" alt="author"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><img class="rounded-circle wh-34"
                                                                    src="img/tm5.png" alt="author"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="d-flex new-member-calendar">
                                                    <div class="form-group w-100 me-sm-15 form-group-calender">
                                                        <label for="datepicker">start Date</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control"
                                                                id="datepicker" placeholder="mm/dd/yyyy">
                                                            <a href="#">
                                                                <img class="svg" src="img/svg/chevron-right.svg"
                                                                    alt="chevron-right.svg"></a>
                                                        </div>
                                                    </div>
                                                    <div class="form-group w-100 form-group-calender">
                                                        <label for="datepicker2">End Date</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control"
                                                                id="datepicker2" placeholder="mm/dd/yyyy">
                                                            <a href="#">
                                                                <img class="svg" src="img/svg/chevron-right.svg"
                                                                    alt="chevron-right.svg"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="button-group d-flex pt-25">
                                                    <button
                                                        class="btn btn-primary btn-default btn-squared text-capitalize">add
                                                        new project
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-light btn-default btn-squared fw-400 text-capitalize b-light color-light"
                                                        data-bs-dismiss="modal">cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="userDatatable global-shadow border-light-0 p-30 bg-white radius-xl w-100 mb-30">
                    <div class="table-responsive">
                        <table class="table mb-0 table-borderless">
                            <thead>
                                <tr class="userDatatable-header">
                                    <th>
                                        <span class="userDatatable-title">Company Name</span>
                                    </th>
                                    
                                    <th>
                                        <span class="userDatatable-title">User Name</span>
                                    </th>
                                    <th>
                                        <span class="userDatatable-title">Email</span>
                                    </th>
                                    <th>
                                        <span class="userDatatable-title">Join Date</span>
                                    </th>
                                    <th>
                                        <span class="userDatatable-title">Status</span>
                                    </th>
                                    <th>
                                        <span class="userDatatable-title">Action</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="userTable">

                                @foreach($users as $user)
                                <tr data-name="{{ strtolower($user->name) }}" data-email="{{ strtolower($user->email) }}">
                                    <td><h6>{{ $user->name }}</h6></td>
                                  
                                    <td>{{ $user->userDetail->first_name }} {{ $user->userDetail->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        {{ $user->created_at ? $user->created_at->format('Y-m-d') : 'N/A' }}
                                    </td>
                                    <td>
                                        <div class="userDatatable-content d-inline-block">
                                            <span
                                                class="user-status bg-opacity-{{ $user->status === 1 ? 'success' : 'danger' }} color-{{ $user->status === 1 ? 'success' : 'danger' }} rounded-pill userDatatable-content-status {{ $user->status === 1 ? 'active' : 'danger' }}"
                                                id="status-label-{{ $user->id }}"
                                                data-user-id="{{ $user->id }}">
                                                {{ $user->status === 1 ? 'Active' : 'InActive' }}
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                            <li>
                                                <div id="global-loading" style="display: none;">
                                                    <img src="{{ asset('img/loading.gif') }}" alt="Loading">
                                                </div>

                                                <div class="form-check form-switch form-switch-primary form-switch-md">
                                                    <input
                                                        type="checkbox"
                                                        class="form-check-input status-switch"
                                                        id="switch-{{ $user->id }}"
                                                        data-user-id="{{ $user->id }}"
                                                        {{ $user->status == 1 ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="switch-{{ $user->id }}"></label>
                                                    <img
                                                        src="{{ asset('img/loading.gif') }}"
                                                        class="loading-gif"
                                                        id="loading-{{ $user->id }}"
                                                        style="display: none; width: 20px; height: 20px;"
                                                        alt="Loading"
                                                    >
                                                </div>
                                            </li>
                                            <li>
                                                <a href="{{ route('edit.user', $user->id) }}" class="edit"><i class="uil uil-edit"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{ route('user.delete', $user->id) }}" class="remove" id="delete" ><i class="uil uil-trash-alt"></i></a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="d-flex justify-content-end pt-30">
                        <nav class="dm-page ">
                            <ul class="dm-pagination d-flex">
                                <li class="dm-pagination__item">
                                    <a href="#" class="dm-pagination__link pagination-control"><span
                                            class="la la-angle-left"></span></a>
                                    <a href="#" class="dm-pagination__link"><span
                                            class="page-number">1</span></a>
                                    <a href="#" class="dm-pagination__link active"><span
                                            class="page-number">2</span></a>
                                    <a href="#" class="dm-pagination__link"><span
                                            class="page-number">3</span></a>
                                    <a href="#" class="dm-pagination__link pagination-control"><span
                                            class="page-number">...</span></a>
                                    <a href="#" class="dm-pagination__link"><span
                                            class="page-number">12</span></a>
                                    <a href="#" class="dm-pagination__link pagination-control"><span
                                            class="la la-angle-right"></span></a>
                                    <a href="#" class="dm-pagination__option">
                                    </a>
                                </li>
                                <li class="dm-pagination__item">
                                    <div class="paging-option">
                                        <select name="page-number" class="page-selection">
                                            <option value="20">20/page</option>
                                            <option value="40">40/page</option>
                                            <option value="60">60/page</option>
                                        </select>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        console.log('JavaScript and jQuery are ready.');

        $(document).on('change', '.status-switch', function () {
            console.log('Checkbox changed event triggered.');
            const userId = $(this).data('user-id');
            const status = $(this).is(':checked') ? 1 : 0;
            const csrfToken = $('meta[name="csrf-token"]').attr('content');
            console.log(`User ID: ${userId}, Status: ${status}, CSRF Token: ${csrfToken}`);

            // Get the global loading element
            const globalLoading = $('#global-loading');
            globalLoading.fadeIn(); // Show global loading GIF

            $.ajax({
                url: "{{ route('update.status') }}", // Laravel route helper
                method: 'POST',
                data: {
                    user_id: userId,
                    status: status,
                    _token: csrfToken,
                },
                success: function (response) {
                    console.log('Response:', response);

                    if (response.success) {
                        // Update the status label dynamically
                        const statusLabel = $(`#status-label-${userId}`);
                        const newClass = status === 1 ? 'bg-opacity-success color-success active' : 'bg-opacity-danger color-danger danger';
                        const newText = status === 1 ? 'Active' : 'InActive';

                        // Update the class and text
                        statusLabel
                            .attr('class', `user-status rounded-pill userDatatable-content-status ${newClass}`)
                            .text(newText);
                    }
                },
                error: function (xhr, status, error) {
                    console.error('AJAX error:', xhr.responseText);
                },
                complete: function () {
                    globalLoading.fadeOut(); // Hide global loading GIF
                }
            });
        });
    });
</script>

<script>
document.getElementById('searchInput').addEventListener('input', function () {
    const searchQuery = this.value.toLowerCase().trim(); // Lowercase and remove extra spaces
    const rows = document.querySelectorAll('#userTable tr'); // All rows in the table body

    rows.forEach(row => {
        const name = row.getAttribute('data-name') || ''; // Get 'data-name' attribute
        const email = row.getAttribute('data-email') || ''; // Get 'data-email' attribute

        if (searchQuery === '' || name.includes(searchQuery) || email.includes(searchQuery)) {
            row.style.display = ''; // Show the row
        } else {
            row.style.display = 'none'; // Hide the row
        }
    });
});
</script>
@endsection
