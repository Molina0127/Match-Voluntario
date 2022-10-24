<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Usuario;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nome' => 'required|alpha|max:45',
            'sobrenome'=>'required|alpha|max:60',
            'email' => 'required|unique:usuarios', 'email', 'max:255',
            'datanasc'=>'required|date',
            'cpf'=> 'required|cpf|formato_cpf|unique:usuarios','string',
            'password' => [
                'required','string',
                Password::min(8)->letters()->numbers()->mixedCase()->symbols()
                
            ],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Usuario
     */
    protected function create(array $data)
    {
        return Usuario::create([
            'nome' => $data['nome'],
            'sobrenome'=>$data['sobrenome'],
            'email' => $data['email'],
            'datanasc'=>$data['datanasc'],
            'cpf'=>$data['cpf'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
