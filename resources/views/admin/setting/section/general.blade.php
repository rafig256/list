<div class="tab-pane fade active show" id="icon-pills-general" role="tabpanel" aria-labelledby="general">
    <div>
        <form name="general_setting" method="POST" action="{{route('admin.general-setting.update')}}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="site_name">Site Name <span class="text-danger">*</span></label>
                        <input required type="text" name="site_name" class="form-control mb-4" id="site_name" value="{{config('settings.site_name')}}" placeholder="site NAme">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="site_email">Site Email <span class="text-danger">*</span></label>
                        <input required type="email" name="site_email" class="form-control mb-4" id="site_email" value="{{config('settings.site_email')}}" placeholder="Site Email" >
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="site_phone">Site phone <span class="text-danger">*</span></label>
                        <input required type="number" name="site_phone" class="form-control mb-4" id="site_phone" value="{{config('settings.site_phone')}}" placeholder="Site phone">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="site_default_currency">Site Default Currency <span class="text-danger">*</span></label>
                        <select name="site_default_currency" id="site_default_currency" class="form-control mb-4" required>
                            <option>Select</option>
                            @foreach(config('currencies.currency_list') as $key=>$currency)
                                <option value="{{$key}}" @selected(config('settings.site_default_currency') == $key)>{{$currency}} ({{$key}})</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="site_currency_icon">Site Currency Icon <span class="text-danger">*</span></label>
                        <input required type="text" name="site_currency_icon" class="form-control mb-4" id="site_currency_icon" value="{{config('settings.site_currency_icon')}}" placeholder="Site Currency Icon">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="site_currency_position">Site Currency position <span class="text-danger">*</span></label>
                        <select name="site_currency_position" id="site_currency_position" class="form-control mb-4" required>
                            <option value="left" @selected(config('settings.site_currency_position') == 'left')>Left</option>
                            <option value="right" @selected(config('settings.site_currency_position') == 'right')>Right</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="num_sub_cat_in_home">Number of subCategory for show in home page <span class="text-danger">*</span></label>
                        <input required type="number" name="num_sub_cat_in_home" class="form-control mb-4" id="num_sub_cat_in_home" value="{{config('settings.num_sub_cat_in_home')}}" placeholder="number">
                        <small class="text-danger">The number of subcategories displayed at the bottom of the collection on the main page</small>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="site_timezone">Time Zone {{config('settings.site_timezone')}}<span class="text-danger">*</span></label>
                        <select name="site_timezone" id="site_timezone" class="form-control" required>
                            <option value="" selected disabled>Select Time Zone</option>
                            @foreach(config('time-zone') as $key => $timeZone)
                                <option value="{{$key}}" @selected(config('settings.site_timezone') == $key)>{{$timeZone}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>


            <div class="">
                <button type="submit" class="btn btn-sm btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
