<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Show the user profile
     */
    public function showProfile($id): View
    {
        $users = User::where('id', $id)->withCount('posts','comments')->get();
        $posts = Post::where('user_id', $id)->withCount('user','comments')->latest()->get();
        return view('profile.profile_main', compact('users','posts'));
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
        /**
        * Update the avatar for the user.
        */
        $path = '';
        if($request->hasFile('photo')){
            $profile_update = User::findOrFail($id);
            $path = $request->file('photo')->store('photos','public');
            $profile_update->update([$profile_update->photo = $path]);
        }
        $profile_update = User::findOrFail($id);
        $profile_update->update($request->only([
            $profile_update->name = $request['name'],
            $profile_update->username = $request['username'],
            $profile_update->bio = $request['bio'],
        ]));
        return redirect()->route('profile.edit',$profile_update->id);


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
       $posts = Post::where('user_id', $id)->withCount('comments')->latest()->get();
       $totalPostCount = User::where('id', $id)->withCount('posts','comments')->first();

       return view('profile.all_profiles',[
            'profile_id' => $profile_id,
            'posts'    => $posts,
            'totalPostCount' => $totalPostCount,
       ]);
    }
}
