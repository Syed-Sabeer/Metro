@extends('layouts.main')

@section('main-container')
    <div class="contents">
        <div class="dm-page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">Notification</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><i class="uil uil-estate"></i>Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">List</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card card-default card-md mb-4">
                            <div class="card-header">
                                <h6>Unread Notifications</h6>
                            </div>
                            <div class="card-body">
                                <div class="list-box">
                                    <ul>
                                        @forelse ($unreadNotifications as $notification)
                                            <a href="{{ route('notifications.markAsRead', $notification->id) }}"
                                               class="text-decoration-none">
                                                <li class="list-box__item d-flex justify-content-between align-items-center">
                                                    <span>{{ $notification->message }}</span>
                                                </li>
                                            </a>
                                        @empty
                                            <li class="list-box__item">
                                                <span>No unread notifications</span>
                                            </li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="card card-default card-md mb-4">
                            <div class="card-header">
                                <h6>Read Notifications</h6>
                            </div>
                            <div class="card-body">
                                <div class="list-box">
                                    <ul>
                                        @forelse ($readNotifications as $notification)
                                            <li class="list-box__item d-flex justify-content-between align-items-center">
                                                <span>{{ $notification->message }}</span>

                                                <a href="{{ route('notifications.delete', $notification->id) }}"
                                                   class="btn btn-sm text-danger" id="delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </li>
                                        @empty
                                            <li class="list-box__item">
                                                <span>No read notifications</span>
                                            </li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
