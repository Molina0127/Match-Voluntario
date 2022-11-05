<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use App\Models\Ong;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    //

    public function index() {
        if(Auth::user()){
            $usuario = Auth::user();
            $user_id = Auth::user()->id;
            $ongs = Ong::select(

                "ongs.*"
    
            )
    
            ->join("categoria_ong", "categoria_ong.ong_id", "=", "ongs.id")
            ->join("categoria_usuario", "categoria_usuario.categoria_id", "=", "categoria_ong.categoria_id")
            ->where("categoria_usuario.usuario_id","=", $user_id)
            ->get();
            return view('site.ongs.ongs', compact('ongs', 'usuario'));
        }else {
            return view ('site.usuarios.login');
        }
    }
    public function auth(Request $request){
        $usuario = Auth::user();
        $credentials = $request->validate([
            'email'=>'required',
            'password' => [
                'required','string',
                Password::min(8)->letters()->numbers()->mixedCase()->symbols()
                
            ],
            
            
        ],[
            'email.required'=> 'E-mail é obrigatório',
            'password.required'=> 'Senha é obrigatória'
        ]);
        if(Auth::guard('web')->attempt($credentials)){
            $request->session()->regenerate();
            
            $usuario = Auth::user();
            $user_id = Auth::user()->id;
            $ongs = Ong::select(

                "ongs.*"
    
            )
    
            ->join("categoria_ong", "categoria_ong.ong_id", "=", "ongs.id")
            ->join("categoria_usuario", "categoria_usuario.categoria_id", "=", "categoria_ong.categoria_id")
            ->where([
                ["categoria_usuario.usuario_id","=", $user_id],
                ["ongs.ong_state", "=" , $usuario->estado],
            ])->get();

            return view('site.ongs.ongs', compact('ongs', 'usuario'));
        
        } else{
            return back()->with('fail', 'E-mail ou senha inválida');
        }
    }
     public function loginOng(){
        if(Auth::guard('ong')->check()){
            $ong = Auth::guard('ong')->user();
            $ong_id = Auth::guard('ong')->user()->id;
            $usuarios = Usuario::select(

                "usuarios.*"
    
    
            )
    
            ->join("categoria_usuario", "categoria_usuario.usuario_id", "=", "usuarios.id")
            ->join("categoria_ong", "categoria_ong.categoria_id", "=", "categoria_usuario.categoria_id")
            ->where("categoria_ong.ong_id","=", $ong_id)
            ->get();
            return view('site.usuarios.usuarios', compact('usuarios', 'ong'));
        } else {
            return view ('site.ongs.login');
        }
    }
    public function authOng(Request $request){
        $credentials = $request->validate([
            'ong_email'=>'required',
            'password' => [
                'required','string',
                Password::min(8)->letters()->numbers()->mixedCase()->symbols()
                
            ],
            
            
        ],[
            'ong_email.required'=> 'E-mail Ong é obrigatório',
            'password.required'=> 'Senha é obrigatória'
        ]);
        if(Auth::guard('ong')->attempt($credentials)){
            $request->session()->regenerate();
            
            $ong = Auth::guard('ong')->user();
            $ong_id = Auth::guard('ong')->user()->id;
            $usuarios = Usuario::select(

                "usuarios.*"
    
            )
    
            ->join("categoria_usuario", "categoria_usuario.usuario_id", "=", "usuarios.id")
            ->join("categoria_ong", "categoria_ong.categoria_id", "=", "categoria_usuario.categoria_id")
            ->where([
                ["categoria_ong.ong_id","=", $ong_id],
                ["usuarios.estado", "=", $ong->ong_state],
            ])->get();
            return view('site.usuarios.usuarios', compact('usuarios', 'ong'));
        
        } else{
            return back()->with('fail', 'E-mail da Ong ou senha inválida');
        }
        
           
    }
}