@extends('layouts.main')

@section('main-container')

<div class="contents">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex align-items-center user-member__title mb-30 mt-30">
                    <h4 class="text-capitalize">Add Employee</h4>
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
                                <div class="col-xxl-8 col-10">
                                    <div class="mt-sm-40 mb-sm-50 mt-20 mb-20">
                                        <div class="user-tab-info-title mb-sm-40 mb-20 text-capitalize">
                                            <h5 class="fw-500">Employee Information</h5>
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
                                            <form action="{{ route('store.employee') }}" method="post">
                                                @csrf <!-- CSRF token for security -->

                                                <div class="row">
                                                    <div class="form-group mb-25 col-md-6">
                                                        <label for="account_owner">Company Name</label>
                                                        <input type="text" class="form-control" id="account_owner" name="account_owner" placeholder="Company Name" required>
                                                    </div>

                                                    <div class="form-group mb-25 col-md-6">
                                                        <label for="email">Email</label>
                                                        <input type="email" class="form-control" id="email" name="email" placeholder="email@email.com" required>
                                                    </div>

                                                    <div class="form-group mb-25 col-md-6">
                                                        <label for="first_name">First Name</label>
                                                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required>
                                                    </div>

                                                    <div class="form-group mb-25 col-md-6">
                                                        <label for="last_name">Last Name</label>
                                                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
                                                    </div>

                                                    <div class="form-group mb-25 col-md-6">
                                                        <label for="address">Address</label>
                                                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
                                                    </div>

                                                    <div class="form-group mb-25 col-md-6">
                                                        <label for="suite">Suite #</label>
                                                        <input type="text" class="form-control" id="suite" name="suite" placeholder="Enter Suite">
                                                    </div>

                                                    <div class="form-group mb-25 col-md-6">
                                                        <label for="city">City</label>
                                                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
                                                    </div>

                                                    <div class="form-group mb-25 col-md-6">
                                                        <label for="state">State</label>
                                                        <input type="text" class="form-control" id="state" name="state" placeholder="Enter State">
                                                    </div>

                                                    <div class="form-group mb-25 col-md-6">
                                                        <label for="zipcode">ZipCode</label>
                                                        <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Enter ZipCode">
                                                    </div>


                                                    <div class="form-group mb-25 col-md-6">
                                                        <label for="country">Country</label>
                                                        <input type="text" class="form-control" id="country" name="country" value="United States" placeholder="Enter Country">
                                                    </div>



                                                    <div class="form-group mb-25 col-md-6">
                                                        <label for="phone">Phone Number</label>
                                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="+1 212 555 1212">
                                                    </div>

                                                    <div class="form-group mb-25 col-md-6">
                                                        <label for="cell_phone_number">Cell Phone Number</label>
                                                        <input type="tel" class="form-control" id="cell_phone_number" name="cell_phone_number" placeholder="+1 212 555 1212">
                                                    </div>

                                                    <div class="form-group mb-25 col-md-6">
                                                        <label for="website_url">Website</label>
                                                        <input type="text" class="form-control" id="website_url" name="website_url" placeholder="Website URL">
                                                    </div>

                                                    <div class="form-group mb-25 col-md-6">
                                                        <label for="fax">Fax</label>
                                                        <input type="tel" class="form-control" id="fax" name="fax" placeholder="+440 2546 5236">
                                                    </div>

                                                    <div class="form-group mb-25 col-md-12">
                                                        <label for="description">Description</label>
                                                        <textarea class="form-control" id="description" name="description" placeholder="Company Description" rows="4"></textarea>
                                                    </div>
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
