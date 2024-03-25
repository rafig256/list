<div class="col-xl-4 col-md-6 col-lg-4">
    <div class="member_price">
        <h4>{{$package->name}}</h4>
        <h5>{{addCurrencyIcon(number_format($package->price,0))}} <span>
                @if($package->num_of_days == -1)
                    Unlimited
                @else
                    {{$package->num_of_days}} Days
                @endif
                                    </span>
        </h5>
        <p>type: {{$package->type}}</p>
        <p>Daily
            cost: {{$package->num_of_days == -1 ? 'one time payment' :round($package->price/$package->num_of_days , 0)." ".config('setting.currency_symbol')}}</p>
        <p>number of
            days: {!! $package->num_of_days == -1 ? "<span class='text-success'>Unlimited</span>" : $package->num_of_days !!}</p>
        <p>number of
            listings: {!! $package->num_of_listings == -1 ? "<span class='text-success'>Unlimited</span>" : $package->num_of_listings !!}</p>
        <p>number of
            photos: {!! $package->num_of_photos == -1 ? "<span class='text-success'>Unlimited</span>" : $package->num_of_photos !!}</p>
        <p>number of
            featured: {!! $package->num_of_featured_listings == -1 ? "<span class='text-success'>Unlimited</span>" : $package->num_of_featured_listings !!}</p>
        <p>number of
            amenities: {!! $package->num_of_amenities == -1 ? "<span class='text-success'>Unlimited</span>" : $package->num_of_amenities !!}</p>
        <a href="{{route('checkout.index',$package->id)}}">Order now</a>
    </div>
</div>
