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
                            <h4 class="text-capitalize fw-500 breadcrumb-title">Employee list </h4>
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
                                    
                                    <td>{{ $user->userDetail?->first_name ?? '' }} {{ $user->userDetail?->last_name ?? '' }}</td>

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
