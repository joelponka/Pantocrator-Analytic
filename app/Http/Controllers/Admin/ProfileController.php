<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)
    {
        return view('profile.index', [
            'user' => Auth::user(),
        ]);
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(auth()->id());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email'    => "required|email|unique:users,email,$user->id",
            'phone_number' => ['required', 'numeric'],
            'avatar' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if (!empty($request->file('avatar'))) {
            $file_name = $request->input('name') . '.' .$request->file('avatar')->extension();
            $request->file('avatar')->storeAs('public/users/images', $file_name);

            $input = $request->all();
            $input['avatar'] = $file_name;
        }else {
            $input = $request->all();
        }

        $user->update($input);
        
        Alert::toast(trans('User has been successfully updated.'), 'success');
        return back();
    }
}
