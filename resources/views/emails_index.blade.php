@extends('layouts.main')

@section('main-container')
<div class="contents">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-main user-member justify-content-sm-between">
                    <div class="d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                        <div class="d-flex align-items-center user-member__title justify-content-center me-sm-25">
                            <h4 class="text-capitalize fw-500 breadcrumb-title">Email List</h4>
                        </div>
                        <form action="/" class="d-flex align-items-center user-member__form my-sm-0 my-2">
                            <img src="img/svg/search.svg" alt="search" class="svg">
                            <input class="form-control me-sm-2 border-0 box-shadow-none" type="search" placeholder="Search by Subject" aria-label="Search">
                        </form>
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
                                        <span class="userDatatable-title">Email Subject</span>
                                    </th>
                                    <th>
                                        <span class="userDatatable-title">Email Description</span>
                                    </th>
                                    <th>
                                        <span class="userDatatable-title">Identifier Name</span>
                                    </th>
                                    <th>
                                        <span class="orderDatatable_actions ">Action</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($emails as $email)
                                    <tr>
                                        <td><h6>{{ $email->subject }}</h6></td>
                                        <td>{{ $email->description }}</td>
                                        <td>{{ $email->identifier_name }}</td>
                                        <td>
                                            <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                <li>
                                                    <a href="{{ route('emails.edit', $email->id) }}" class="edit"><i class="uil uil-edit"></i></a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('emails.destroy', $email->id) }}" class="remove" id="delete"><i class="uil uil-trash-alt"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No Emails Found</td>
                                    </tr>
                                @endforelse
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
