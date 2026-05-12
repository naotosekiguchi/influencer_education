<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use App\Http\Controllers\Admin\DeliveryController;

class CurriculumController extends Controller
{
    public function showCurriculumList() {
        return view('admin.curriculum_list');
    }
}
