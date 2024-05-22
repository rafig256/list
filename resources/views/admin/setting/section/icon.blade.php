<div class="tab-pane fade" id="icon-pills-icon" role="tabpanel" aria-labelledby="contact">
    <form name="pusher_setting" method="POST" enctype="multipart/form-data" action="{{route('admin.logo-setting.update')}}">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="upload mt-4 pr-md-4">
                        <input type="file" name="logo" id="input-file-max-fs" class="dropify" data-default-file="{{config('settings.logo') ? asset(config('settings.logo'))  : asset('default/default_upload.jpg')}}" data-max-file-size="0.5M"/>
                        <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Logo</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="upload mt-4 pr-md-4">
                        <input type="file" name="favicon" id="input-file-max-fs" class="dropify" data-default-file="{{config('settings.favicon') ? asset(config('settings.favicon')) : asset('default/default_upload.jpg')}}" data-max-file-size="0.5M"/>
                        <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Favicon</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="">
            <button type="submit" class="btn btn-sm btn-primary">Save data</button>
        </div>
    </form>
</div>
