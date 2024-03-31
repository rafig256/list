<section id="wsus__categoryes">
    <div class="wsus__categorye_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 m-auto">
                    <div class="wsus__heading_area">
                        <h2>Our Categories</h2>
                        <p>Parent Categories List and children</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($featuredCategories as $row)
                    <div class="col-xl-4 col-sm-6">
                        <a href="#" class="wsus__category_single">
                            <div class="wsus__category_img">
                                <img src="{{asset($row->background_image)}}" alt="img" class="img-fluid w-100">
                            </div>
                            <div class="wsus__category_text">
                                <div class="wsus__category_text_center">
                                    <i class="fab fa-atlassian"></i>
                                    <p>{{$row->name}}</p>
                                    <span class="green">{{$row->childrens->count()}} subCategory</span>
                                </div>
                            </div>
                        </a>
                        <div>
                            @if($row->childrens->count() > 0 )
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <th>
                                        subCategory
                                    </th>
                                    </thead>
                                    @foreach($row->childrens as $subcategory)
                                        @if ($loop->iteration > config('settings.num_sub_cat_in_home'))
                                            @break
                                        @endif
                                        <tr>
                                            <td>{{$loop->iteration." - ".$subcategory->name}}</td>
                                        </tr>

                                    @endforeach
                                </table>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
