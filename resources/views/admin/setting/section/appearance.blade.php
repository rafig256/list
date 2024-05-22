<div class="tab-pane fade" id="icon-pills-appearance" role="tabpanel" aria-labelledby="contact">
    <form name="color-setting" method="POST" enctype="multipart/form-data" action="{{route('admin.appearance-setting.update')}}">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="upload mt-4 pr-md-4">
                        <input aria-label="default-color" type="color" name="default-color" class="form-control" value="{{config('settings.default-color') ?? '#f66542'}}"/>
                        <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> select default site color</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="upload mt-4 pr-md-4">

                    </div>
                </div>
            </div>
        </div>

        <div class="">
            <button type="submit" class="btn btn-sm btn-primary">Save data</button>
        </div>
    </form>
</div>
