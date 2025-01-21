@extends('layouts.main')

@section('main-container')
<div class="contents">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-main user-member">
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        <!-- Status List Left Aligned -->
                        <div class="user-member__title">
                            <h4 class="text-capitalize fw-500 breadcrumb-title">Status List</h4>
                        </div>
                    </div>
                    <div class="action-btn">
                    <!-- Add Status Right Aligned -->
                    <a href="{{ route('add.status') }}" class="btn btn-primary"><i class="las la-plus fs-16"></i>Add Status</a>
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
                                        <span class="userDatatable-title">Status Name</span>
                                    </th>
                                    <th>
                                        <span class="userDatatable-title">Status Number</span>
                                    </th>
                                    <th>
                                        <span class="userDatatable-title">Status Color</span>
                                    </th>
                                    <th>
                                        <span class="userDatatable-title">Action</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($status as $item)
                                    <tr>
                                        <td><h6>{{ $item->status_name }}</h6></td>
                                        <td>{{ $item->status_number }}</td>
                                        <td><div style="width: 20px; height: 20px; background-color: {{ $item->status_color_code }};"></div> </td>
                                        <td>
                                            <ul class="orderDatatable_actions">
                                                <li>
                                                    <a href="{{ route('status.edit', $item->id) }}" class="edit"><i class="uil uil-edit"></i></a>
                                                </li>
                                                {{-- <li>
                                                    <a href="{{ route('status.delete', $item->id) }}" class="remove" id="delete"><i class="uil uil-trash-alt"></i></a>
                                                </li> --}}
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- Pagination section, uncomment if dynamic pagination is needed --}}
                    {{-- <div class="d-flex justify-content-end pt-30">
                        <nav class="dm-page">
                            <ul class="dm-pagination d-flex">
                                <li class="dm-pagination__item">
                                    <a href="#" class="dm-pagination__link pagination-control"><span class="la la-angle-left"></span></a>
                                    <a href="#" class="dm-pagination__link"><span class="page-number">1</span></a>
                                    <a href="#" class="dm-pagination__link active"><span class="page-number">2</span></a>
                                    <a href="#" class="dm-pagination__link"><span class="page-number">3</span></a>
                                    <a href="#" class="dm-pagination__link pagination-control"><span class="page-number">...</span></a>
                                    <a href="#" class="dm-pagination__link"><span class="page-number">12</span></a>
                                    <a href="#" class="dm-pagination__link pagination-control"><span class="la la-angle-right"></span></a>
                                    <a href="#" class="dm-pagination__option"></a>
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

@endsection
