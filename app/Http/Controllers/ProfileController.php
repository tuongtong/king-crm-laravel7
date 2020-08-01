<?php

namespace App\Http\Controllers;
use Redirect;
use Hash;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Staff;

class ProfileController extends Controller
{
    public function getEdit() {
        return view('profile-edit');
    }
    
    public function postEdit(Request $request) {
        $data = staff::find(UserInfo()->id);
        if ($request->password != null) {
            if ($request->password == $request->password_confirmation) {
                $data->password =Hash::make($request->password);
            } else {
                return Redirect::back()->withErrors(['Mật khẩu nhập lại không đúng!']);
            }
        } 
        $data->phone = $request->phone;
        $data->name = $request->name;
        $data->birthday = $request->birthday;
        $data->save();
        
        return redirect()->route('staff.profile.edit.get')->with('success', 'Lưu thông tin thành công!');
    }
}
