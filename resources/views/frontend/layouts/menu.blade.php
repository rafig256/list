<nav class="navbar navbar-expand-lg main_menu">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            <img src="{{asset('frontend/images/logo.png')}}" alt="DB.Card">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <i class="far fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto">
                @foreach(Menu::getByName('Home') as $menu)
                    <li class="nav-item">
                        <a class="nav-link" href="{{$menu['link']}}">{!! $menu['child'] ? '<i class="far fa-chevron-down"></i>' : '' !!} {{$menu['label']}}</a>
                        @if($menu['child'])
                            <ul class="menu_droapdown">
                                @foreach($menu['child'] as $child)
                                    <li><a href="{{$child['link']}}">{{$child['label']}}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
            <a class="user_btn" href="dsahboard.html"><i class="far fa-plus"></i> add listing</a>
        </div>
    </div>
</nav>
