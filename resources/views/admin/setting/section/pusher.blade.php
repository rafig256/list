<div class="tab-pane fade" id="pusher" role="tabpanel" aria-labelledby="contact">
    <form name="pusher_setting" method="POST" action="{{route('admin.pusher-setting.update')}}">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="pusher_app_id">app id <span class="text-danger">*</span></label>
                    <input required type="text" name="pusher_app_id" class="form-control mb-4" id="pusher_app_id" value="{{config('settings.pusher_app_id')}}" placeholder="App Id">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="pusher_key">Key <span class="text-danger">*</span></label>
                    <input required type="text" name="pusher_key" class="form-control mb-4" id="pusher_key" value="{{config('settings.pusher_key')}}" placeholder="Key" >
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="pusher_secret">Secret <span class="text-danger">*</span></label>
                    <input required type="text" name="pusher_secret" class="form-control mb-4" id="pusher_secret" value="{{config('settings.pusher_secret')}}" placeholder="Secret">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="pusher_cluster">Cluster <span class="text-danger">*</span></label>
                    <input required type="text" name="pusher_cluster" class="form-control mb-4" id="pusher_cluster" value="{{config('settings.pusher_cluster')}}" placeholder="Cluster">
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label for="pusher_active">Active Pusher <span class="text-danger">*</span></label>
                    <select name="pusher_active" id="pusher_active" class="form-control mb-4" required>
                        <option value="1" @selected(config('settings.pusher_active'))>Active</option>
                        <option value="0" @selected(!config('settings.pusher_active'))>disable</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="">
            <button type="submit" class="btn btn-sm btn-primary">Save Pusher Data</button>
        </div>
    </form>
</div>
