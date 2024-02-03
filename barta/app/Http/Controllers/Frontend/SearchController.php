<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class SearchController extends Controller
{
    public function searchUser(Request $request)
    {
        $query = $request->query('query');
        $userSearch = User::where('name', 'LIKE', '%'.$query.'%')
                        ->orWhere('username', ' LIKE', '%'.$query.'%')->get();

        return view('profile.search',compact('userSearch'));
    }
}
