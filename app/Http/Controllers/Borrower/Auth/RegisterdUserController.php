<?php

namespace App\Http\Controllers\Borrower\Auth;

use App\Http\Controllers\Controller;
use App\Models\Borrower;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use Illuminate\View\View;

class RegisterdUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('borrower.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Borrower::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = Borrower::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::guard('borrower')->login($user);

        return redirect(RouteServiceProvider::BORROWERHOME);
    }

}
