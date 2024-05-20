<div class="dashboard_sidebar">
    <span class="close_icon"><i class="far fa-times"></i></span>
    <a href="{{route('user.dashboard')}}" class="dash_logo"><img src="{{auth()->user()->avatar ?? ""}}" alt="avatar" class="img-fluid"></a>
    <ul class="dashboard_link">
        <li><a href="#"><i class="far fa-user"></i> {{auth()->user()->name}}</a> </li>
        <li><a href="{{route('user.dashboard')}}"><i class="fas fa-tachometer"></i>Dashboard</a></li>
        <li><a href="{{route('user.profile.index')}}"><i class="far fa-user"></i> My Profile</a></li>
        <li><a href="{{route('user.listing.index')}}"><i class="fas fa-list-ul"></i> My Listing</a></li>
        <li><a href="{{route('user.review.index')}}"><i class="far fa-star"></i> My Review</a></li>
        <li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="far fa-sign-out-alt"></i> Log out
            </a>
        </li>
    </ul>
</div>
