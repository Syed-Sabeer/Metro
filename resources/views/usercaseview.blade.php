@extends('userlayout.main')

@section('main-container')

<div class="contents">
    <div class="support-details mt-xl-20">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">Tickets Details</h4>
                        <div class="breadcrumb-action justify-content-center flex-wrap">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><i
                                                class="uil uil-estate"></i>Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#">apps</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tickets</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="back-page">
                        <a href="support-ticket.html"><img src="img/svg/arrow-left.svg" alt="arrow-left"
                                class="svg">
                            go back</a>
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12 mb-30">
                    <div class="ticket-details-contact">
                        <h4>Need to help for adding new contact</h4>
                        <div class="ticket-details-contact__ift">
                            <div class="ticket-details-contact__ift-wrapper">
                                <span class="ticket-details-contact__ift-rule">Requested By:</span>
                                <div class="ticket-details-contact__ift-namTitle">
                                    <img src="img/tdi.png" alt="tdi.png">
                                    <h6>Kellie Marquot</h6>
                                </div>
                            </div>
                            <div class="ticket-details-contact__ift-wrapper">
                                <span class="ticket-details-contact__ift-rule">Created Date</span>
                                <div class="ticket-details-contact__ift-namTitle">
                                    <h6>January 20, 2020</h6>
                                </div>
                            </div>
                            <div class="ticket-details-contact__ift-wrapper">
                                <span class="ticket-details-contact__ift-rule">Updated Date</span>
                                <div class="ticket-details-contact__ift-namTitle">
                                    <h6>February 02, 2020</h6>
                                </div>
                            </div>
                        </div>
                        <div class="ticket-details-contact__status">
                            <div class="ticket-details-contact__status-item">
                                <label>Priority</label>
                                <div class="dm-select">
                                    <select name="select-search" class="select-search form-control">
                                        <option value="01">All</option>
                                        <option value="02">Easy</option>
                                        <option value="03" selected>Meduim</option>
                                        <option value="04">Option 4</option>
                                        <option value="05">Option 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="ticket-details-contact__status-item">
                                <label>Status</label>
                                <div class="dm-select ">
                                    <select name="select-search" class="select-search form-control">
                                        <option value="01">All</option>
                                        <option value="02">deactivate</option>
                                        <option value="03" selected>open</option>
                                        <option value="04">close</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="ticket-details-contact__overview">
                            <h4 class="ticket-details-contact__overview-title">Overview :</h4>
                            <p>There are have a many variations of passages of Lorem Ipsum available, but the
                                randomised
                                words which don't look even slightly believable. If you are going to sdsss
                                embarrassing
                                hidden in the middle of text. All the Lorem Ipsum generators on the Internet
                                tend</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-30">
                    <div class="ticket-file-attach">
                        <h4>File Attachment </h4>
                        <div class="ticket-file-attach__wrapper">
                            <div class="ticket-file-attach__items">
                                <div class="ticket-file-attach__items_detail">
                                    <img src="img/pdf.png" alt="pdf.png">
                                    <div class="div">
                                        <h6>Product-guidelines.pdf</h6>
                                        <span>7.05 MB</span>
                                    </div>
                                </div>
                                <div class="ticket-file-attach__items_download">
                                    <a href="#">
                                        <img src="img/svg/download.svg" alt="download" class="svg">
                                    </a>
                                </div>
                            </div>
                            <div class="ticket-file-attach__items">
                                <div class="ticket-file-attach__items_detail">
                                    <img src="img/zip.png" alt="zip.png">
                                    <div class="div">
                                        <h6>Main-admin-design.zip</h6>
                                        <span>522 KB</span>
                                    </div>
                                </div>
                                <div class="ticket-file-attach__items_download">
                                    <a href="#">
                                        <img src="img/svg/download.svg" alt="download" class="svg">
                                    </a>
                                </div>
                            </div>
                            <div class="ticket-file-attach__items">
                                <div class="ticket-file-attach__items_detail">
                                    <img src="img/psd.png" alt="psd">
                                    <div class="div">
                                        <h6>Admin-wireframe.psd</h6>
                                        <span>5 MB</span>
                                    </div>
                                </div>
                                <div class="ticket-file-attach__items_download">
                                    <a href="#">
                                        <img src="img/svg/download.svg" alt="download" class="svg">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mb-50">
                    <div class="ticket-chat-wrapper pt-25 pb-30">
                        <h4>Conversation</h4>
                        <div class="ticket-search-body">
                            <ul class="ticket-user-list pe-15">
                                <li class="ticket-user-list-item">
                                    <div class="ticket-user-list-item__wrapper">
                                        <div class="avatar avatar-circle ms-0">
                                            <img src="img/ellipse11.png"
                                                class="rounded-circle  d-flex bg-opacity-primary" alt="image">
                                        </div>
                                        <div class="ticket-users-list-body">
                                            <div class="ticket-users-list-body-title">
                                                <h6>Kellie Marquot</h6>
                                                <div class="text-limit" data-maxlength="10">
                                                    <p class="mb-0">There are have a many variations of
                                                        passages.</p>
                                                </div>
                                            </div>
                                            <div class="last-chat-time unread">
                                                <small>1 hour ago</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="ticket-user-list-item">
                                    <div class="ticket-user-list-item__wrapper">
                                        <div class="avatar avatar-circle ms-0">
                                            <img src="img/ellipse2.png"
                                                class="rounded-circle  d-flex bg-opacity-primary" alt="image">
                                        </div>
                                        <div class="ticket-users-list-body">
                                            <div class="ticket-users-list-body-title">
                                                <h6>Daniel Pink</h6>
                                                <div class="text-limit" data-maxlength="10">
                                                    <p class="mb-0">There are have a many.</p>
                                                </div>
                                            </div>
                                            <div class="last-chat-time unread">
                                                <small>7 hour ago</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="ticket-user-list-item">
                                    <div class="ticket-user-list-item__wrapper">
                                        <div class="avatar avatar-circle ms-0">
                                            <img src="img/ellipse3.png"
                                                class="rounded-circle  d-flex bg-opacity-primary" alt="image">
                                        </div>
                                        <div class="ticket-users-list-body">
                                            <div class="ticket-users-list-body-title">
                                                <h6>Kellie Marquot</h6>
                                                <div class="text-limit" data-maxlength="10">
                                                    <p class="mb-0">All the Lorem Ipsum generators on the
                                                        Internet tend There are have a many variations of
                                                        passages.</p>
                                                </div>
                                            </div>
                                            <div class="last-chat-time unread">
                                                <small>1 hour ago</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="ticket-user-list-item">
                                    <div class="ticket-user-list-item__wrapper">
                                        <div class="avatar avatar-circle ms-0">
                                            <img src="img/ellipse1.png"
                                                class="rounded-circle  d-flex bg-opacity-primary" alt="image">
                                        </div>
                                        <div class="ticket-users-list-body">
                                            <div class="ticket-users-list-body-title">
                                                <h6>Meyri Carles</h6>
                                                <div class="text-limit" data-maxlength="10">
                                                    <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                            amet</span>...</p>
                                                </div>
                                            </div>
                                            <div class="last-chat-time unread">
                                                <small>1 hour ago</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="ticket-search-header">
                            <form action="/" class="d-flex align-items-center">
                                <img class="svg" src="img/svg/smile.svg" alt="smile">
                                <input class="form-control me-sm-2 border-0 box-shadow-none" type="search"
                                    placeholder="Type your message..." aria-label="Search">
                            </form>
                            <button type="button" class="border-0 btn-primary wh-50 p-10 rounded-circle">
                                <img class="svg" src="img/svg/send.svg" alt="send">
                            </button>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
