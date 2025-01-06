@extends('userlayout.main')

@section('main-container')

<div class="contents">
    <div class="support-ticket mt-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">Cases</h4>
                        <div class="breadcrumb-action justify-content-center flex-wrap">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><i
                                                class="uil uil-estate"></i>Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#">apps</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Cases</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-sm-6  col-ssm-12 mb-30">

                    <div class="ap-po-details ap-po-details--ticket radius-xl d-flex justify-content-between">
                        <div class="overview-content w-100">
                            <div class=" ap-po-details-content d-flex flex-wrap justify-content-between">
                                <div class="ap-po-details__titlebar">
                                    <h1>350</h1>
                                    <p>Pending Cases</p>
                                </div>
                                <div class="ap-po-details__icon-area">
                                    <div class="svg-icon order-bg-opacity-warning">
                                        <img class="svg" src="img/svg/clock-ticket1.svg" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xxl-3 col-sm-6  col-ssm-12 mb-30">

                    <div class="ap-po-details ap-po-details--ticket radius-xl d-flex justify-content-between">
                        <div class="overview-content w-100">
                            <div class=" ap-po-details-content d-flex flex-wrap justify-content-between">
                                <div class="ap-po-details__titlebar">
                                    <h1>30,825</h1>
                                    <p>Completed Cases</p>
                                </div>
                                <div class="ap-po-details__icon-area">
                                    <div class="svg-icon order-bg-opacity-success">
                                        <img class="svg" src="img/svg/check-circle1.svg" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-12">
                    <div class="support-ticket-system">
                        <div class="breadcrumb-main breadcrumb-main--ticket justify-content-sm-between ">
                            <div class=" d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                                <div
                                    class="d-flex align-items-center ticket__title justify-content-center me-md-25 mb-md-0 mb-20">
                                    <h4 class="text-capitalize fw-500 breadcrumb-title">All Cases</h4>
                                </div>
                            </div>
                            <div class="action-btn">
                        

                                <div class="modal fade ticket_modal" id="ticket_modal" role="dialog"
                                    tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content  radius-xl">
                                            <div class="modal-body pb-sm-50 pb-30">
                                                <div class="modal-header">
                                                    <h1>
                                                        Submit your Ticket
                                                    </h1>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <img src="img/svg/x.svg" alt="x" class="svg">
                                                    </button>
                                                </div>
                                                <div class="ticket_modal-modal">
                                                    <form>
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Subject</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Priority</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="High">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Status</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Open">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <textarea class="form-control" rows="3"></textarea>
                                                        </div>
                                                        <div class="button-group d-flex pt-15">
                                                            <button
                                                                class="btn btn-primary btn-default btn-squared ">Submit
                                                                ticket</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="support-form d-flex justify-content-between align-items-center flex-wrap">
                            <div class="support-form__input">
                                <div class="d-flex flex-wrap">
                                    <div class="support-form__input-id">
                                        <label>Id:</label>
                                        <div class="dm-select ">
                                            <select name="select-search" class="select-search form-control ">
                                                <option value="01">All</option>
                                                <option value="02">Option 2</option>
                                                <option value="03">Option 3</option>
                                                <option value="04">Option 4</option>
                                                <option value="05">Option 5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="support-form__input-status">
                                        <label>status:</label>
                                        <div class="dm-select ">
                                            <select name="select-search" class="select-search form-control ">
                                                <option value="01">All</option>
                                                <option value="02">Option 2</option>
                                                <option value="03">Option 3</option>
                                                <option value="04">Option 4</option>
                                                <option value="05">Option 5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="support-form__search">
                                <div class="support-order-search">
                                    <form action="/" class="support-order-search__form">
                                        <img src="img/svg/search.svg" alt="search" class="svg">
                                        <input class="form-control border-0 box-shadow-none" type="search"
                                            placeholder="Search" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="userDatatable userDatatable--ticket mt-1">
                            <div class="table-responsive">
                                <table class="table mb-0 table-borderless">
                                    <thead>
                                        <tr class="userDatatable-header">
                                            <th>
                                                <span class="userDatatable-title">ID</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">Requested By</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">Subject</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">Priority</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">Status</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">Created Date</span>
                                            </th>
                                            <th class="actions">
                                                <span class="userDatatable-title">Actions</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#12</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div
                                                        class="userDatatable__imgWrapper d-flex align-items-center">
                                                        <a href="#"
                                                            class="profile-image rounded-circle d-block m-0"
                                                            style="background-image:url('img/tm6.png'); background-size: cover;"></a>
                                                    </div>
                                                    <div class="userDatatable-inline-title">
                                                        <a href="#" class="text-dark fw-500">
                                                            <h6>Kellie Marquot</h6>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--subject">
                                                    Verify your new email address
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--priority">
                                                    High
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content d-inline-block">
                                                    <span
                                                        class="bg-opacity-success  color-success userDatatable-content-status active">open</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--date">
                                                    January 20, 2020
                                                </div>
                                            </td>
                                            <td>
                                                <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">

                                                    <li>
                                                        <a href="{{url('/usercaseview')}}" class="view">
                                                            <i class="uil uil-eye"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#13</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div
                                                        class="userDatatable__imgWrapper d-flex align-items-center">
                                                        <a href="#"
                                                            class="profile-image rounded-circle d-block m-0"
                                                            style="background-image:url('img/tm1.png'); background-size: cover;"></a>
                                                    </div>
                                                    <div class="userDatatable-inline-title">
                                                        <a href="#" class="text-dark fw-500">
                                                            <h6>Kellie Marquot</h6>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--subject">
                                                    Verify your new email address
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--priority">
                                                    High
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content d-inline-block">
                                                    <span
                                                        class="bg-opacity-warning  color-warning userDatatable-content-status active">pending</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--date">
                                                    January 20, 2020
                                                </div>
                                            </td>
                                            <td>
                                                <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                    <li>
                                                        <a href="{{url('/usercaseview')}}" class="view">
                                                            <i class="uil uil-eye"></i>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#14</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div
                                                        class="userDatatable__imgWrapper d-flex align-items-center">
                                                        <a href="#"
                                                            class="profile-image rounded-circle d-block m-0"
                                                            style="background-image:url('img/tm2.png'); background-size: cover;"></a>
                                                    </div>
                                                    <div class="userDatatable-inline-title">
                                                        <a href="#" class="text-dark fw-500">
                                                            <h6>Kellie Marquot</h6>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--subject">
                                                    Verify your new email address
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--priority">
                                                    High
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content d-inline-block">
                                                    <span
                                                        class="bg-opacity-danger  color-danger userDatatable-content-status active">close</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--date">
                                                    January 20, 2020
                                                </div>
                                            </td>
                                            <td>
                                                <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                    <li>
                                                        <a href="{{url('/usercaseview')}}" class="view">
                                                            <i class="uil uil-eye"></i>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#4</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div
                                                        class="userDatatable__imgWrapper d-flex align-items-center">
                                                        <a href="#"
                                                            class="profile-image rounded-circle d-block m-0"
                                                            style="background-image:url('img/tm3.png'); background-size: cover;"></a>
                                                    </div>
                                                    <div class="userDatatable-inline-title">
                                                        <a href="#" class="text-dark fw-500">
                                                            <h6>Kellie Marquot</h6>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--subject">
                                                    Verify your new email address
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--priority">
                                                    High
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content d-inline-block">
                                                    <span
                                                        class="bg-opacity-success  color-success userDatatable-content-status active">open</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--date">
                                                    January 20, 2020
                                                </div>
                                            </td>
                                            <td>
                                                <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                    <li>
                                                        <a href="{{url('/usercaseview')}}" class="view">
                                                            <i class="uil uil-eye"></i>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#5</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div
                                                        class="userDatatable__imgWrapper d-flex align-items-center">
                                                        <a href="#"
                                                            class="profile-image rounded-circle d-block m-0"
                                                            style="background-image:url('img/tm4.png'); background-size: cover;"></a>
                                                    </div>
                                                    <div class="userDatatable-inline-title">
                                                        <a href="#" class="text-dark fw-500">
                                                            <h6>Kellie Marquot</h6>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--subject">
                                                    Verify your new email address
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--priority">
                                                    High
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content d-inline-block">
                                                    <span
                                                        class="bg-opacity-success  color-success userDatatable-content-status active">open</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--date">
                                                    January 20, 2020
                                                </div>
                                            </td>
                                            <td>
                                                <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                    <li>
                                                        <a href="{{url('/usercaseview')}}" class="view">
                                                            <i class="uil uil-eye"></i>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#6</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div
                                                        class="userDatatable__imgWrapper d-flex align-items-center">
                                                        <a href="#"
                                                            class="profile-image rounded-circle d-block m-0"
                                                            style="background-image:url('img/tm5.png'); background-size: cover;"></a>
                                                    </div>
                                                    <div class="userDatatable-inline-title">
                                                        <a href="#" class="text-dark fw-500">
                                                            <h6>Kellie Marquot</h6>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--subject">
                                                    Verify your new email address
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--priority">
                                                    High
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content d-inline-block">
                                                    <span
                                                        class="bg-opacity-success  color-success userDatatable-content-status active">open</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--date">
                                                    January 20, 2020
                                                </div>
                                            </td>
                                            <td>
                                                <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                    <li>
                                                        <a href="{{url('/usercaseview')}}" class="view">
                                                            <i class="uil uil-eye"></i>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#7</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div
                                                        class="userDatatable__imgWrapper d-flex align-items-center">
                                                        <a href="#"
                                                            class="profile-image rounded-circle d-block m-0"
                                                            style="background-image:url('img/tm6.png'); background-size: cover;"></a>
                                                    </div>
                                                    <div class="userDatatable-inline-title">
                                                        <a href="#" class="text-dark fw-500">
                                                            <h6>Kellie Marquot</h6>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--subject">
                                                    Verify your new email address
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--priority">
                                                    High
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content d-inline-block">
                                                    <span
                                                        class="bg-opacity-success  color-success userDatatable-content-status active">open</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--date">
                                                    January 20, 2020
                                                </div>
                                            </td>
                                            <td>
                                                <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                    <li>
                                                        <a href="{{url('/usercaseview')}}" class="view">
                                                            <i class="uil uil-eye"></i>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#8</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div
                                                        class="userDatatable__imgWrapper d-flex align-items-center">
                                                        <a href="#"
                                                            class="profile-image rounded-circle d-block m-0"
                                                            style="background-image:url('img/tm1.png'); background-size: cover;"></a>
                                                    </div>
                                                    <div class="userDatatable-inline-title">
                                                        <a href="#" class="text-dark fw-500">
                                                            <h6>Kellie Marquot</h6>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--subject">
                                                    Verify your new email address
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--priority">
                                                    High
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content d-inline-block">
                                                    <span
                                                        class="bg-opacity-success  color-success userDatatable-content-status active">open</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--date">
                                                    January 20, 2020
                                                </div>
                                            </td>
                                            <td>
                                                <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                    <li>
                                                        <a href="{{url('/usercaseview')}}" class="view">
                                                            <i class="uil uil-eye"></i>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#9</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div
                                                        class="userDatatable__imgWrapper d-flex align-items-center">
                                                        <a href="#"
                                                            class="profile-image rounded-circle d-block m-0"
                                                            style="background-image:url('img/tm2.png'); background-size: cover;"></a>
                                                    </div>
                                                    <div class="userDatatable-inline-title">
                                                        <a href="#" class="text-dark fw-500">
                                                            <h6>Kellie Marquot</h6>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--subject">
                                                    Verify your new email address
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--priority">
                                                    High
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content d-inline-block">
                                                    <span
                                                        class="bg-opacity-success  color-success userDatatable-content-status active">open</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--date">
                                                    January 20, 2020
                                                </div>
                                            </td>
                                            <td>
                                                <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                    <li>
                                                        <a href="{{url('/usercaseview')}}" class="view">
                                                            <i class="uil uil-eye"></i>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#10</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div
                                                        class="userDatatable__imgWrapper d-flex align-items-center">
                                                        <a href="#"
                                                            class="profile-image rounded-circle d-block m-0"
                                                            style="background-image:url('img/tm3.png'); background-size: cover;"></a>
                                                    </div>
                                                    <div class="userDatatable-inline-title">
                                                        <a href="#" class="text-dark fw-500">
                                                            <h6>Kellie Marquot</h6>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--subject">
                                                    Verify your new email address
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--priority">
                                                    High
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content d-inline-block">
                                                    <span
                                                        class="bg-opacity-success  color-success userDatatable-content-status active">open</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--date">
                                                    January 20, 2020
                                                </div>
                                            </td>
                                            <td>
                                                <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                    <li>
                                                        <a href="{{url('/usercaseview')}}" class="view">
                                                            <i class="uil uil-eye"></i>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#11</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div
                                                        class="userDatatable__imgWrapper d-flex align-items-center">
                                                        <a href="#"
                                                            class="profile-image rounded-circle d-block m-0"
                                                            style="background-image:url('img/tm4.png'); background-size: cover;"></a>
                                                    </div>
                                                    <div class="userDatatable-inline-title">
                                                        <a href="#" class="text-dark fw-500">
                                                            <h6>Kellie Marquot</h6>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--subject">
                                                    Verify your new email address
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--priority">
                                                    High
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content d-inline-block">
                                                    <span
                                                        class="bg-opacity-success  color-success userDatatable-content-status active">open</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--date">
                                                    January 20, 2020
                                                </div>
                                            </td>
                                            <td>
                                                <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                    <li>
                                                        <a href="{{url('/usercaseview')}}" class="view">
                                                            <i class="uil uil-eye"></i>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end pt-30">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
