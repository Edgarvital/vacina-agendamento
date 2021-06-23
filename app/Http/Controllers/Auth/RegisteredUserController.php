<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        Auth::login($user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]));

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }

    public function alterarSenha()
    {
        return view('user.alterarSenha');
    }

    public function updateSenha(Request $request)
    {
        $usuario = User::find($request->id);

        if (!(Hash::check($request->old_password, $usuario->password)))
            return redirect()->back()->with('fail', true)->with('message', 'Senha incorreta! Alterações não efetuadas.')->with('senha', true);

        $validator = Validator::make($request->all(), [
            'password' => 'min:6|max:16|required_with:password_confirmation',
            'password_confirmation' => 'required_with:password|same:password',
            'old_password' => 'min:6|required'
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors())->withInput();

        $usuario->password = Hash::make($request->password);
        $usuario->save();

        return redirect()->back()->with('success', true)->with('message', 'Senha alterada com sucesso!');

    }
}
