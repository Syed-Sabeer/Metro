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
                                    <h6>User Login</h6>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="edit-profile__body">
                                    <form action="{{ route('login.user.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group mb-25">
                                            <label for="username">Username or Email Address</label>
                                            <input type="email" class="form-control" id="username" name="email"
                                                placeholder="name@example.com" required>
                                        </div>
                                        <div class="form-group mb-15">
                                            <label for="password-field">Password</label>
                                            <div class="position-relative">
                                                <input id="password-field" type="password" class="form-control" name="password"
                                                    placeholder="Password" required>
                                                <div
                                                    class="uil uil-eye-slash text-lighten fs-15 field-icon toggle-password2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="admin-condition">
                                            <div class="checkbox-theme-default custom-checkbox ">
                                                <input class="checkbox" type="checkbox" id="check-1" name="remember">
                                                <label for="check-1">
                                                    <span class="checkbox-text">Keep me logged in</span>
                                                </label>
                                            </div>
                                            <a href="forget-password.html">Forget password?</a>
                                        </div>
                                        <div
                                            class="admin__button-group button-group d-flex pt-1 justify-content-md-start justify-content-center">
                                            <button
                                                class="btn btn-primary btn-default w-100 btn-squared text-capitalize lh-normal px-50 signIn-createBtn ">
                                                Sign In
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="admin-topbar">
                                <p class="mb-0">
                                    Don't have an account?
                                    <a href="sign-up.html" class="color-primary">
                                        Sign up
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@include('layouts.footer')
