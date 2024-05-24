<section id="wsus__package">
    <div class="wsus__package_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 m-auto">
                    <div class="wsus__heading_area">
                        <h2>{{$sectionTitle['pricing_title']}}</h2>
                        <p>{{$sectionTitle['pricing_text']}}</p>
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
