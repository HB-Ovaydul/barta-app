<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
     /**
     * Show User Profile Page
     */
   public function viewUserProfile()
   {

      return view('frontend.pages.profile');
   }
     /**
     * Edit Profile
     */
   public function editProfile()
   {
      return view('frontend.pages.edit_profile');
   }
     /**
     * Edit Profile
     */
   public function updateProfile(Request $request, $id)
   {
     $update = Register::findOrFail($id);
     $update->update([
        'full_name' => $request->fullname,
        'username' => $request->username,
        'bio' => $request->bio
     ]);
     return back()->with('success', 'updated');
   }

   /**
    *  User Logout
    */

    public function logOut()
    {
        Auth::guard('register')->logout();
        return redirect()->route('login.page');
    }


}
