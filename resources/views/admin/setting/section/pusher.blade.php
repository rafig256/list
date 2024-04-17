<div class="tab-pane fade" id="pusher" role="tabpanel" aria-labelledby="contact">
    <form name="pusher_setting" method="POST" action="#">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="app_id">app id <span class="text-danger">*</span></label>
                    <input required type="text" name="app_id" class="form-control mb-4" id="app_id" value="{{config('settings.app_id')}}" placeholder="App Id">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="key">Key <span class="text-danger">*</span></label>
                    <input required type="email" name="key" class="form-control mb-4" id="key" value="{{config('settings.key')}}" placeholder="Key" >
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="secret">Secret <span class="text-danger">*</span></label>
                    <input required type="number" name="secret" class="form-control mb-4" id="secret" value="{{config('settings.secret')}}" placeholder="Secret">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="cluster">Cluster <span class="text-danger">*</span></label>
                    <input required type="text" name="cluster" class="form-control mb-4" id="cluster" value="{{config('settings.cluster')}}" placeholder="Cluster">
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label for="site_currency_position">Active Pusher <span class="text-danger">*</span></label>
                    <select name="site_currency_position" id="site_currency_position" class="form-control mb-4" required>
                        <option value="active" >Active</option>
                        <option value="disable" >disable</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="">
            <button type="submit" class="btn btn-sm btn-primary">Save</button>
        </div>
    </form>
</div>
