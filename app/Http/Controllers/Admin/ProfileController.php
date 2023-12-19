<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PasswordUpdateRequest;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Traits\FileUploadTrait;
use Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    use FileUploadTrait;

    function index(): View
    {
        return view('admin.profile.index');
    }

    function updateProfile(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = Auth::user();

        $imagePath = $this->uploadImage($request, 'avatar');
        $user->avatar = isset($imagePath) ? $imagePath : $user->avatar;
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
}
