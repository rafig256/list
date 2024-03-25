<section id="wsus__package">
    <div class="wsus__package_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 m-auto">
                    <div class="wsus__heading_area">
                        <h2>Our pricing </h2>
                        <p>Lorem ipsum dolor sit amet, qui assum oblique praesent te. Quo ei erant essent scaevola
                            estut clita dolorem ei est mazim fuisset scribentur.</p>
                    </div>
                </div>
            </div>
            <div class="procing_area">
                <div class="row">
                    @foreach($packages as $package)
                        <x-package-component :id="$package->id" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
