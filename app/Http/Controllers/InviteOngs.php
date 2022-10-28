<?php

namespace App\Http\Controllers;

use App\Models\ConvidaOng;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Facades\Auth;

class InviteOngs extends Controller
{
    public function send($id){
       $user_requested = Auth::user()->id;
       $acceptor = $id;
       $entidade = new ConvidaOng();
       $entidade->user_requested = $user_requested;
       $entidade->acceptor = $acceptor;
       $entidade->save();
       return back()->with('send_to_Ong', 'Pedido enviado');
    }
    /*public function delentidade($id){
        $dele = DB::table('entidades')->where('acceptor', $id)->delete();
        return back()->with('delent', 'Você não enviou nenhum pedido');
    }*/
    public function showRequests(){
        $ong_logada = Auth::guard('ong')->user();
        if(!$ong_logada){
            return view('site.ongs.login');
        }else{
                $showRequests = DB::table('convida_ongs')
            ->leftJoin('usuarios', 'usuarios.id', 'convida_ongs.user_requested')
            ->where('status',null)->get();

                return view('site.ongs.showUsuariosRequests')->with('show', $showRequests);
        }
        
    }
    public function acceptInvitation($id){
        
        $update = DB::table('convida_ongs')
        ->where('user_requested',$id)
        ->update(array('status'=> 1));

        $ong = Auth::guard('ong')->user();

        $ong->usuarios()->attach($id);
 
        $usuario = Usuario::findOrFail($id);

        return back();
        
    }
    public function deleteInvitation($id){
        $del = DB::table('convida_ongs')
        ->where('user_requested',$id)
        ->delete();
        return back()->with('delRequest', 'Pedido removido');
    }
}