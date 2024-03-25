<?php


namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Package;
use Illuminate\Contracts\View\View;

class PackageComponent extends Component
{
    public $package;

    public function __construct($id)
    {
        $this->package = Package::query()->findOrFail($id);
    }

    public function render(): View
    {
        return view('components.package-component');
    }
}
