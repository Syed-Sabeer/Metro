<footer class="footer-wrapper">
    <div class="footer-wrapper__inside">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="footer-copyright">
                        <p><span>© 2023</span><a href="#">Metro Textiles</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="footer-menu text-end">
                        <ul>
                            <li>
                                <a href="#">About</a>
                            </li>
                            <li>
                                <a href="#">Team</a>
                            </li>
                            <li>
                                <a href="#">Contact</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>
</main>
<div id="overlayer">
<div class="loader-overlay">
    <div class="dm-spin-dots spin-lg">
        <span class="spin-dot badge-dot dot-primary"></span>
        <span class="spin-dot badge-dot dot-primary"></span>
        <span class="spin-dot badge-dot dot-primary"></span>
        <span class="spin-dot badge-dot dot-primary"></span>
    </div>
</div>
</div>
<div class="overlay-dark-sidebar"></div>
<div class="customizer-overlay"></div>
<div class="customizer-wrapper">
<div class="customizer">
    <div class="customizer__head">
        <h4 class="customizer__title">Customizer</h4>
        <span class="customizer__sub-title">Customize your overview page layout</span>
        <a href="#" class="customizer-close">
            <img class="svg" src="{{ asset('img/svg/x2.svg') }}" alt>
        </a>
    </div>
    <div class="customizer__body">
        <div class="customizer__single">
            <h4>Layout Type</h4>
            <ul class="customizer-list d-flex layout">
                <li class="customizer-list__item">
                    <a href="../ltr" class="active">
                        <img src="img/ltr.png" alt>
                        <i class="fa fa-check-circle"></i>
                    </a>
                </li>
                <li class="customizer-list__item">
                    <a href="../rtl">
                        <img src="img/rtl.png" alt>
                        <i class="fa fa-check-circle"></i>
                    </a>
                </li>
            </ul>
        </div>

        <div class="customizer__single">
            <h4>Sidebar Type</h4>
            <ul class="customizer-list d-flex l_sidebar">
                <li class="customizer-list__item">
                    <a href="#" data-layout="light" class="dark-mode-toggle active">
                        <img src="img/light.png" alt>
                        <i class="fa fa-check-circle"></i>
                    </a>
                </li>
                <li class="customizer-list__item">
                    <a href="#" data-layout="dark" class="dark-mode-toggle">
                        <img src="img/dark.png" alt>
                        <i class="fa fa-check-circle"></i>
                    </a>
                </li>
            </ul>
        </div>

        <div class="customizer__single">
            <h4>Navbar Type</h4>
            <ul class="customizer-list d-flex l_navbar">
                <li class="customizer-list__item">
                    <a href="#" data-layout="side" class="active">
                        <img src="img/side.png" alt>
                        <i class="fa fa-check-circle"></i>
                    </a>
                </li>
                <li class="customizer-list__item top">
                    <a href="#" data-layout="top">
                        <img src="img/top.png" alt>
                        <i class="fa fa-check-circle"></i>
                    </a>
                </li>
                <li class="colors"></li>
            </ul>
        </div>

    </div>
</div>
</div>

<script src="{{asset('js/plugins.min.js')}}"></script>
<script src="{{asset('js/script.min.js')}}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break;
 }
 @endif
</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete This Data?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                    }
                  })


    });

  });


// Confirm

$(function(){
    $(document).on('click','#confirm',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Are you sure to Confirm?',
                    text: "Once Confirm, You will not be able to pending again",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Confirm!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Confirm!',
                        'Confirm Changes',
                        'success'
                      )
                    }
                  })


    });

  });
</script>

</body>

</html>
