@include('layouts.header')

<main class="main-content" style="margin-top: -5%;">
    <div class="admin">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xxl-3 col-xl-4 col-md-6 col-sm-8">
                    <div class="edit-profile">
                        <div class="edit-profile__logos">
                            <a href="index.html">
                                <img class="dark" src="img/logo-dark.png" alt>
                                <img class="light" src="img/logo-white.png" alt>
                            </a>
                        </div>
                        <div class="card border-0">
                            <div class="card-header">
                                <div class="edit-profile__title">
                                    <h6>Change Password</h6>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="edit-profile__body">
                                    <!-- Update Password Form -->
                                    <form action="{{ route('password.user.update', ['id' => $user->id]) }}" method="POST">
                                        @csrf
                                        <div class="form-group mb-15">
                                            <label for="password-field">New Password</label>
                                            <div class="position-relative">
                                                <input id="new-password-field" type="password" class="form-control"
                                                    name="password" placeholder="Enter new password" required>
                                                <div
                                                    class="uil uil-eye-slash text-lighten fs-15 field-icon toggle-password2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-15">
                                            <label for="password-confirmation-field">Confirm Password</label>
                                            <div class="position-relative">
                                                <input id="password-confirmation-field" type="password" class="form-control"
                                                    name="password_confirmation" placeholder="Confirm new password" required>
                                                <div
                                                    class="uil uil-eye-slash text-lighten fs-15 field-icon toggle-password2">
                                                </div>
                                            </div>
                                        </div>

                                        <div
                                            class="admin__button-group button-group d-flex pt-1 justify-content-md-start justify-content-center">
                                            <button
                                                class="btn btn-primary btn-default w-100 btn-squared text-capitalize lh-normal px-50 signIn-createBtn">
                                                Update Password
                                            </button>
                                        </div>
                                    </form>
                                    <!-- End Form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

{{-- @include('layouts.footer') --}}
<script src="{{ url('js/plugins.min.js') }}"></script>
<script src="{{ url('js/script.min.js') }}"></script>
