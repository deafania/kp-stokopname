<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function index(){
        $users = User::all();

        return view('pages.user.index', compact('users'));
    }

    public function create(){
        return view('pages.user.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:4|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'picture' => 'nullable|mimes:jpg,jpeg,png,webp|max:5096',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        if ($request->has('picture') && $request->file('picture')->isValid()) {
            $file = $request->file('picture');
            $fileName = str_replace(' ', '-', $file->getClientOriginalName());
            $destinationPath = 'uploads/images';
            $file->move($destinationPath, $fileName);

            $user->picture = $fileName;
            $user->save();
        }

        return redirect()
            ->back()
            ->withSuccess('Berhasil menambah user');
    }

    public function edit(User $user)
    {
        return view('pages.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|min:4|max:255',
            'email' => 'required|email',
            'password' => 'nullable',
            'picture' => 'nullable|mimes:jpg,jpeg,png,webp|max:5096',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        if ($request->has('picture') && $request->file('picture')->isValid()) {
            if ($user->picture != '') {
                $path = public_path('uploads/images/'. $user->picture);

                if (file_exists($path)) {
                    File::delete($path);
                }
            }
            $file = $request->file('picture');
            $fileName = str_replace(' ', '-', $file->getClientOriginalName());
            $destinationPath = 'uploads/images';
            $file->move($destinationPath, $fileName);

            $user->picture = $fileName;
            $user->save();
        }

        return redirect()
            ->back()
            ->withSuccess('Berhasil memperbarui data user');
    }
}
