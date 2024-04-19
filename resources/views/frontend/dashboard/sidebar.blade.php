<div class="dashboard_sidebar">
    <span class="close_icon"><i class="far fa-times"></i></span>
    <a href="{{route('user.dashboard')}}" class="dash_logo"><img src="{{auth()->user()->avatar ?? ""}}" alt="avatar" class="img-fluid"></a>
    <ul class="dashboard_link">
        <li><a href="{{route('user.dashboard')}}"><i class="fas fa-tachometer"></i>Dashboard</a></li>
        <li><a href="{{route('user.profile.index')}}"><i class="far fa-user"></i> My Profile</a></li>
        <li><a href="{{route('user.listing.index')}}"><i class="fas fa-list-ul"></i> My Listing</a></li>
        <li><a href="dsahboard_create_listing.html"><i class="fal fa-plus-circle"></i> Create Listing</a></li>
        <li><a href="dsahboard_review.html"><i class="far fa-star"></i> Reviews</a></li>
        <li><a href="dsahboard_wishlist.html"><i class="far fa-heart"></i> Wishlist</a></li>
        <li><a href="dsahboard_order.html"><i class="fal fa-notes-medical"></i> Orders</a></li>
        <li><a href="dsahboard_package.html"><i class="fal fa-gift-card"></i> Package</a></li>
        <li><a href="{{route('user.message')}}"><i class="far fa-comments-alt"></i> Message</a></li>
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
