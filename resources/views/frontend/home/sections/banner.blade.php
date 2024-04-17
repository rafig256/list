<section id="wsus__banner" style="background-image: url('{{asset(@$hero->background)}}');">
    <div class="wsus__banner_overlay">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-6 col-lg-7">
                    <div class="wsus__banner_text">
                        <h1>{!! @$hero->title !!}</h1>
                        <p>{!! @$hero->sub_title !!}</p>
                    </div>
                </div>

                <div class="col-xl-5 col-lg-5">
                    <form method="get" action="{{route('listing')}}">
                        <h3>Find the Best Place Title</h3>
                        <div class="wsus__search_area">
                            <input type="text" placeholder="What we are looking for?" name="search">
                        </div>
                        <div class="wsus__search_area">
                            <select class="select_2" id="category_parent_slug" name="parent_category">
                                <option value="">categories</option>
                                @foreach($parentCategories as $category)
                                    <option value="{{$category->slug}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="wsus__search_area">
                            <select class="select_2" id="category_slug" name="category">
                                <option value="">First select the collection</option>
                            </select>
                        </div>
                        <div class="wsus__search_area">
                            <select class="select_2" name="parent_location" id="location_parent_slug">
                                <option value="">location</option>
                                @foreach($parentLocations as $location)
                                    <option value="{{$location->slug}}">{{$location->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="wsus__search_area">
                            <select class="select_2" id="location_slug" name="location">
                                <option value="">First select the location</option>
                            </select>
                        </div>
                        <div class="wsus__search_area m-0">
                            <button type="submit" class="read_btn">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
