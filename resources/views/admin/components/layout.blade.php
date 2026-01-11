<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from shreethemes.net/goodup-live-2/goodup/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 Feb 2025 18:56:59 GMT -->

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Goodup - Business Directory & Listing HTML Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/assets/img/favicon.png') }}">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('admin/assets/js/plugins/morris.js/morris.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('admin/assets/css/styles.css') }}" rel="stylesheet">

    @if (isset($type) && $type == 'scraping')
        @vite(['resources/js/app.js'])
    @endif

</head>

<body>

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css')}} -->
    <!-- ============================================================== -->
    <div class="preloader"></div>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Start Navigation -->
        <div class="header header-light dark-text head-shadow">
            <div class="container">
                <nav id="navigation" class="navigation navigation-landscape">
                    <div class="nav-header">
                        <a class="nav-brand" href="#">
                            <img src="{{ asset('admin/assets/img/logo.png') }}" class="logo" alt="" />
                        </a>
                        <div class="nav-toggle"></div>
                        <div class="mobile_nav">
                            <ul>
                                <li>
                                    <a href="login-2.html" class="crs_yuo12 w-auto text-dark gray">
                                        <span class="embos_45"><i
                                                class="lni lni-power-switch mr-1 mr-1"></i>Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="nav-menus-wrapper" style="transition-property: none;">
                        <ul class="nav-menu nav-menu-social align-to-right">
                            <li class="add-listing gray">
                                <a href="{{ route('logout') }}">
                                    <i class="lni lni-power-switch mr-1"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- End Navigation -->
        <div class="clearfix"></div>
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->

        <!-- ======================= dashboard Detail ======================== -->
        <div class="goodup-dashboard-wrap gray px-4 py-5">
            <a class="mobNavigation" data-bs-toggle="collapse" href="#MobNav" role="button" aria-expanded="false"
                aria-controls="MobNav">
                <i class="fas fa-bars me-2"></i>Dashboard Navigation
            </a>
            @include('admin.components.sidebar')

            <div class="goodup-dashboard-content">

                {{ $slot }}

                <!-- footer -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="py-3">© 2025 Goodup. Designd By Softlancer.</div>
                    </div>
                </div>

            </div>

        </div>
        <!-- ======================= dashboard Detail End ======================== -->

        <a id="tops-button" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->
        <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/slick.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/dropzone.js') }}"></script>
        <script src="{{ asset('admin/assets/js/counterup.js') }}"></script>
        <script src="{{ asset('admin/assets/js/lightbox.js') }}"></script>
        <script src="{{ asset('admin/assets/js/moment.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/daterangepicker.js') }}"></script>
        <script src="{{ asset('admin/assets/js/lightbox.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jQuery.style.switcher.js') }}"></script>
        <script src="{{ asset('admin/assets/js/custom.js') }}"></script>

        <!-- Morris.js charts -->
        <script src="{{ asset('admin/assets/js/plugins/raphael/raphael.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/plugins/morris.js/morris.min.js') }}"></script>

        <!-- Custom Chart JavaScript -->
        <script src="{{ asset('admin/assets/js/plugins/dashboard-2.js') }}"></script>
        <!-- ============================================================== -->
        <!-- This page plugins -->
        <!-- ============================================================== -->

        <!-- TinyMCE Editor -->
        <script src='https://cdn.jsdelivr.net/npm/tinymce@5/tinymce.min.js' referrerpolicy="origin"></script>
        <script src="https://unpkg.com/feather-icons"></script>
        <script>
            setTimeout(function() {
                $('.alert-success,.alert-danger').fadeOut('fast');
            }, 3000);

            tinymce.init({
                selector: '#mytextarea,#longtextarea',
                height: 400,
                plugins: [
                    'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
                    'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen',
                    'insertdatetime',
                    'media', 'table', 'emoticons', 'help'
                ],
                menubar: true,
                toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code | styleselect',
                extended_valid_elements: 'i[class|style],table[class|style],th[class|style],td[class|style],h1[class|style],h2[class|style],h3[class|style],h4[class|style],h5[class|style],h6[class|style]',
                valid_elements: '*[*]',
                content_css: false,
                content_style: 'i { font-style: italic; }',
                entity_encoding: 'raw',
                remove_trailing_brs: false,
                valid_children: '+body[style|i]',
                style_formats: [{
                        title: 'Custom Table Styles',
                        items: [{
                            title: 'Table Striped',
                            selector: 'table',
                            classes: 'table mt-3 table-striped table-hover table-bordered'
                        }]
                    },
                    {
                        title: 'Custom Heading Styles',
                        items: [{
                            title: 'Product Title',
                            selector: 'h1,h2,h3,h4,h5,h6',
                            classes: 'product-details__description__title'
                        }]
                    }
                ]
            });

            feather.replace()
        </script>

        @stack('modals')
</body>

<!-- Mirrored from shreethemes.net/goodup-live-2/goodup/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 Feb 2025 18:57:00 GMT -->

</html>
