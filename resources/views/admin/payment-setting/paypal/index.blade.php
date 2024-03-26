<div class="tab-pane fade active show" id="paypal" role="tabpanel" aria-labelledby="paypal-setting">
    <div>
        <form name="paypal_setting" method="POST" action="{{route('admin.paypal-setting.update')}}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="paypal_status">Paypal Status <span class="text-danger">*</span></label>
                        <select name="paypal_status" id="paypal_status" class="form-control mb-4" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>

                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="paypal_mode">Paypal Mode <span class="text-danger">*</span></label>
                        <select name="paypal_mode" id="paypal_mode" class="form-control mb-4" required>
                            <option value="sandbox">Sand Box</option>
                            <option value="live">Live</option>

                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="paypal_country">Paypal Country <span class="text-danger">*</span></label>
                        <select name="paypal_country" id="paypal_country" class="form-control mb-4" required>
                            <option value="">Select</option>
                            @foreach(config('countries') as $key => $country)
                                <option value="{{$key}}">{{$country}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="paypal_currency">Paypal Currency <span class="text-danger">*</span></label>
                        <select name="paypal_currency" id="paypal_currency" class="form-control mb-4" required>
                            <option>Select</option>
                            @foreach(config('currencies.currency_list') as $key=>$currency)
                                <option value="{{$key}}" >{{$currency}} ({{$key}})</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="paypal_currency_rate">Paypal Currency Rate per ({{config('settings.site_default_currency')}})<span class="text-danger">*</span></label>
                        <input type="text" name="paypal_currency_rate" class="form-control mb-4" id="paypal_currency_rate" placeholder="paypal currency rate" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="paypal_client_id">Client Id <span class="text-danger">*</span></label>
                        <input type="text" name="paypal_client_id" class="form-control mb-4" id="paypal_client_id" placeholder="Client Id" >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="paypal_secret_key">Paypal Secret Key <span class="text-danger">*</span></label>
                        <input required type="password" name="paypal_secret_key" class="form-control mb-4" id="paypal_secret_key" value="{{config('settings.paypal_secret_key')}}" placeholder="Paypal Secret Key">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="paypal_app_key">Paypal App Key <span class="text-danger">*</span></label>
                        <input required type="text" name="paypal_app_key" class="form-control mb-4" id="paypal_app_key"  placeholder="Paypal App Key">
                    </div>
                </div>

            </div>


            <div class="">
                <button type="submit" class="btn btn-sm btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
