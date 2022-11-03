<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Components\GoogleAuthenticator\Google2faComponent;


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

    /**creamos el alias para no sobrescribir la funcion register en el trait */
    use RegistersUsers {
          register as registration;
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/R5/validacion';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected Google2faComponent $google2faComponent)
    {
        $this->middleware('guest');
    }

    public function register(Request $request)
    {
       $this->validator($data = $request->all())->validate();
       
       /**generamos valores qr y key */
       $values = $this->google2faComponent->run($data['email']);
       
       /**agregamos el key al request */
       $data['google2fa_secret'] = $this->google2faComponent->getSecretKey();

       /**mantiene la data en request para el registro en sistema despues del 2fa */
       $request->session()->flash('data', $data);

        return view('google2fa.register',$values);
    }

    public function completeRegistration(Request $request)
    {        
        /**agregar la data insertada anteriormente en la session al request */
        $request->merge(session('data'));
        /**continuar con el registro */
        return $this->registration($request);
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => ['required','exists:roles,id']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id'  => $data['role_id'],
            'google2fa_secret' => $data['google2fa_secret'],
        ]);
    }
}
