@extends('layouts.main')

@section('main-container')

<div class="contents">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex align-items-center user-member__title mb-30 mt-30">
                    <h4 class="text-capitalize">Add Email Details</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="user-info-tab w-100 bg-white global-shadow radius-xl mb-50">
                    <div class="tab-content" id="v-pills-tabContent">
                        <!-- Add Email Form -->
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <div class="row justify-content-center">
                                <div class="col-xxl-4 col-10">
                                    <div class="mt-sm-40 mb-sm-50 mt-20 mb-20">
                                        <div class="user-tab-info-title mb-sm-40 mb-20 text-capitalize">
                                            {{-- Optional Heading --}}
                                        </div>
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif

                                        <div class="edit-profile__body">
                                            <form action="{{ route('store.email') }}" method="post">
                                                @csrf <!-- CSRF token for security -->

                                                <div class="form-group mb-25">
                                                    <label for="identifier_name">Identifier Name</label>
                                                    <input type="text" class="form-control" id="identifier_name" name="identifier_name" placeholder="Unique identifier..." required>
                                                </div>

                                                <div class="form-group mb-25">
                                                    <label for="subject">Email Subject</label>
                                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter email subject..." required>
                                                </div>

                                                <div class="form-group mb-25">
                                                    <label for="description">Email Description</label>
                                                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter email description..." required></textarea>
                                                </div>

                                                <div class="button-group d-flex pt-20 justify-content-md-end justify-content-start">
                                                    <button class="btn btn-primary btn-default btn-squared text-capitalize radius-md shadow2 btn-sm" type="submit">Save Email</button>
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
    </div>
</div>

@endsection
