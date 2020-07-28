<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use User; // Instanciamos el modelo Postres 
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;
use Input;
use Storage;

class UsersController extends Controller
{
    public function create()
    {
        $user = User::all();
        return view('admin.user.create', compact('user'));
    }

    public function store($request)
    {
        $user = new User; 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        //$postres->imagen = $request->file('imagen')->store('postres'); 
        $user->save(); 
        return redirect('admin/user')->with('message','Guardado Satisfactoriamente !');
    }
    public function index()
    {
        $user = User::all();
        return view('admin.user.index', compact('user')); 
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin/user.edit',['users'=>$user]);
    }
    public function update(ItemUpdateRequest $request, $id)
    {        
        $user = User::find($id); 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password; 
        if ($request->hasFile('imagen')) {
            $user->imagen = $request->file('imagen')->store('user');
        } 
        $user->save(); 
        Session::flash('message', 'Editado Satisfactoriamente !');
        return Redirect::to('admin/user');
    }
    
    public function destroy($id)
    {
        //$imagen = Postres::find($id); 
//        foreach($imagen as $image){
  //          Storage::delete($image['imagen']);
    //    } 
        User::destroy($id);         
        Session::flash('message', 'Eliminado Satisfactoriamente !');
        return Redirect::to('admin/user');
    }
}
