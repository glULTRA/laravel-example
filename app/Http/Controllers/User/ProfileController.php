<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PostImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index(User $user){
        // dd($id);
        try {
            $this->authorize('visit', $user);
        } catch (\Throwable $th) {
            $this->authorize('update', $user);
        }
        // $request = Request();
        // $request->session()->forget('error_message');
        return view('users.profile', compact('user'));
    }

    public function rules(Request $request, $isUsernameUpdate){
        return $this->validate($request, [
                'name' => 'required',
                'username' => $isUsernameUpdate ? 'required|min:5|regex:/(^[a-zA-Z]+[a-zA-Z0-9\\-]*$)/u' : 'required|min:5|regex:/(^[a-zA-Z]+[a-zA-Z0-9\\-]*$)/u|unique:users',
                'email' => ['required', Rule::unique('users')->ignore($request->user())],
                'password' => $request->password != null ?  [
                    'required',
                    'string',
                    'min:8',             // must be at least 10 characters in length
                    'regex:/[a-z]/',      // must contain at least one lowercase letter
                    'regex:/[A-Z]/',      // must contain at least one uppercase letter
                    'regex:/[0-9]/',      // must contain at least one digit
                    // 'regex:/[@$!%*#?&]/', // must contain a special character
                ] : '',
                // 'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
    }

    public function store(Request $request, User $user)
    {
                
        $this->authorize('update', $user);
        $validatedData = true;
        $isUsernameUpdate = $request->username == $user->username;
        // $isImageUploaded = $request->file('image');

        if($isUsernameUpdate and $user->email == $request->email and $request->password == null and $user->name == $request->name)
        {
            return redirect()->back()->with('info_message', "You didn't edit any of the fields.");
        }
        
        try {
            $validatedData = $this->rules($request, $isUsernameUpdate);
        } catch (\Throwable $th) 
        {
            $request->session()->put('error_message', 'You missed some data please fill it correctly.');
            // Must be revalidated.
            $validatedData = $this->rules($request, $isUsernameUpdate);
        }

        if($validatedData)
        {
            User::where('id', $user->id)->update($request->only('name', 'username', 'email'));

            $request->password != null ? User::where('id', $user->id)->update([
                "password" => Hash::make($request->password),
            ]) : null;
        }
        
        return redirect()->route("profile", $request->username)->with('message', 'Successfuly updated profile.');
    }

    public function __destruct()
    {
        
    }
}
