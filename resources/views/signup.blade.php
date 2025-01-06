
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
                                    <h6>Sign Up HexaDash</h6>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="edit-profile__body">
                                    <div class="edit-profile__body">
                                        <div class="form-group mb-20">
                                            <label for="name">name</label>
                                            <input type="text" class="form-control" id="name"
                                                placeholder="Full Name">
                                        </div>
                                        <div class="form-group mb-20">
                                            <label for="username">username</label>
                                            <input type="text" class="form-control" id="username"
                                                placeholder="Username">
                                        </div>
                                        <div class="form-group mb-20">
                                            <label for="email">Email Adress</label>
                                            <input type="text" class="form-control" id="email"
                                                placeholder="name@example.com">
                                        </div>
                                        <div class="form-group mb-15">
                                            <label for="password-field">password</label>
                                            <div class="position-relative">
                                                <input id="password-field" type="password" class="form-control"
                                                    name="password" placeholder="Password">
                                                <div
                                                    class="uil uil-eye-slash text-lighten fs-15 field-icon toggle-password2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="admin-condition">
                                            <div class="checkbox-theme-default custom-checkbox ">
                                                <input class="checkbox" type="checkbox" id="admin-1">
                                                <label for="admin-1">
                                                    <span class="checkbox-text">Creating an account means you’re
                                                        okay
                                                        with our <a href="#" class="color-primary">Terms of
                                                            Service</a> and <a href="#"
                                                            class="color-primary">Privacy
                                                            Policy</a>
                                                        my preference</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div
                                            class="admin__button-group button-group d-flex pt-1 justify-content-md-start justify-content-center">
                                            <button
                                                class="btn btn-primary btn-default w-100 btn-squared text-capitalize lh-normal px-50 signIn-createBtn ">
                                                Create Account
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="px-20">
                                <p class="social-connector social-connector__admin text-center">
                                    <span>Or</span>
                                </p>
                                <div class="button-group d-flex align-items-center justify-content-center">
                                    <ul class="admin-socialBtn">
                                        <li>
                                            <button class="btn text-dark google">
                                                <img class="svg" src="img/google-Icon.svg" alt="img" />
                                            </button>
                                        </li>
                                        <li>
                                            <button class=" radius-md wh-48 content-center facebook">
                                                <i class="uil uil-facebook-f"></i>
                                            </button>
                                        </li>
                                        <li>
                                            <button class="radius-md wh-48 content-center twitter">
                                                <i class="uil uil-twitter"></i>
                                            </button>
                                        </li>
                                        <li>
                                            <button class="radius-md wh-48 content-center github">
                                                <i class="uil uil-github"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="admin-topbar">
                                <p class="mb-0">
                                    Don't have an account?
                                    <a href="login.html" class="color-primary">
                                        Sign In
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
