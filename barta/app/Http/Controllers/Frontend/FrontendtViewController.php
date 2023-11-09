<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Register;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FrontendtViewController extends Controller
{
     /**
     * Show home Page
     */
   public function viewHomePage()
   {
      return view('frontend.pages.home');
  }

}
