<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
        <meta name="description" content="">
        <title>News Portal</title>        
		
        <link rel="icon" type="image/png" href="{{ asset('uploads/' . $global_setting_data->favicon) }}">

        <!-- All CSS -->
        @include('front.layout.styles')
        
        <!-- All Javascript -->
        @include('front.layout.scripts')

        <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">

        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6212352ed76fda0a"></script>        
        
        <!-- Google Analytics -->
        @if($global_setting_data->analytic_status == 'Show')
            <script async src="https://www.googletagmanager.com/gtag/js?id={{ $global_setting_data->analytic_status }}"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());
                gtag('config', '{{ $global_setting_data->analytic_status }}');
            </script>
        @endif

        <style>

            /* Theme Background 1 */
            .website-menu,
            .website-menu .bg-primary,
            .acme-news-ticker-label,
            .search-section button[type="submit"],
            .home-content .left .news-total-item .see-all a,
            .video-content,
            .footer ul.social li a,
            .footer input[type="submit"],
            .scroll-top,
            .widget .poll button,
            .nav-pills .nav-link.active,
            .form-check-input:checked,
            .dropdown-item:active,
            .related-news .owl-nav .owl-prev,
            .related-news .owl-nav .owl-next,
            .bg-website,
            .page-item.active .page-link {
                
                background: #{{ $global_setting_data->theme_color_1 }}!important;

            }

            .acme-news-ticker,
            .form-check-input:checked,
            .page-item.active .page-link {

                border-color: #{{ $global_setting_data->theme_color_1 }}!important;

            }

            /* Theme Color 1 */
            ul.my-news-ticker li a,
            .home-content .left .news-total-item .left-side h3 a:hover,
            .home-content .left .news-total-item .right-side-item .right h2 a:hover,
            .home-content .left .news-total-item .left-side .date-user .user a:hover,
            .home-content .left .news-total-item .left-side .date-user .date a:hover,
            .home-content .left .news-total-item .right-side-item .right .date-user .user a:hover,
            .home-content .left .news-total-item .right-side-item .right .date-user .date a:hover,
            .widget .news-item .right h2 a:hover,
            .widget .news-item .right .date-user .user a:hover,
            .widget .news-item .right .date-user .date a:hover,
            .video-carousel .owl-nav .owl-prev,
            .video-carousel .owl-nav .owl-next,
            li.breadcrumb-item a,
            .category-page-post-item h3 a:hover,
            .category-page-post-item .date-user .user a:hover,
            .category-page-post-item .date-user .date a:hover,
            .related-news .item h3 a:hover,
            .related-news .item .date-user .user a:hover,
            .related-news .item .date-user .date a:hover,
            .accordion-button:not(.collapsed),
            .login-form a {

                color: #{{ $global_setting_data->theme_color_1 }}!important;

            }

            
            /* Theme Color 2 */
            .home-main .inner .text-inner .category span,
            .home-main .inner .text-inner .category span a,
            .home-content .left .news-total-item .left-side .category span,
            .home-content .left .news-total-item .left-side .category span a,
            .home-content .left .news-total-item .right-side-item .right .category span,
            .home-content .left .news-total-item .right-side-item .right .category span a,
            .widget .news-item .right .category span,
            .widget .news-item .right .category span a,
            .category-page-post-item .category span,
            .category-page-post-item .category span a,
            .tag-section-content span,
            .related-news .item .category span,
            .related-news .item .category span a {
                
                background: #{{ $global_setting_data->theme_color_2 }}!important;
                
            }
            
            /* Pagination*/
            .nav-pills .nav-link.active,
            .page-item.active .page-link {

                color: #fff!important;

            }
            .nav-pills .nav-link {

                color: #000!important;

            }

            /* Yellow: background: #fee857; */
            /* Gray: #6c757d!important; (for tags)*/

        </style>

    </head>
    <body>
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul>
                            @if($global_setting_data->top_bar_date_status == 'Show')
                                <li class="today-text">Today: {{ date('F d, Y') }}</li>
                            @endif
                            @if($global_setting_data->top_bar_email_status == 'Show')
                                <li class="email-text">{{ $global_setting_data->top_bar_email }}</li>
                            @endif
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="right">

                            @if($global_page_data->faq_status == 'Show')
                                <li class="menu"><a href="{{ route('faq') }}">{{ $global_page_data->faq_title }}</a></li>
                            @endif

                            @if($global_page_data->about_status == 'Show')
                                <li class="menu"><a href="{{ route('about') }}">{{ $global_page_data->about_title }}</a></li>
                            @endif

                            @if($global_page_data->contact_status == 'Show')
                                <li class="menu"><a href="{{ route('contact') }}">{{ $global_page_data->contact_title }}</a></li>
                            @endif
                            
                            @if($global_page_data->login_status == 'Show')
                                <li class="menu"><a href="{{ route('login') }}">{{ $global_page_data->login_title }}</a></li>
                            @endif

                            <!-- <li>
                                <div class="language-switch">
                                    <select name="">
                                        <option value="">English</option>
                                        <option value="">German</option>
                                        <option value="">French</option>
                                    </select>
                                </div>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="heading-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 d-flex align-items-center">
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('uploads/' . $global_setting_data->logo) }}" alt="site-logo">
                            </a>
                        </div>
                    </div>

                    @if ($global_top_ad_data->top_ad_status == 'Show')
                    <div class="col-md-8">
                        <div class="ad-section-1">

                            @if($global_top_ad_data->top_ad_url == '')
                                <img src="{{ asset('uploads/' . $global_top_ad_data->top_ad) }}" alt="top-ad">
                            @else
                                <a href="{{ $global_top_ad_data->top_ad_url }}"><img src="{{ asset('uploads/' . $global_top_ad_data->top_ad) }}" alt="top-ad"></a>
                            @endif

                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>

        @include('front.layout.nav')

        @yield('main_content')
        
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="item">
                            <h2 class="heading">About Us</h2>
                            <p>
                            A news portal is a platform, typically online, that gathers information from vetted reliable sources. It aims at certain people and attempts to attract customers by offering reliable and honest facts to support their viewpoint.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="item">
                            <h2 class="heading">Useful Links</h2>
                            <ul class="useful-links">
                                <li><a href="{{ route('home') }}">Home</a></li>

                                @if($global_page_data->terms_status == 'Show')
                                    <li><a href="{{ route('terms') }}">{{ $global_page_data->terms_title }}</a></li>
                                @endif

                                @if($global_page_data->privacy_status == 'Show')
                                    <li><a href="{{ route('privacy') }}">{{ $global_page_data->privacy_title }}</a></li>
                                @endif
                                
                                @if($global_page_data->disclaimer_status == 'Show')
                                    <li><a href="{{ route('disclaimer') }}">{{ $global_page_data->disclaimer_title }}</a></li>
                                @endif

                                @if($global_page_data->contact_status == 'Show')
                                    <li><a href="{{ route('contact') }}">{{ $global_page_data->contact_title }}</a></li>
                                @endif

                            </ul>
                        </div>
                    </div>
                    
                    
                    <div class="col-md-3">
                        <div class="item">
                            <h2 class="heading">Contact</h2>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="right">
                                    34 Antiger Lane,<br>
                                    PK Lane, USA, 12937
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="right">
                                    contact@news_portal.com
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="right">
                                    122-222-1212
                                </div>
                            </div>
                            <ul class="social">

                                @foreach($global_social_item_data as $item)

                                    <li><a href="{{ $item->url }}" target="_blank"><i class="{{ $item->icon }}"></i></a></li>

                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="item">
                            <h2 class="heading">Newsletter</h2>
                            <p>
                                In order to get the latest news, apply to our newsletter here:
                            </p>
                            <form action="{{ route('subscribe') }}" method="post" class="form_subscribe_ajax">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" placeholder="Email Address">
                                    <span class="text-danger error-text email_error"></span>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Subscribe Now">
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="copyright">
            Copyright 2022, Mladen Kostic. All Rights Reserved.
        </div>
     
        <div class="scroll-top">
            <i class="fas fa-angle-up"></i>
        </div>
		
        @include('front.layout.scripts_footer')

        <script>
            $(".form_subscribe_ajax").on('submit', function(e) {

                e.preventDefault();

                $('#loader').show();

                var form = this;

                $.ajax({

                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(form).find('span.error-text').text('');
                    },
                    success: function(data) {

                        $('#loader').hide();

                        if (data.code == 0) {

                            $.each(data.error_message, function(prefix, val) {

                                $(form).find('span.' + prefix + '_error').text(val[0]);

                            });

                        } else if (data.code == 1) {

                            $(form)[0].reset();
                            iziToast.success({
                                title: '',
                                position: 'topCenter',
                                message: data.success_message
                            });

                        }

                    }

                });

            })(jQuery);
        </script>

        <div id="loader"></div>

            @if ($errors->any())

                @foreach($errors->all() as $error)

                    <script>
                        iziToast.error({
                            title: '',
                            position: 'topCenter',
                            message: "{{ $error }}",
                        });
                    </script>

                @endforeach

            @endif

            @if (session()->get('error'))

                <script>
                    iziToast.error({
                        title: '',
                        position: 'topCenter',
                        message: "{{ session()->get('error') }}",
                    });
                </script>

            @endif

            @if (session()->get('success'))

                <script>
                    iziToast.success({
                        title: '',
                        position: 'topCenter',
                        message: "{{ session()->get('success') }}",
                    });
                </script>

            @endif
		
   </body>
</html>