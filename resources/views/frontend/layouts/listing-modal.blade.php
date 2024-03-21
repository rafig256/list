<div class="modal-content">
    <button type="button" class="btn-close popup_close" data-bs-dismiss="modal" aria-label="Close"><i
            class="far fa-times"></i></button>
    <div class="modal-body">
        <div class="row">
            <div class="col-12 col-xl-12 col-md-12">
                <div class="map_popup_content">
                    <div class="img">
                        <img src="{{$listing->image}}" alt="{{$listing->slug}}" class="img-fluid w-100">
                    </div>
                    <div class="map_popup_text">
                        <span><i class="far fa-star"></i> {{$listing->id}}</span>
                        <span class="red"><i class="far fa-check"></i> verified</span>
                        <h5>{{$listing->title}}</h5>
                        <a class="call" href="callto:{{$listing->phone}}"><i class="fal fa-phone-alt"></i>
                            {{$listing->phone}}</a>
                        <a class="mail" href="mailto:{{$listing->email}}"><i class="fal fa-envelope"></i>
                            {{$listing->email}}</a>
                        <p>{{str(strip_tags($listing->description))->limit(100)}}</p>
                        <a class="read_btn" href="#">read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
