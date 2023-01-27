<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" type="image/png" href="{{ asset('dist/img/logo.png') }}"  />
        <!-- Bootsap nav -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])


        <style>
            body{
             font-family: 'Kanit', sans-serif;
         }
         </style>

        <link rel='stylesheet' id='element-pack-site-css'  href='https://www.iddriver.com/wp-content/plugins/bdthemes-element-pack/assets/css/element-pack-site.css?ver=5.7.6' media='all' />
        <link rel='stylesheet' id='elementor-icons-css'  href='https://www.iddriver.com/wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min.css?ver=5.11.0' media='all' />
        <link rel='stylesheet' id='elementor-animations-css'  href='https://www.iddriver.com/wp-content/plugins/elementor/assets/lib/animations/animations.min.css?ver=3.1.4' media='all' />
        <link rel='stylesheet' id='elementor-frontend-legacy-css'  href='https://www.iddriver.com/wp-content/plugins/elementor/assets/css/frontend-legacy.min.css?ver=3.1.4' media='all' />
        <link rel='stylesheet' id='elementor-frontend-css'  href='https://www.iddriver.com/wp-content/plugins/elementor/assets/css/frontend.min.css?ver=3.1.4' media='all' />
        <link rel='stylesheet' id='elementor-post-10-css'  href='https://www.iddriver.com/wp-content/uploads/elementor/css/post-10.css?ver=1639540545' media='all' />
        <link rel='stylesheet' id='elementor-pro-css'  href='https://www.iddriver.com/wp-content/plugins/elementor-pro/assets/css/frontend.min.css?ver=3.2.1' media='all' />
        <link rel='stylesheet' id='elementor-global-css'  href='https://www.iddriver.com/wp-content/uploads/elementor/css/global.css?ver=1639540546' media='all' />
        <!-- {{-- รูปพื้นหลัง --}} -->
        <link rel='stylesheet' id='elementor-post-296-css'  href='https://www.iddriver.com/wp-content/uploads/elementor/css/post-296.css?ver=1647585335' media='all' />
        <link rel='stylesheet' id='elementor-post-113-css'  href='https://www.iddriver.com/wp-content/uploads/elementor/css/post-113.css?ver=1639540546' media='all' />
        <link rel='stylesheet' id='elementor-post-594-css'  href='https://www.iddriver.com/wp-content/uploads/elementor/css/post-594.css?ver=1639540546' media='all' />
        <link rel='stylesheet' id='id-driver-child-theme-css-css'  href='https://www.iddriver.com/wp-content/themes/iddriver-child/style.css?ver=1.0.0' media='all' />
        <!-- {{-- ฟอนต์ --}} -->
        <link rel='stylesheet' id='google-fonts-1-css'  href='https://fonts.googleapis.com/css?family=Kanit%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;ver=5.6.10' media='all' />
        <link rel='stylesheet' id='elementor-icons-shared-0-css'  href='https://www.iddriver.com/wp-content/plugins/elementor/assets/lib/font-awesome/css/fontawesome.min.css?ver=5.15.1' media='all' />
        <link rel='stylesheet' id='elementor-icons-fa-solid-css'  href='https://www.iddriver.com/wp-content/plugins/elementor/assets/lib/font-awesome/css/solid.min.css?ver=5.15.1' media='all' />
        <link rel='stylesheet' id='elementor-icons-fa-brands-css'  href='https://www.iddriver.com/wp-content/plugins/elementor/assets/lib/font-awesome/css/brands.min.css?ver=5.15.1' media='all' />
<!-- {{-- reface หน้า--}} -->
        <script src='https://www.iddriver.com/wp-includes/js/jquery/jquery.min.js?ver=3.5.1' id='jquery-core-js'></script>
        <script src='https://www.iddriver.com/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.3.2' id='jquery-migrate-js'></script>



  <!-- Bootsap nav-->
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

</head>


    <!-- body -->
    <body class="font-sans antialiased">

        <!-- Navbar content -->
        <nav class="navbar navbar-dark " style="background-color: #07151d;">
            <div class="">
                  <!-- Primary Navigation Menu -->
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between h-16">
                            <div class="flex">
                                <!-- Logo -->
                                <div class="shrink-0 flex items-center">
                                    <a href="{{ route('dashboard') }}">
                                        <img src="{{asset('/files/file/iddriver.png')}}" alt="" style="width:50px">
                                    </a>
                                    <div><h5 class="text-light" style=" font-family: 'Kanit', sans-serif;">&nbsp;&nbsp;ระบบสารบรรณอิเล็กทรอนิกส์</h5></div>
                                </div>
                                <!--/ Logo -->
                            </div>

                            <div class="hidden sm:flex sm:items-center sm:ml-6">
                                <!-- Teams Dropdown -->
                                <div class=" relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
                                    @if (Route::has('login'))
                                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                                <a class="text-light" style=" font-family: 'Kanit', sans-serif;" href="{{ route('login') }}"> <button type="button" class="btn btn-outline-secondary" style=" font-family: 'Kanit', sans-serif;" >Login</button></a>
                                        </div>
                                    @endif
                            </div>
                        </div>
                    </div>
                    <!--/ Primary Navigation Menu -->
            </div>
        </nav>
        <!-- /Navbar content -->
    <div data-elementor-type="wp-page" data-elementor-id="296" class="elementor elementor-296" data-elementor-settings="[]">

        <div class="elementor-inner">

            <div class="elementor-section-wrap">
                <section class="elementor-section elementor-top-section elementor-element elementor-element-13dfbb6 elementor-section-height-min-height elementor-section-full_width elementor-section-height-default elementor-section-items-middle" data-id="13dfbb6" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">

                    <div class="elementor-container elementor-column-gap-no">

                        <div class="elementor-row">

                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-952d729" data-id="952d729" data-element_type="column">

                                <div class="elementor-column-wrap elementor-element-populated">

                                    <div class="elementor-widget-wrap">

                                                <section class="elementor-section elementor-inner-section elementor-element elementor-element-3f21369 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="3f21369" data-element_type="section">

                                                    <div class="elementor-container elementor-column-gap-default">

                                                        <div class="elementor-row">

                                                            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-a7b84e5" data-id="a7b84e5" data-element_type="column">

                                                                <div class="elementor-column-wrap elementor-element-populated">

                                                                    <div class="elementor-widget-wrap">

                                                                        <div class="elementor-element elementor-element-0129a35 elementor-widget elementor-widget-heading" data-id="0129a35"  data-element_type="widget" data-widget_type="heading.default">

                                                                            <div class="elementor-widget-container">

                                                                                <h2 class="elementor-heading-title elementor-size-default"> SARABAN  </h2>

                                                                            </div>

                                                                        </div>

                                                                        <div class="elementor-element elementor-element-fc9c0c7 elementor-widget elementor-widget-heading" data-id="fc9c0c7" data-element_type="widget" data-widget_type="heading.default">

                                                                            <div class="elementor-widget-container">

                                                                                <h2 class="elementor-heading-title elementor-size-default">ระบบสารบรรณอิเล็กทรอนิกส์ ไอดีไดร์ฟเวอร์</h2>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </section>

                                                <section class="elementor-section elementor-inner-section elementor-element elementor-element-bab18ba elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="bab18ba" data-element_type="section">

                                                    <div class="elementor-container elementor-column-gap-default">

                                                        <div class="elementor-row">

                                                            <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-e0a6266" data-id="e0a6266" data-element_type="column">

                                                                <div class="elementor-column-wrap elementor-element-populated">

                                                                    <div class="elementor-widget-wrap">

                                                                        <div class="elementor-element elementor-element-0e411b0 elementor-widget elementor-widget-image" data-id="0e411b0" data-element_type="widget" data-widget_type="image.default">

                                                                            <div class="elementor-widget-container">

                                                                                <div class="elementor-image">

                                                                                    <img width="2000" height="892" src="https://www.iddriver.com/wp-content/uploads/2021/01/car-homepage-banner-111@2x-copy.png" class="attachment-full size-full" alt="" loading="lazy" srcset="https://www.iddriver.com/wp-content/uploads/2021/01/car-homepage-banner-111@2x-copy.png 2000w, https://www.iddriver.com/wp-content/uploads/2021/01/car-homepage-banner-111@2x-copy-300x134.png 300w, https://www.iddriver.com/wp-content/uploads/2021/01/car-homepage-banner-111@2x-copy-1024x457.png 1024w, https://www.iddriver.com/wp-content/uploads/2021/01/car-homepage-banner-111@2x-copy-768x343.png 768w, https://www.iddriver.com/wp-content/uploads/2021/01/car-homepage-banner-111@2x-copy-1536x685.png 1536w" sizes="(max-width: 2000px) 100vw, 2000px" />

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </section>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </section>
            </div>

        </div>

    </div>
</body>
</html>
