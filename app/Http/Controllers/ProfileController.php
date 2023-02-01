<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */

    public function profil(Request $request)
     {
         return view('profile.profile', [
             'user' => $request->user(),
         ]);
    }


    public function profileAccount(Request $request)
    {
        if (Auth::check() && Auth::user()->roles == 'admin') {
            return redirect('/admin');
        }
       

        return view('profile.profileAccount', [
            'user' => $request->user(),
        ]);
    }

    public function profileSecurity(Request $request)
    {
        return view('profile.profileSecurity', [
            'user' => $request->user(),
        ]);
    }

    public function upload(Request $request){

        $this->validate($request, [
			'photo' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('photo');
		$tujuan_upload = 'data_file';
        
        $unique = uniqid();
                // upload file
		$file->move($tujuan_upload,$unique.$file->getClientOriginalName());

        $users = User::find($request->input('id'));
        $users->images = $tujuan_upload."/".$unique.$file->getClientOriginalName();
        if($users->save()){
            return redirect()->back()->with('message_upload', 'Upload Gambar Berhasil');
        }else{
            return redirect()->back()->with('message_upload_error', 'Gagal Upload Gambar');
        }
    }

    /**
     * Update the user's profile information.
     *
     * @param  \App\Http\Requests\ProfileUpdateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileUpdateRequest $request)
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            'success' => true,
            'message' => 'Akun Berhasil Dihapus',  
        ]);
    }
}
