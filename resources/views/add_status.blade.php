@extends('layouts.main')

@section('main-container')

    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex align-items-center user-member__title mb-30 mt-30">
                        <h4 class="text-capitalize">Add Status Name</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="user-info-tab w-100 bg-white global-shadow radius-xl mb-50">
                        <div class="tab-content" id="v-pills-tabContent">
                            <!-- Personal Info Tab -->
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                aria-labelledby="v-pills-home-tab">
                                <div class="row justify-content-center">
                                    <div class="col-xxl-4 col-10">
                                        <div class="mt-sm-40 mb-sm-50 mt-20 mb-20">
                                            <div class="user-tab-info-title mb-sm-40 mb-20 text-capitalize">
                                                {{-- <h5 class="fw-500">Personal Information</h5> --}}
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
                                                <form action="{{ route('store.status') }}" method="post">
                                                    @csrf <!-- CSRF token for security -->

                                                    <div class="form-group mb-25">
                                                        <label for="status_name">Status Name</label>
                                                        <input type="text" class="form-control" id="status_name"
                                                            name="status_name" placeholder="New.." required>
                                                    </div>

                                                    <div class="form-group mb-25">
                                                        <label for="status_number">Status Serial Number</label>
                                                        <input type="number" class="form-control" id="status_number"name="status_number" placeholder="1" required>
                                                    </div>





                                                    <div class="button-group d-flex pt-20 justify-content-md-end justify-content-start">

                                                        <button
                                                            class="btn btn-primary btn-default btn-squared text-capitalize radius-md shadow2 btn-sm"
                                                            type="submit">Save Status</button>
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
