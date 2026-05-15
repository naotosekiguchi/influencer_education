<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Controllers\Admin\DeliveryController;

class CurriculumController extends Controller
{
    public function showCurriculumList() {
        return view('admin.curriculum_list');
    }
}
