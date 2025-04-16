<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    public function showCurrentProfile()
    {
        $breadcrumb = (object) [
            'title' => 'User Profile',
            'list' => ['Home', 'User Profile']
        ];

        $page = (object) [
            'title' => 'User Information'
        ];

        $activeMenu = 'profile';

        $user = User::find(Auth::id()); // Ensure $user is an Eloquent model instance
        $user = Auth::user();
        return view('profile.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'user' => $user,
            'profilePicture' => $user->profile_picture // Added profile picture
        ]);
    }

    public function showUploadForm()
    {

        return view('profile.upload_form');
    }

    public function uploadPicture(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = Auth::user();

        try {
            if ($user->profile_picture && Storage::exists(str_replace('storage/', 'public/', $user->profile_picture))) {
                Storage::delete(str_replace('storage/', 'public/', $user->profile_picture));
            }

            $file = $request->file('profile_picture');
            $filename = 'user-' . $user->user_id . '.' . $file->getClientOriginalExtension();

            $filePath = '/storage/images/' . $filename;
            $file->storeAs('public/images', $filename);

            $user->profile_picture = $filePath;
            $user->save();

            return response()->json(['success' => true, 'message' => 'Foto Profil berhasil diupload.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Foto Profil gagal diupload.']);
        }
    }
}
