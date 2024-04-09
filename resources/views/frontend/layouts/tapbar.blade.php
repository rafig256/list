<section id="wsus__topbar">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-md-7 d-none d-md-block">
                <ul class="wsus__topbar_left">
                    <li><a href="mailto:{{config('settings.site_email')}}"><i class="fal fa-envelope"></i>
                            {{config('settings.site_email')}}</a></li>
                    <li><a href="callto:{{config('settings.site_phone')}}"><i class="fal fa-phone-alt"></i>{{config('settings.site_phone')}}</a></li>
                </ul>
            </div>
            <div class="col-xl-6 col-md-5">
                <div class="wsus__topbar_right">
                    @auth()
                        <a href="{{route('user.dashboard')}}"> Dashboard</a>
                    @endauth
                    @guest()
                        <a href="{{route('login')}}"><i class="fas fa-user"></i> Login</a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</section>
