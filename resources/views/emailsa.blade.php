@extends('layouts.main')

<style>
</style>
@section('main-container')
    <div class="contents">
        <div class="dm-page-content">
            <div class="container-fluid">
                <div class="mailbox-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-main">
                                <h4 class="text-capitalize breadcrumb-title">Inbox</h4>
                                <div class="breadcrumb-action justify-content-center flex-wrap">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#"><i
                                                        class="uil uil-estate"></i>Emaill</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Inbox</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <aside class="mailbox-sidebar-container">
                                <div class="dm-mail-sidebar show mb-30">
                                    <div class="card">
                                        <a href="#" class="mailbar-cross d-md-none">
                                            <img src="img/svg/x.svg" alt="x" class="svg">
                                        </a>
                                        <div class="card-body">
                                            <div class="d-flex align-content-center content-center px-15">
                                                <a href="#"
                                                    class="btn-compose btn btn-md btn-primary btn-shadow-primary"
                                                    data-trigger="compose"> <img src="img/svg/plus.svg" alt="plus"
                                                        class="svg"> Template</a>
                                            </div>

                                            <span class="mail-list-title mt-35">Label</span>
                                            <ul class="mail-list mt-0">
                                                <li><a href="#"><img class="svg" src="img/svg/list.svg"
                                                            alt="list">Personal</a></li>
                                                <li><a href="#"><img class="svg" src="img/svg/list.svg"
                                                            alt="list">Social</a></li>
                                                <li><a href="#"><img class="svg" src="img/svg/list.svg"
                                                            alt="list">Promotion</a></li>
                                            </ul>
                                            <div class="btn-add-label" data-trigger="label">
                                                <span class="cursor-true"><img src="img/svg/plus.svg" alt="plus"
                                                        class="svg">Add New Label</span>
                                                <div class="add-lebel-from">
                                                    <form action="#">
                                                        <h6>Add New Label</h6>
                                                        <input type="text" class="form-control" name="label"
                                                            Placeholder="Enter label name">
                                                        <div class="label-action d-flex button-group">
                                                            <button class="btn btn-primary btn-sm btn-squared">Add
                                                                Label</button>
                                                            <button class="btn btn-white btn-sm btn-squared label-close"
                                                                data-trigger="label">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                        </div>

                        <div class="col-lg-10">
                            <div class="mailbar-toggle d-md-none">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <div class="mailbox-container mb-30">
                                <div class="mail-read-wrapper">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="mailbox-top d-flex justify-content-between align-items-center">




                                            </div>
                                            <div class="mail-read-content">
                                                <div class="mail-details">
                                                    <div class="mail-details__top d-flex justify-content-between">
                                                        <h2 class="mail-details__title">
                                                            <span>Email subject lorem ipsum</span>
                                                            <span
                                                                class="badge badge-primary badge-transparent badge-round">Inbox</span>
                                                        </h2>

                                                    </div>
                                                    <div class="mail-details__content mdc media">

                                                        <div class="mdc__right media-body">
                                                            <div class="mdc__head d-flex justify-content-between">

                                                                <div class="form-group select-px-15 tagSelect-rtl">
                                                                    <label class="il-gray fs-14 fw-500 align-center mb-10">Example
                                                                    multiple select</label>
                                                                    <div class="dm-select ">
                                                                    <select name="select-tag2" id="select-tag2" class="form-control " multiple="multiple">
                                                                    <option value="01">Option 1</option>
                                                                    <option value="02">Option 2</option>
                                                                    <option value="03">Option 3</option>
                                                                    <option value="04">Option 4</option>
                                                                    <option value="05">Option 5</option>
                                                                    </select>
                                                                    </div>
                                                                    </div>
                                                            </div>
                                                            <div class="mdc__body">
                                                                <h6>Hello Adam,</h6>
                                                                <p>
                                                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                                                                    sed diam nonumy eirmod tempor invidunt
                                                                    ulabore etdolore magna aliquyam erat, sed diam voluptua.
                                                                    Atvero eos etaccusam justo duo dolores et
                                                                    ea rebum. Stet clita kasd gubergren nosea takimata
                                                                    sanctus est Lorem ipsum dolor amet. Lorem ipsum
                                                                    dolor sit amet, consetetur sadipscing elitr, sed diam
                                                                    nonumy eirmod tempor invidunt ut labore et
                                                                    dolore magna aliquyam erat, sed diam voluptua.
                                                                </p>
                                                                <div class="mail-signature">
                                                                    <span>Best regards</span>
                                                                    <p class="author-name">Alice Freeman</p>
                                                                </div>
                                                            </div>
                                                            <div class="mdc__footer">
                                                                <div class="mail-attatched d-flex">
                                                                    <div class="mail-attatched__item">
                                                                        <figure class="mb-0">
                                                                            <div class="mail-attatched__image mb-3">
                                                                                <img src="img/mail/1.png"
                                                                                    alt="attatched Image">
                                                                                <div class="mail-attatched__hover">
                                                                                    <a href="#" class="btn-mail">
                                                                                        <img src="img/svg/download.svg"
                                                                                            alt="download"
                                                                                            class="svg"></a>
                                                                                    <a href="#" class="btn-mail">
                                                                                        <img class="svg"
                                                                                            src="img/svg/share-2.svg"
                                                                                            alt="share-2"></a>
                                                                                </div>
                                                                            </div>
                                                                            <figcaption>
                                                                                <h6 class="file-name">Attatched.jpg</h6>
                                                                                <span class="file-size">256.5 KB</span>
                                                                            </figcaption>
                                                                        </figure>
                                                                    </div>

                                                                    <div class="mail-attatched__item">
                                                                        <figure class="mb-0">
                                                                            <div class="mail-attatched__image mb-3">
                                                                                <img src="img/mail/2.png"
                                                                                    alt="attatched Image">
                                                                                <div class="mail-attatched__hover">
                                                                                    <a href="#" class="btn-mail">
                                                                                        <img src="img/svg/download.svg"
                                                                                            alt="download"
                                                                                            class="svg"></a>
                                                                                    <a href="#" class="btn-mail">
                                                                                        <img class="svg"
                                                                                            src="img/svg/share-2.svg"
                                                                                            alt="share-2"></a>
                                                                                </div>
                                                                            </div>
                                                                            <figcaption>
                                                                                <h6 class="file-name">Attatched.jpg</h6>
                                                                                <span class="file-size">256.5 KB</span>
                                                                            </figcaption>
                                                                        </figure>
                                                                    </div>

                                                                    <div class="mail-attatched__item">
                                                                        <figure class="mb-0">
                                                                            <div class="mail-attatched__image mb-3">
                                                                                <img src="img/mail/3.png"
                                                                                    alt="attatched Image">
                                                                                <div class="mail-attatched__hover">
                                                                                    <a href="#" class="btn-mail">
                                                                                        <img src="img/svg/download.svg"
                                                                                            alt="download"
                                                                                            class="svg"></a>
                                                                                    <a href="#" class="btn-mail">
                                                                                        <img class="svg"
                                                                                            src="img/svg/share-2.svg"
                                                                                            alt="share-2"></a>
                                                                                </div>
                                                                            </div>
                                                                            <figcaption>
                                                                                <h6 class="file-name">Attatched.jpg</h6>
                                                                                <span class="file-size">256.5 KB</span>
                                                                            </figcaption>
                                                                        </figure>
                                                                    </div>

                                                                    <div class="mail-attatched__item">
                                                                        <figure class="mb-0">
                                                                            <div class="mail-attatched__image mb-3">
                                                                                <img src="img/mail/4.png"
                                                                                    alt="attatched Image">
                                                                                <div class="mail-attatched__hover">
                                                                                    <a href="#" class="btn-mail">
                                                                                        <img src="img/svg/download.svg"
                                                                                            alt="download"
                                                                                            class="svg"></a>
                                                                                    <a href="#" class="btn-mail">
                                                                                        <img class="svg"
                                                                                            src="img/svg/share-2.svg"
                                                                                            alt="share-2"></a>
                                                                                </div>
                                                                            </div>
                                                                            <figcaption>
                                                                                <h6 class="file-name">Attatched.jpg</h6>
                                                                                <span class="file-size">256.5 KB</span>
                                                                            </figcaption>
                                                                        </figure>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="dm-mailCompose dm-mailCompose--position">
                                                <form action="#">
                                                    <div
                                                        class="dm-mailCompose__header d-flex justify-content-between align-items-center">
                                                        <h6 class="mailCompose-title">New Message</h6>
                                                        <div class="dm-mailCompose__action">
                                                            <a href="#">
                                                                <img src="img/svg/maximize-2.svg" alt="sliders"
                                                                    class="svg">
                                                            </a>
                                                            <a class="compose-close" href="#"
                                                                data-trigger="compose">
                                                                <img src="img/svg/x.svg" alt="x"
                                                                    class="svg"></a>
                                                        </div>
                                                    </div>

                                                    <div class="dm-mailCompose__body">
                                                        <div class="mailCompose-form-content">
                                                            <div class="form-group positon-relative">
                                                                <select name="mail-to" id="mail-to"
                                                                    class="form-control-lg" multiple="multiple">
                                                                    <option value="01"><template class="__cf_email__"
                                                                            data-cfemail="4125242c2e012439202c312d246f222e2c">[email&#160;protected]</template>
                                                                    </option>
                                                                    <option value="02"><template class="__cf_email__"
                                                                            data-cfemail="ec98899f98ac89948d819c8089c28f8381">[email&#160;protected]</template>
                                                                    </option>
                                                                    <option value="03"><template class="__cf_email__"
                                                                            data-cfemail="443c3c3c04213c25293428216a272b29">[email&#160;protected]</template>
                                                                    </option>
                                                                </select>
                                                                <span class="input-label">To</span>
                                                            </div>
                                                            <div class="form-group positon-relative">
                                                                <input type="text" class="form-control-lg"
                                                                    name="mail-to" placeholder="Subject">
                                                            </div>
                                                            <div class="form-group">
                                                                <textarea name="message" id="mail-message" class="form-control-lg" placeholder="Type your message..."></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="dm-mailCompose__footer d-flex justify-content-between align-items-center">
                                                        <div class="footer-left d-flex align-items-center">
                                                            <button class="btn btn-md btn-primary">Send</button>
                                                            <a href="#">
                                                                <img class="svg" src="img/svg/paperclip.svg"
                                                                    alt="paperclip"></a>
                                                            <a href="#">
                                                                <img class="svg" src="img/svg/smile.svg"
                                                                    alt="smile"></a>
                                                        </div>
                                                        <div class="footer-right">
                                                            <a href="#" class="btn-remove">
                                                                <img class="svg" src="img/svg/trash-2.svg" alt></a>
                                                        </div>
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
