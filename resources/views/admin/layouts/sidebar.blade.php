<div class="navbar-bg"></div>
<!-- Navbar Start -->
@include('admin.layouts.navbar')
<!-- Navbar End -->
    
<div class="main-sidebar sidebar-style-3">

    <aside id="sidebar-wrapper">
        
       
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">{{ __('admin.St') }}</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">{{ __('admin.Dashboard') }}</li>
            <li class="active">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>{{ __('admin.Dashboard') }}</span></a>
            </li>
            <li class="menu-header">{{ __('admin.Starter') }}</li>

            @if (canAccess(['category index', 'category create', 'category udpate', 'category delete']))
                <li class="{{ setSidebarActive(['admin.category.*']) }}"><a class="nav-link"
                        href="{{ route('admin.category.index') }}"><i class="fas fa-list"></i>
                        <span>{{ __('admin.Category') }}</span></a></li>
            @endif

            @if (canAccess(['news index']))
                <li class="dropdown {{ setSidebarActive(['admin.news.*', 'admin.pending.news']) }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-newspaper"></i>
                        <span>{{ __('admin.News') }}</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ setSidebarActive(['admin.news.*']) }}"><a class="nav-link"
                                href="{{ route('admin.news.index') }}">{{ __('admin.All News') }}</a></li>

                        <li class="{{ setSidebarActive(['admin.pending.news']) }}"><a class="nav-link"
                                href="{{ route('admin.pending.news') }}">{{ __('admin.Pending News') }}</a></li>

                    </ul>
                </li>
            @endif
            @if(canAccess(['live-channel index']))
            <li class="{{ Request::is('admin/live/live-channel/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.admin_live_channel_show') }}"><i class="fab fa-google-drive"></i> <span>Live Channel</span></a></li>
            @endif

            @if(canAccess(['Video index']))
            <li class="{{ Request::is('admin/video/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.admin_video_show') }}"><i class="fas fa-video"></i> <span>Video Gallery</span></a></li>
            @endif
            @if(canAccess(['OnlinePoll index']))
            <li class="{{ Request::is('admin/poll/online-poll/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.admin_online_poll_show') }}"><i class="fas fa-vote-yea"></i> <span>Online Poll</span></a></li>
               @endif
            @if (canAccess(['about index', 'contact index']))
                <li class="dropdown {{ setSidebarActive(['admin.about.*', 'admin.contact.*']) }}">
                    <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                        <span>{{ __('admin.Pages') }}</span></a>
                    <ul class="dropdown-menu">
                        @if (canAccess(['about index']))
                            <li class="{{ setSidebarActive(['admin.about.*']) }}"><a class="nav-link"
                                    href="{{ route('admin.about.index') }}">{{ __('admin.About Page') }}</a></li>
                        @endif
                        @if (canAccess(['conatact index']))
                            <li class="{{ setSidebarActive(['admin.contact.*']) }}"><a class="nav-link"
                                    href="{{ route('admin.contact.index') }}">{{ __('admin.Contact Page') }}</a></li>
                        @endif
                    </ul>
                </li>
            @endif

            @if (canAccess(['products index.*']))
                
            <li class="dropdown {{ setSidebarActive([
                'admin.category.*',
                'admin.product.*',
                'admin.product-reviews.index',
               ]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-shopping-cart"></i>
                    <span>Manage Gov.t Structures </span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.category.*']) }}" ><a class="nav-link" href="{{ route('category.index') }}">Structure Categories</a></li>
                    <li class="{{ setSidebarActive(['admin.product.*']) }}" ><a class="nav-link" href="{{ route('product.index') }}">structures</a></li>
                    <li class="{{ setSidebarActive(['admin.product-reviews.index']) }}" ><a class="nav-link" href="{{ route('product-reviews.index') }}">Structure Reviews</a>
                    </li>
                </ul>
            </li>
            @endif
            
            @if (canAccess([('rss_feed index')]))
                
            
<li class="nav-item {{ Request::is('admin/rss-feed*') ? 'active' : '' }}">
    <a class="nav-link d-flex align-items-center py-3" aria-current="page" href="{{ route('rss-feed.index') }}">
            <i class="fa fa-rss"></i>
        <span class="aside-menu-title">  {{ __('messages.rss-feed') }}</span>
    </a>
</li>
        @endif


           @if (canAccess(['polss index']))
           <li class="nav-item {{ Request::is('admin/polls*') ? 'active' : '' }}">
            <a class="nav-link d-flex align-items-center py-3" aria-current="page" href="{{ route('polls.index') }}">
            
                <i class="fas fa-list fs-4"></i>
            
                <span>Polls</span>
            </a>
        </li>
           @endif


        @if (canAccess(['parivacy policy index', 'terms and condition index']))
        <li class="dropdown {{ setSidebarActive([
            'admin.privacy-policy.index',
            'admin.terms-and-condition.index',
            'admin.about-us.index',
             'admin.hero.index',
            'counter.index',
            'admin.banner-slider.*',
            'admin.chefs.*',
            'admin.why-choose-us.*',




            ]) }}">
            
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-alt"></i> <span>more</span></a>
            <ul class="dropdown-menu">
            @if (canAccess(['parivacy policy index']))
            <li class="{{ setSidebarActive(['admin.privacy-policy.index']) }}"><a class="nav-link" href="{{ route('privacy-policy.index') }}">Privacy Policy</a></li>
            @endif
            @if (canAccess(['hero index']))
            <li class="{{ setSidebarActive(['admin.hero.index']) }}"><a class="nav-link" href="{{ route('hero.index') }}">Hero</a></li>
            @endif
            @if(canAccess(['terms and condition index']))
            <li class="{{ setSidebarActive(['admin.terms-and-condition.index']) }}"><a class="nav-link" href="{{ route('terms-and-condition.index') }}">Terms and Conditions</a></li>
            @endif
            @if(canAccess(['terms and condition index']))
            <li class="{{ setSidebarActive(['admin.counter.index']) }}"><a class="nav-link" href="{{ route('counter.index') }}">Counter</a></li>
            @endif

            @if(canAccess(['about us index']))
            <li class="{{ setSidebarActive(['admin.about-us.index']) }}"><a class="nav-link" href="{{ route('about-us.index') }}">About Us</a></li>
            @endif

            @if(canAccess(['chefs index']))
            <li class="{{ setSidebarActive(['admin.banner-slider.*']) }}"><a class="nav-link" href="{{ route('admin.banner-slider.index') }}">Banner Slider</a></li>

            @endif
            @if(canAccess(['chefs index']))
            <li class="{{ setSidebarActive(['admin.chefs.*']) }}"><a class="nav-link" href="{{ route('admin.chefs.index') }}">Our Journalists</a></li>

            @endif
             @if(canAccess(['whychoosus index']))
             <li class="{{ setSidebarActive(['admin.why-choose-us.*']) }}"><a class="nav-link" href="{{ route('why-choose-us.index') }}">Why choose us</a></li>

            @endif 
           
            </ul>
        </li>
        @endif



        <li class="{{ setSidebarActive(['admin.slider.*']) }}"><a class="nav-link" href="{{ route('admin.slider.index') }}"><i class="fas fa-images"></i>
            <span>Slider</span></a></li>

            @if (canAccess(['social count index']))
                <li class="{{ setSidebarActive(['admin.social-count.*']) }}"><a class="nav-link"
                        href="{{ route('admin.social-count.index') }}"><i class="fas fa-hashtag"></i>
                        <span>{{ __('admin.Social Count') }}</span></a></li>
            @endif

            @if (canAccess(['contact message index']))
                <li class="{{ setSidebarActive(['admin.contact-message.*']) }}"><a class="nav-link"
                        href="{{ route('admin.contact-message.index') }}"><i class="fas fa-id-card-alt"></i>
                        <span>{{ __('admin.Contact Messages') }} </span>
                        @if ($unReadMessages > 0)
                            <i class="badge bg-danger" style="color:
            #fff">{{ $unReadMessages }}</i>
                        @endif
                    </a></li>
            @endif
            @if (canAccess(['home section index']))
                <li class="{{ setSidebarActive(['admin.home-section-setting.*']) }}"><a class="nav-link"
                        href="{{ route('admin.home-section-setting.index') }}"><i class="fas fa-wrench"></i>
                        <span>{{ __('admin.Home Section Setting') }}</span></a></li>
            @endif

            @if (canAccess(['advertisement index']))
                <li class="{{ setSidebarActive(['admin.ad.*']) }}"><a class="nav-link"
                        href="{{ route('admin.ad.index') }}"><i class="fas fa-ad"></i>
                        <span>{{ __('admin.Advertisement') }}</span></a></li>
            @endif


            @if (canAccess(['subscribers index']))
                <li class="{{ setSidebarActive(['admin.subscribers.*']) }}"><a class="nav-link"
                        href="{{ route('admin.subscribers.index') }}"><i class="fas fa-users"></i>
                        <span>{{ __('admin.Subscribers') }}</span></a></li>
            @endif

            @if (canAccess(['footer index']))
                <li
                    class="dropdown
                {{ setSidebarActive([
                    'admin.social-link.*',
                    'admin.footer-info.*',
                    'admin.footer-grid-one.*',
                    'admin.footer-grid-three.*',
                    'admin.footer-grid-two.*'
                ]) }}
            ">
                    <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                        <span>{{ __('admin.Footer') }} {{ __('admin.Setting') }}</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ setSidebarActive(['admin.social-link.*']) }}"><a class="nav-link"
                                href="{{ route('admin.social-link.index') }}">{{ __('admin.Social Links') }}</a></li>
                        <li class="{{ setSidebarActive(['admin.footer-info.*']) }}"><a class="nav-link"
                                href="{{ route('admin.footer-info.index') }}">{{ __('admin.Footer Info') }}</a></li>
                        <li class="{{ setSidebarActive(['admin.footer-grid-one.*']) }}"><a class="nav-link"
                                href="{{ route('admin.footer-grid-one.index') }}">{{ __('admin.Footer Grid One') }}</a></li>
                        <li class="{{ setSidebarActive(['admin.footer-grid-two.*']) }}"><a class="nav-link"
                                href="{{ route('admin.footer-grid-two.index') }}">{{ __('admin.Footer Grid Two') }}</a></li>
                        <li class="{{ setSidebarActive(['admin.footer-grid-three.*']) }}"><a class="nav-link"
                                href="{{ route('admin.footer-grid-three.index') }}">{{ __('admin.Footer Grid Three') }}</a>
                        </li>

                    </ul>
                </li>
            @endif

            @if (canAccess(['access management index']))
                <li class="dropdown
                {{ setSidebarActive([
                    'admin.role.*',
                    'admin.role-users.*'
                    ]) }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-shield"></i>
                        <span>{{ __('admin.Access Management') }}</span></a>
                    <ul class="dropdown-menu">

                        <li class="{{ setSidebarActive(['admin.role-users.*']) }}"><a class="nav-link"
                                href="{{ route('admin.role-users.index') }}">{{ __('admin.Role Users') }}</a></li>

                        <li class="{{ setSidebarActive(['admin.role.*']) }}"><a class="nav-link"
                                href="{{ route('admin.role.index') }}">{{ __('admin.Roles and Permissions') }}</a></li>
                    </ul>
                </li>
            @endif

            @if (canAccess(['setting index']))
                <li class="{{ setSidebarActive(['admin.setting.*']) }}"><a class="nav-link"
                        href="{{ route('admin.setting.index') }}"><i class="fas fa-cog"></i>
                        <span>{{ __('admin.Settings') }}</span></a></li>
            @endif

    @if (canAccess(['languages index']))

            <li class="dropdown
                {{ setSidebarActive([
                    'admin.frontend-localization.index',
                    'admin.admin-localization.index',
                    'admin.language.*'
                ]) }}
            ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-language"></i>
                    <span>{{ __('admin.Localization') }}</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.language.*']) }}"><a class="nav-link"
                        href="{{ route('admin.language.index') }}">
                        <span>{{ __('admin.Languages') }}</span></a></li>

                    <li class="{{ setSidebarActive(['admin.frontend-localization.index']) }}"><a class="nav-link"
                        href="{{ route('admin.frontend-localization.index') }}">
                        <span>{{ __('admin.Frontend Lang') }}</span></a></li>

                    <li class="{{ setSidebarActive(['admin.admin-localization.index']) }}"><a class="nav-link"
                        href="{{ route('admin.admin-localization.index') }}">
                        <span>{{ __('admin.Admin Lang') }}</span></a></li>
                </ul>
            </li>     
    @endif

    </ul>
   </aside>

</div>
