<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\PasswordUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Frontend\ProfileUpdateRequest;
use App\Traits\FileUploadTrait;

class ProfileController extends Controller
{
    use FileUploadTrait;

    function updateProfile(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = Auth::user();

        // $imagePath = $this->uploadImage($request, 'avatar');
        // $user->avatar = isset($imagePath) ? $imagePath : $user->avatar;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        toastr('Updated Successfully!', 'success');
        return redirect()->back();
    }

    function updatePassword(PasswordUpdateRequest $request): RedirectResponse
    {
        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();
        toastr('Password updated Successfully!', 'success');
        return redirect()->back();
    }

    function updateAvatar(Request $request) {
        /** Handle Image file */

        $imagePath= $this->uploadImage($request, 'avatar');
        $user=Auth::user();
        $user->avatar=$imagePath;
        $user->save();

        return response(['status'=>'success', 'message'=>"Avatar Update Successfully!"]);
    }
}
