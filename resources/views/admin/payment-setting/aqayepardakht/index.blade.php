<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="paypal-setting">
    <div>
        <form name="aqayepadakht_setting" method="POST" action="{{route('admin.aqayepardakht-setting.update')}}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="aqayepardakht_status">AqayePardakht Status <span class="text-danger">*</span></label>
                        <select name="aqayepardakht_status" id="aqayepardakht_status" class="form-control mb-4" required>
                            <option value="active" @selected(config('payment.aqayepardakht_status') === 'active')>Active</option>
                            <option value="inactive" @selected(config('payment.aqayepardakht_status') === 'inactive')>Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="aqayepardakht_pin">Aqayepardakht Pin <span class="text-danger">*</span></label> - <span class="text-danger">For trial use, enter the word sandbox</span>
                        <input type="text" name="aqayepardakht_pin" class="form-control mb-4" id="aqayepardakht_pin" value="{{config('payment.aqayepardakht_pin')}}" placeholder="sandbox" >

                    </div>
                </div>

            </div>


            <div class="">
                <button type="submit" class="btn btn-sm btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
