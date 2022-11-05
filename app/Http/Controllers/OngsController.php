<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Ong;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class OngsController extends Controller
{
    //

    /*public function show() {
        return view('site.ongs.ongs_details');
    }*/

    public function index() {
        return view('site.ongs.ongs');
    }
    public function create() {
        $categorias = Categoria::orderBy('categoria_name', 'ASC')->pluck('categoria_name', 'id');
        return view('site.ongs.signup', compact('categorias'));
    }
    /*public function store(Request $request){
        $cnpj_api_response = Http::get('https://publica.cnpj.ws/cnpj/'. $request->cnpj);

        if (isset ($cnpj_api_response['status']) && $cnpj_api_response['status'] != 200){
            return 'CNPJ inválido';
        }

        if ($cnpj_api_response['estabelecimento']['situacao_cadastral'] != "Ativa"){
            return 'CNPJ inativo';
        }

        Ong::create([
            'cnpj'=>$request->cnpj,
            'ong_name'=>$request->ong_name,
            'owner'=>$request->owner,
        ]);
        return redirect('home');
    }*/
    public function store(Request $request){
        Ong::create([
            'cnpj' => $request-> cnpj,
            'ong_email' => $request->ong_email,
            'ong_name' => $request-> ong_name,
            'ong_image' => $request-> ong_image,
            'owner' => $request-> owner,
            'description' => $request->description,
            'ong_city' => $request->ong_city,
            'ong_state' => $request->ong_state,
            'ong_cep' => $request->ong_cep,
            'password' => $request->password
        ]);
        return view('home');
    }
    public function loginOng(){
        return view ('site.ongs.login');
    }
    public function save(Request $request){
            $request->validate([
                'cnpj'=>'required|cnpj|formato_cnpj|unique:ongs',
                'ong_email' => 'required|unique:ongs', 'email', 'max:255',
                'ong_name'=>'required|unique:ongs|max:255|string',
                'owner'=>'required|regex:/^[\p{L}\s-]+$/u|max:60',
                'description'=>'required|string',
                'ong_city'=>'required|regex:/^[\p{L}\s-]+$/u|max:60',
                'ong_state'=>'required',
                'ong_cep'=>'required',
                'password' => [
                    'required','string',
                    Password::min(8)->letters()->numbers()->mixedCase()->symbols()
                    
                ],
                
            ]);
    
            $ong = new Ong;   
            $ong->cnpj = $request->cnpj;
            $ong->ong_email = $request->ong_email;
            $ong->ong_name = $request->ong_name;
            $ong->ong_image = $request->ong_image;
            $ong->owner = $request->owner;
            $ong->description = $request->description;
            $ong->ong_city = $request->ong_city;
            $ong->ong_state = $request->ong_state;
            $ong->ong_cep = $request->ong_cep;
            $ong->password = Hash:: make ($request->password);
            
            if($request->hasFile('ong_image') && $request->file('ong_image')->isValid()){
                $requestImage = $request->ong_image;

                $extension = $requestImage->extension();

                $imageName = md5($requestImage->getClientOriginalName() .strtotime("now") . "." .$extension);

                $request->ong_image->move(public_path('img/ongs'), $imageName);

                $ong->ong_image = $imageName;
            }
            
            $save = $ong->save();
            $ong->categorias()->sync($request->categoria_id, false); 
    
            if($save){
                return back()->with('ong_savemsg', 'Cadastro concluído com sucesso');
            }else {
                return 'O cadastro não pode ser concluído com sucesso';
            }        

    }
    public function logoutOng(){
        $ongs = Ong::all();
       Auth::guard('ong')->logout();
       return view('site.home', compact('ongs'));
    }
    
    
    public function show(){
        $search = request('search');

        if($search){
            $ongs = Ong::where([
                ['ong_name', 'like', '%'.$search.'%']
            ])->get();

        } else {
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
        }
        return view('site.ongs.ongs', ['ongs'=> $ongs, 'search' => $search]);
    }

    public function showOng($id){
        $ongs = Ong::findOrFail($id);
        $usuario = Auth::user();
        $ong_categorias = $ongs->categorias->pluck('categoria_name');


        $usuario = auth()->user();
        $hasUserJoined = false;

        if($usuario){
            $usuarioOngs = $usuario->ongs;
            
            foreach($usuarioOngs as $usuarioOng){
                if($usuarioOng->id == $id){
                    $hasUserJoined = true;
                }
            }
        }

    



        return view('site/ongs/showOng', ['ongs' => $ongs, 'ong_categorias' => $ong_categorias, 'hasUserJoined' => $hasUserJoined, 'usuario' => $usuario]);
    }
    public function showUsuario($id){
        $ong_logada = Auth::guard('ong')->user();
        $usuario = Usuario::findOrFail($id);

        if(!$ong_logada){
            return view('site.ongs.login');
        }
        
        $ong = Auth::guard('ong')->user();

        $usuario_categorias = $usuario->categorias->pluck('categoria_name');        

        $hasOngJoined = false;

        if($ong){
            $ongUsuarios = $ong->usuarios;

            foreach($ongUsuarios as $ongUsuario){
                if($ongUsuario->id == $id){
                    $hasOngJoined = true;
                }
            }
        }
        return view('site/usuarios/showUsuario', ['usuario' => $usuario,'usuario_categorias' => $usuario_categorias, 'hasOngJoined' => $hasOngJoined]);
    }
    public function destroy($id){
        $ong_logada = Auth::guard('ong')->user();
        if($ong_logada){
            $ong = Ong:: findOrFail($id);
            $ong->delete();
            Auth::guard('ong')->logout();
            return view('site.ongs.login');
        }else{
            return view('site.ongs.login');
        }
       
    }
    public function edit($id){
        $ong_logada_id = Auth::guard('ong')->user()->id;

        if($ong_logada_id == $id){
            $ong = Ong::find($id);
            return view('site\ongs\edit', ['ong' => $ong]);
        }else {
            return back()->with('notfound_ong', 'Erro! id não pertencente a Ong autenticada');
        }
        
    }
    public function update(Request $request, $id){
       if(!$ong = Ong::find($id))
       return back();

       $request->validate([
        'owner'=>'required','regex:/^[\p{L}\s-]+$/u', 'max:60',
        'description'=>'required','regex:/^[\p{L}\s-]+$/u', 'max:255',
        'ong_cep' => 'required',
        'password' => [
            'nullable','string',
            Password::min(8)->letters()->numbers()->mixedCase()->symbols()
            
        ],
    ]);
    if($request->password)
        $data_ong['password'] = bcrypt($request->password);
    if($request->owner)
        $data_ong['owner'] = $request->owner;
    if($request->description)
        $data_ong['description'] = $request->description;
    if($request->ong_cep)
        $data_ong['ong_cep'] = $request->ong_cep;
    if($request->ong_city)
        $data_ong['ong_city'] = $request->ong_city;
    if($request->ong_state)
        $data_ong['ong_state'] = $request->ong_state;

        /*if($request->password == ""){
            return back();
        }*/
        if($request->owner != $ong->owner || $request->description != $ong->description || $request->ong_cep != $ong->ong_cep ||$request->password != "" && !(Hash::check($request->password, $ong->password))){
            $ong->update($data_ong);
            return back()->with('ong', $ong )->with('ong_updmsg', 'Ong atualizada com sucesso');
        }else {
            return back()->with('ong_fail_updtmsg', 'Nenhuma informação alterada');
        }
       
    }
    public function dashboard(){
        $usuario = auth()->user();
        return view('site.ongs.dashboard', compact('usuario'));

    }
    public function ongsasparticipant(){
        $usuario = auth()->user();

        $ong = $usuario->ongs();

        $ongs = $usuario->ongs;

        return view('site.ongs.showMyOngs', ['ongs'=> $ong, 'ongs'=> $ongs], compact('usuario'));
    }
    public function dashboardOng(){
        $ong = Auth::guard('ong')->user();
        if($ong){
            return view('site.usuarios.dashboard', compact('ong'));
        } else {
            return view('site.ongs.login');
        }
    }

   public function leaveOng($id){
        $usuario = auth()->user();

        $usuario->ongs()->detach($id);

        $ong = Ong:: findOrFail($id);

        return back()->with('leaveong', 'Participação removida com sucesso'.$ong->title);

   }

}
