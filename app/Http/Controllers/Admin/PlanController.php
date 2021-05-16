<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    //
    public function index(){
        // return 'Página inicial dos planos';
        return view('admin.pages.plans.index');
    }
}
