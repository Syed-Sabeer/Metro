@extends('layouts.main')

@section('main-container')

<div class="contents">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex align-items-center user-member__title mb-30 mt-30">
                    <h4 class="text-capitalize">Add User</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="user-info-tab w-100 bg-white global-shadow radius-xl mb-50">
                    <div class="tab-content" id="v-pills-tabContent">
                        <!-- Personal Info Tab -->
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="row justify-content-center">
                                <div class="col-xxl-4 col-10">
                                    <div class="mt-sm-40 mb-sm-50 mt-20 mb-20">
                                        <div class="user-tab-info-title mb-sm-40 mb-20 text-capitalize">
                                            <h5 class="fw-500">Personal Information</h5>
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
                                            <form  method="POST">
                                                @csrf  <!-- CSRF token for security -->

                                                <div class="form-group mb-25">
                                                    <label for="account_owner">Account Owner</label>
                                                    <input type="text" class="form-control" id="account_owner" name="account_owner" placeholder="Duran Clayton" required>
                                                </div>

                                                <div class="form-group mb-25">
                                                    <label for="account_name">Account Name</label>
                                                    <input type="text" class="form-control" id="account_name" name="account_name" placeholder="Duran Clayton" required>
                                                </div>
                                                <div class="form-group mb-25">
                                                    <label for="account_name">Email</label>
                                                    <input type="text" class="form-control" id="email" name="email" placeholder="email@gmail.com" required>
                                                </div>

                                                <div class="form-group mb-25">
                                                    <label for="parent_account">Parent Account</label>
                                                    <input type="email" class="form-control" id="parent_account" name="parent_account" placeholder="sample@email.com" required>
                                                </div>

                                                <div class="form-group mb-25">
                                                    <label for="phone">Phone</label>
                                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="+440 2546 5236" required>
                                                </div>

                                                <div class="form-group mb-25">
                                                    <label for="fax">Fax</label>
                                                    <input type="tel" class="form-control" id="fax" name="fax" placeholder="+440 2546 5236" required>
                                                </div>

                                                <div class="form-group mb-25">
                                                    <label for="website">Website</label>
                                                    <input type="url" class="form-control" id="website" name="website" placeholder="www.website.com" required>
                                                </div>

                                                <div class="form-group mb-25">
                                                    <label for="password">Password</label>
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="********" required>
                                                </div>

                                                <div class="form-group mb-25">
                                                    <label for="password_confirmation">Reenter Password</label>
                                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="********" required>
                                                </div>

                                                <div class="user-tab-info-title mb-40 text-capitalize">
                                                    <h5 class="fw-500">Additional Information</h5>
                                                </div>

                                                <div class="form-group mb-25">
                                                    <label for="type">Type</label>
                                                    <input type="text" class="form-control" id="type" name="type" placeholder="Business Type" required>
                                                </div>

                                                <div class="form-group mb-25">
                                                    <label for="employees">Employees</label>
                                                    <input type="number" class="form-control" id="employees" name="employees" placeholder="100" required>
                                                </div>

                                                <div class="form-group mb-25">
                                                    <label for="industry">Industry</label>
                                                    <input type="text" class="form-control" id="industry" name="industry" placeholder="Technology" required>
                                                </div>

                                                <div class="form-group mb-25">
                                                    <label for="annual_revenue">Annual Revenue</label>
                                                    <input type="number" step="0.01" class="form-control" id="annual_revenue" name="annual_revenue" placeholder="500000" required>
                                                </div>

                                                <div class="form-group mb-25">
                                                    <label for="description">Description</label>
                                                    <input type="text" class="form-control" id="description" name="description" placeholder="Company Description" required>
                                                </div>

                                                <div class="user-tab-info-title mb-40 text-capitalize">
                                                    <h5>Address Information</h5>
                                                </div>

                                                <div class="form-group mb-25">
                                                    <label for="billing_address">Billing Address</label>
                                                    <input type="text" class="form-control" id="billing_address" name="billing_address" placeholder="123 Street, City, Country" required>
                                                </div>

                                                <div class="form-group mb-25">
                                                    <label for="shipping_address">Shipping Address</label>
                                                    <input type="text" class="form-control" id="shipping_address" name="shipping_address" placeholder="456 Avenue, City, Country" required>
                                                </div>

                                                <div class="button-group d-flex pt-20 justify-content-md-end justify-content-start">

                                                    <button class="btn btn-primary btn-default btn-squared text-capitalize radius-md shadow2 btn-sm" type="submit">Save Profile</button>
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
