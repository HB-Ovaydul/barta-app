<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Register;
use Illuminate\Http\Request;

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
            'name' => $request->name,
            'username' => $request->username,
            'bio' => $request->bio,
        ]);

        return back()->with('success', 'updated');
    }
}
