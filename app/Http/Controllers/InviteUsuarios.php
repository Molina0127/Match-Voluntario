<?php

namespace App\Http\Controllers;

use App\Models\ConvidaUsuario;
use App\Models\Ong;
use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Facades\Auth;

class InviteUsuarios extends Controller
{
public function send($id){
        $ong_requested = Auth::guard('ong')->user()->id;
        $vol_acceptor = $id;
        $entidadeVol = new ConvidaUsuario();
        $entidadeVol->ong_requested = $ong_requested;
        $entidadeVol->vol_acceptor = $vol_acceptor;
        $entidadeVol->save();
        return back()->with('send_to_user', 'Pedido enviado');
    }
    /*public function delentidadeVol($id){
        $del = DB::table('convida_usuarios')->where('vol_acceptor', $id)->delete();
        return back()->with('delVol', 'Você nao enviou nenhum pedido');
    }*/
    public function showRequests(){
        $showVolRequests = DB::table('convida_usuarios')
        ->leftJoin('ongs', 'ongs.id', 'convida_usuarios.ong_requested')
        ->where('reqstatus',null)->get();

        return view('site.usuarios.showOngsRequests')->with('showVol', $showVolRequests);


    }
    public function acceptInvitation($id){
        $update = DB::table('convida_usuarios')
        ->where('ong_requested',$id)
        ->update(array('reqstatus'=> 1));

        $usuario = Auth::user();

        $usuario->ongs()->attach($id);

        $ong = Ong:: findOrFail($id);

        return back();
    }
    public function deleteInvitation($id){
        $delete = DB::table('convida_usuarios')
        ->where('ong_requested',$id)
        ->delete();
        return back()->with('delVolRequest', 'Pedido removido');
    }
}