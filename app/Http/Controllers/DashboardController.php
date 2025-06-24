<?php

namespace App\Http\Controllers;

use App\Models\BusinessCategory;
use App\Models\Category;
use App\Models\Festival;
use Illuminate\Http\Request;

class DashboardController extends Controller
{ 
    
    public function dashboard()
    {
        $total_festival = Festival::count();
        $total_category = Category::count();
        $total_business = BusinessCategory::count(); 
        return view('dashboard',compact('total_festival','total_business','total_category'));
    }
    
    public function settings()
    {
        
        return view('pages.settings.index');
    }
}
