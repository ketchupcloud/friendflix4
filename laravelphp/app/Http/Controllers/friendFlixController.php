<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class friendFlixController extends Controller
{
    public function createUser(Request $request){
		$user = new User();
		
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = $request->password;
		$user->save();
		
		return response()->json([$user]);
	}
	
	public function listaUsuarios(){
		$user = User::all();
		return response()->json($user);
	}
	public function userId($id){
		$user = User::findOrFail($id);
		return response()->json([$user]);
	}
	
	public function atualizaUsuarios(request $request, $id){
		$user = User::find($id);
		if($user){
			if($request->name){
				$user->name = $request->name;
			}
			else if($request->password){
				$user->password = $request->password;
			}
			else if($request->email){
				$user->email = $request->email;
			}
			else{
				return response()->json(['insira o parametro a ser atualizado']);
			}
			$user->save();
			return response()->json([$user]);
		}
		else{
			return response()->json(['este user nao existe']);
		}
	}
		
		public function deletaUsuario($id){
			User::destroy($id);
			return response()->json(['Usuario deleteado']);
		}
}
