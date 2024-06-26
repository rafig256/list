<div class="topbar-nav header navbar" role="banner">
    <nav id="topbar">
        <ul class="navbar-nav theme-brand flex-row text-center">
            <li class="nav-item theme-logo">
                <a href="{{route('admin.dashboard.index')}}">
                    <img src="{{asset(config('settings.favicon'))}}" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a href="{{route('admin.dashboard.index')}}" class="nav-link"> {{config('settings.site_name')}} </a>
            </li>
        </ul>

        <ul class="list-unstyled menu-categories" id="topAccordion">

            <li class="menu single-menu {{setActive(['admin.dashboard.index'])}}">
                <a href="{{route('admin.dashboard.index')}}" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle autodroprown">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>Dashboard</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </a>
                <ul class="collapse submenu list-unstyled" id="app" data-parent="#topAccordion">
                    <li>
                        <a href="{{route('admin.dashboard.index')}}"> Dashboard </a>
                    </li>
                </ul>
            </li>

{{--Pages--}}
            @canany(['hero update','about page update','contact page update','testimonial index','section title update'])
            <li class="menu single-menu {{setActive(['admin.hero.index','admin.about.show','admin.contact.show','admin.testimonial.index','admin.testimonial.create'])}}">
                <a href="#app" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                        <span>Pages</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </a>
                <ul class="collapse submenu list-unstyled" id="app" data-parent="#topAccordion">
                    @can('hero update')
                    <li><a href="{{route('admin.hero.index')}}"> hero </a></li>
                    @endcan
                    @can('about page update')
                    <li><a href="{{route('admin.about.show')}}"> About </a></li>
                    @endcan
                    @can('contact page update')
                    <li><a href="{{route('admin.contact.show')}}"> Contact </a></li>
                    @endcan
                    @can('testimonial index')
                    <li class="sub-sub-submenu-list"><a href="{{route('admin.testimonial.index')}}">All Testimonial</a></li>
                    @endcan
                    @can('testimonial create')
                    <li class="sub-sub-submenu-list">
                        <a href="{{route('admin.testimonial.create')}}">create Testimonial</a>
                    </li>
                    @endcan
                    @canany('section title update')
                    <li class="sub-sub-submenu-list">
                        <a href="{{route('admin.section-title.index')}}">Update Section Title</a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany

{{--Listing--}}
            @canany(['listing index','gallery create','gallery delete','location index','amenity index'])
            <li class="menu single-menu {{setActive([
    'admin.category.index',
    'admin.category.create',
    'admin.amenity.index',
    'admin.amenity.create',
    'admin.location.index',
    'admin.location.create',
    'admin.listing.index',
    'admin.listing.create',
    'listing.pending.update',
    'listing.pending.index',
    ])}}">
                <a href="#components" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                        <span>listing</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </a>
                <ul class="collapse submenu list-unstyled" id="components" data-parent="#topAccordion">
                    @can('listing category index')
                    <li><a href="{{route('admin.category.index')}}"> Categories </a></li>
                    @endcan
                    @can('listing category create')
                    <li><a href="{{route('admin.category.create')}}">create Categories </a></li>
                    @endcan
                    @can('location index')
                    <li><a href="{{route('admin.location.index')}}"> Locations </a></li>
                    @endcan
                    @can('location create')
                    <li><a href="{{route('admin.location.create')}}"> Create Location </a></li>
                    @endcan
                    @can('amenity index')
                    <li><a href="{{route('admin.amenity.index')}}"> Amenity </a></li>
                    @endcan
                    @can('amenity update')
                    <li><a href="{{route('admin.amenity.create')}}"> Create Amenity </a></li>
                    @endcan
                    @can('listing index')
                    <li><a href="{{route('admin.listing.index')}}"> All listing </a></li>
                    @endcan
                    @can('listing create')
                    <li><a href="{{route('admin.listing.create')}}"> create listing </a></li>
                    @endcan
                    @can('pending listing')
                    <li><a href="{{route('admin.listing.pending.index')}}"> Pending listing </a></li>
                    @endcan
                    @can('schedule index')
                    <li><a href="{{route('admin.schedule.index')}}"> All Schedule </a></li>
                    @endcan
                </ul>
            </li>
            @endcanany

{{--Blog--}}
            @can('blog index')
            <li class="menu single-menu ">
                <a href="#uiKit" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        <span>Blog</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </a>
                <ul class="collapse submenu list-unstyled" id="uiKit" data-parent="#topAccordion">
                    @can('blog category create')<li class="sub-sub-submenu-list"><a href="{{route('admin.blog-category.create')}}">create Blog Category</a></li>@endcan
                    @can('blog category index')<li class="sub-sub-submenu-list"><a href="{{route('admin.blog-category.index')}}">Blog Categories</a></li>@endcan
                    @can('blog index')<li class="sub-sub-submenu-list"><a href="{{route('admin.post.index')}}">Posts</a></li>@endcan
                    @can('blog create')<li class="sub-sub-submenu-list"><a href="{{route('admin.post.create')}}">create Post</a></li>@endcan
                    @can('blog comment')<li class="sub-sub-submenu-list"><a href="{{route('admin.comment.index')}}">Comments</a></li>@endcan
                </ul>
            </li>

            @endcan

{{-- Role --}}
            @canany(['access management index','user index'])
            <li class="menu single-menu {{setActive(['admin.role.index','admin.role.create'])}}">
                <a href="#" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                        <span>Role</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </a>
                <ul class="collapse submenu list-unstyled" data-parent="#topAccordion">
                    @can('access management index')
                    <li class="sub-sub-submenu-list">
                        <a href="{{route('admin.role.index')}}">Roles</a>
                    </li>
                    <li class="sub-sub-submenu-list">
                        <a href="{{route('admin.role.create')}}">Create Role</a>
                    </li>
                    @endcan
                    @can('user index')
                    <li class="sub-sub-submenu-list">
                        <a href="{{route('admin.user.index')}}">Users</a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany

{{--Listing Review--}}
            @canany(['listing review','review category index'])
            <li class="menu single-menu {{setActive(['admin.package.index','admin.package.create','admin.review-cat.create','admin.review-cat.index','admin.review.index'])}}">
                <a href="#" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                        <span>Review</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </a>
                <ul class="collapse submenu list-unstyled "  data-parent="#topAccordion">
                    @can('listing review')<li class="{{setActive(['admin.review.index'])}}"><a href="{{route('admin.review.index')}}"> view review </a></li>@endcan
                    @can('review category update')<li class="{{setActive(['admin.review-cat.create'])}}"><a href="{{route('admin.review-cat.create')}}"> create review category </a></li>@endcan
                    @can('review category index')<li class="{{setActive(['admin.review-cat.index'])}}"><a href="{{route('admin.review-cat.index')}}"> review categories </a></li>@endcan
                </ul>
            </li>
            @endcanany

{{--Support--}}
            @can('message index')
            <li class="menu single-menu">
                    <a href="#page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                            <span>Support</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="page"  data-parent="#topAccordion">
                        <li><a href="{{route('admin.chat.index')}}"> Chat </a></li>
                    </ul>
                </li>
            @endcan

{{--Setting--}}
            @canany(['settings','menu builder index','report index'])
            <li class="menu single-menu {{setActive(['admin.setting.index','admin.payment-setting.index','admin.report.index'])}}">
                <a href="#setting" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                        <span>setting</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </a>
                <ul class="collapse submenu list-unstyled" id="setting" data-parent="#topAccordion">
                    @can('settings')<li><a href="{{route('admin.setting.index')}}"> original</a></li>
                    <li><a href="{{route('admin.payment-setting.index')}}"> payment</a></li>@endcan
                    @can('menu builder index')<li><a href="{{route('admin.menu.index')}}"> Menu</a></li>@endcan
                    @can('report index')<li class="{{setActive(['admin.report.index'])}}"><a href="{{route('admin.report.index')}}"> report list </a></li>@endcan
                    <li class="{{setActive(['admin.package.index'])}}"><a href="{{route('admin.package.index')}}"> All Packages </a></li>
                    <li class="{{setActive(['admin.package.create'])}}"><a href="{{route('admin.package.create')}}"> Create Packages </a></li>
                    <li class="{{setActive(['admin.package.create'])}}"><a class="text-danger" href="{{route('admin.clear-database')}}"> Clear Database </a></li>
                </ul>
            </li>
            @endcanany
        </ul>
    </nav>
</div>
