<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(){
        return view('admin.home.index');
    }
    public function update_profile(Request $request){
        // ddd($request->all());
        $request->validate([
            'name' => 'required|string|max:50',
            'phone_number' => 'required',
            'gender' => 'required',
            'address' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $image_name = null;
        if(auth()->user()->image && file_exists(storage_path('app/public/'. auth()->user()->image))){
            Storage::delete(['public/', auth()->user()->image]);
        }
        
        if($request->image != null){
            $image_name = $request->file('image')->store('img-profile', 'public');
        }

        User::where('id', auth()->user()->id)
            ->update([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'gender' => $request->gender,
                'address' => $request->address,
                'image' => ($image_name == null) ? auth()->user()->image : $image_name
            ]);

        return redirect()->back()
                         ->with('success', 'Profile successfully changed at '. Carbon::now());
    }
    public function update_password(Request $request){
        $request->validate([
            'password' => 'required|min:6',
            'password_confirmation' => 'same:password|min:6'
        ]);
        
        User::where('id', auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);
        
        return redirect('/admin/home')->with('success', 'Password successfully changed at '.Carbon::now());
    }
}
