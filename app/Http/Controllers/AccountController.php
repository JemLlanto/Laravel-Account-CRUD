<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class AccountController extends Controller
{
    public function showDashboard()
    {
        $accounts = Account::all();
        return view('dashboard', compact('accounts'));
    }

    public function showAddUser()
    {
        return view('Admin.addUserForm');
    }

    public function AddUser(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string|max:50',
            'lastName' => 'required|string|max:50',
            'birthday' => 'required|date',
            'age' => 'required|integer',
            'address' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:accounts,email',
            'password' => 'required|string|min:10|confirmed',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Account::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'birthday' => $request->birthday,
            'age' => $request->age,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $imagePath,
        ]);

        return redirect(route('dashboard'))->with('success', 'Successfully created new user!');
    }

    public function DeleteUser($id)
    {
        $accounts = Account::find($id);

        if (!$accounts) {
            return redirect()->back()->with('error', 'Account not found!');
        }

        $accounts->delete();

        return redirect()->back()->with('success', 'Account deleted successfully');
    }

    public function showEditUser($id)
    {
        $account = Account::findOrFail($id);
        return view('Admin.editUserForm', compact('account'));
    }

    public function EditUser(Request $request, $id)
    {
        $account = Account::findOrFail($id);

        $request->validate([
            'firstName' => 'required|string|max:50',
            'lastName' => 'required|string|max:50',
            'birthday' => 'required|date',
            'age' => 'required|integer',
            'address' => 'required|string|max:100',
            'email' => 'required|string|email|max:100',
            'password' => 'required|string|min:10|confirmed',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = $account->image;
        }

        $account->firstName = $request->firstName;
        $account->lastName = $request->lastName;
        $account->birthday = $request->birthday;
        $account->age = $request->age;
        $account->address = $request->address;
        $account->email = $request->email;

        if ($request->filled('password')) {
            $account->password = Hash::make($request->password);
        }

        $account->image = $imagePath;

        $account->save();

        return redirect(route('dashboard'))->with('success', 'Account details successfully updated!');
    }

    public function RegisterForm()
    {
        return view('auth.register');
    }

    public function LoginForm()
    {
        return view('auth.login');
    }

    public function Register(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string|max:50',
            'lastName' => 'required|string|max:50',
            'birthday' => 'required|date',
            'age' => 'required|integer',
            'address' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:accounts,email',
            'password' => 'required|string|min:10|confirmed',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Account::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'birthday' => $request->birthday,
            'age' => $request->age,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $imagePath,
        ]);

        return redirect(route('login'))->with('success', 'Registered Successfully ');
    }

    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:10'
        ]);

        $account = Account::where('email', $request->email)->first();
        if ($account && Hash::check($request->password, $account->password)) {
            Auth::login($account);
            Session::flash('success', 'Login Successfully');

            return redirect()->route('dashboard');
        }

        return redirect()->back()->withErrors(['email' => 'The provided credentials is incorrect']);
    }

    public function Logout(request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect()->route('login')->with('success', 'Logout Successfully!');
    }
}
