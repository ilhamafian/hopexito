<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductTemplate;
use Livewire\Component;

class AdminTemplate extends Component
{

    public $mockup_image, $mockup_image_2, $commission, $category, $min, $color;

    public function render()
    {
        $totalTemplates = ProductTemplate::count();
        return view('livewire.admin.admin-template', compact('totalTemplates'));
    }
}
