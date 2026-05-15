<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\DeliveryController;
use Illuminate\Http\Request;
use App\Models\Admin;

class CurriculumController extends Controller
{
    public function showCurriculumList() {
        return view('admin.curriculum_list');
    }
}
