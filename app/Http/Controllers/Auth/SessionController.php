<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginStoreRequest $request)
    {
        if (!Auth::attempt($request->validated())) {
            throw ValidationException::withMessages([
                'email' => 'البريد الالكتروني او كلمة السر خطا'
            ]);
        }

        $user = Auth::user();
        if ($user->is_admin)
            return redirect()->route('dashboard.admin.index');
        return redirect()->route('dashboard.store.index');

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
