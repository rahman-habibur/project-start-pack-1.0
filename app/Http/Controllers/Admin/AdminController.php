<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AdminController extends Controller
{
    /**
     * Profile.
     */
    public function profile()
    {
        $id = Auth::user()->id;
        $data = User::find($id);

        return view('admin.admin_profile', compact('data'));
    } //end method

    /**
     * Edit profile
     */
    public function edit_profile()
    {
        $id = Auth::user()->id;
        $editdata = User::find($id);
        return view('admin.edit_profile', compact('editdata'));
    } //end method

    /**
     * Store profile 
     */
    public function store_profile(Request $request)
    {
        $id = Auth::user()->id;
        $storedata = User::find($id);

        $storedata->name = $request->name;
        $storedata->email = $request->email;
        $storedata->username = $request->username;

        if($request->file('image')){
            $file = $request->file('image');
            $filename = date('ymd').$file->getClientOriginalName();
            $file->move(public_path('uploads/admin_images'), $filename);
            $storedata->profile_image = $filename;
        }
        $storedata->save();

        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.profile')->with($notification);
    } //end method

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * view pass change
     */
    public function changepass_view()
    {
        return view('admin.change_password');
    }

    /**
     * Admin change password
     */
    public function admin_changes_update(Request $request){

        $validateData = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required | same:new_password',
        ]);

        $hashPassword = Auth::user()->password;
        if(Hash::check($request->old_password, $hashPassword)){
            $user = User::find(Auth::id());
            $user->password = bcrypt($request->new_password);
            $user->save();

            session()->flash('message', 'Password Updated Successfully');
            return redirect()->route('admin.logout');
        }
        else{
            session()->flash('message', 'Old Password Doesn\'t Match');
            return redirect()->back();
        }
    }

    /**
     * Admin logout
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Log out Successfully',
            'alert-type' => 'success',
        );
        return redirect('/login')->with($notification);
    }
}
