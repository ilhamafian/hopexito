<?php

namespace App\Http\Controllers;

use App\Models\ProductTemplate;
use Illuminate\Http\Request;

class MockupController extends Controller
{
    public function shirt()
    {
        $template = ProductTemplate::findOrFail(1);
        $colors = explode(',', $template->color);
        return view('mockup.shirt', compact('template', 'colors'));
    }

    public function oversized()
    {
        $template = ProductTemplate::findOrFail(2);
        $colors = explode(',', $template->color);
        return view('mockup.oversized', compact('template', 'colors'));
    }
}
