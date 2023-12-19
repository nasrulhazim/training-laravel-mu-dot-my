<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    use PasswordValidationRules;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // retrieve all users
        $users = User::paginate(); // select * from users

        // return users listing with retrieved users.
        return view('users.index', compact('users'));

        // return view('users.index', ['pengguna' => $users]);

        // return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate
        $this->validate($request, [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        // store
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make(
                Str::random(32)
            ),
        ]);

        // flash message
        session()->flash('message', [
            'content' => 'You have successfully created new user.',
            'type' => 'success'
        ]);

        // redirect
        return redirect()->route('users.show', $user);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // add validation rule unique
        // if the email input and the current user email
        // in database is not the same.
        $email_rules = ['required', 'string', 'email', 'max:255'];

        if($request->email != $user->email) {
            $email_rules[] = 'unique:users';
        }

        $validation_rules = [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => $email_rules,
        ];

        if($request->has('password') && !empty($request->password)) {
            $validation_rules['password'] = $this->passwordRules();
        }

        // validate
        $this->validate($request, $validation_rules);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if($request->has('password')) {
            $data[] = Hash::make($request->password);
        }

        // update
        $user->update($data);

        // flash message
        session()->flash('message', [
            'content' => 'You have successfully update the user.',
            'type' => 'success'
        ]);

        // redirect
        return redirect()->route('users.show', $user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if(auth()->user()->id == $user->id) {
            // flash message
            session()->flash('message', [
                'content' => 'You cannot delete yourself.',
                'type' => 'error'
            ]);

            return redirect()->route('users.index');
        }

        $user->delete();

        // flash message
        session()->flash('message', [
            'content' => 'You have successfully delete the user.',
            'type' => 'success'
        ]);

        // redirect
        return redirect()->route('users.index');
    }
}
