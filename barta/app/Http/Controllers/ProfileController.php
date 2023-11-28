<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Show the user profile
     */
    public function showProfile(): View
    {
        return view('profile.profile_main');
    }
    /**
     * Display the user's profile form.
     */
    public function edit($id): View
    {
       $edit_profile = User::findOrFail($id);
        return view('profile.partials.edit',compact('edit_profile'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $profile_update = User::findOrFail($id);
        $profile_update->update([
            $profile_update->name = $request['name'],
            $profile_update->username = $request['username'],
            $profile_update->bio = $request['bio']
        ]);


        return redirect()->route('profile.edit',$profile_update->id)->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * My Profile
     */
    public function profiles($id)
    {
       $profile_id = User::find($id);
       $posts = Post::where('user_id', $id)->get();
        $totalPostCount = User::where('id', $id)->withCount('posts')->first();

       return view('profile.all_profiles',[
            'profile_id' => $profile_id,
            'posts'      => $posts,
            'totalPostCount' => $totalPostCount
       ]);
    }



}
