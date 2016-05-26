<?php namespace App\Http\Controllers\crud_controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
			$this->middleware('auth');

	}

	public function index()
	{
		if(Auth::user()->name == 'Administrador') {
			$query = 'select id, name, email from users where name not in (\'Administrador\',\'Superadmin\')';
			$usuarios = DB::select($query);
			return view('adminpage.AdminUsuarios')->with('usuarios', $usuarios);
		}
		if(Auth::user()->name == 'Superadmin'){
			$query = 'select id, name, email from users';
			$usuarios = DB::select($query);
			return view('adminpage.AdminUsuarios')->with('usuarios', $usuarios);
		}

		return view('errors.401');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('auth.register');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateUserRequest $request)
	{
		$usuario = User::create($request->except('_token'));
		return Redirect::to('adminpage/Usuarios')->with('notice', 'Elemento ingresado exitosamente!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$usuario = User::find($id);
		return view('auth.reset')->with('usuario',$usuario);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UpdateUserRequest $request, $id)
	{
		$usuario = User::findOrFail($id);
		$usuario->fill($request->except('_token'));
		$usuario->save();
		if($id == Auth::user('id'))
			return Redirect::to('adminpage/Inicio');
		else
			return Redirect::to('adminpage/Usuarios')->with('notice', 'Elemento modificado exitosamente!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		DB::table('users')->where('id', '=', $id)->delete();
		return Redirect::to('adminpage/Usuarios')->with('notice', 'Elemento Eliminado exitosamente!.');
	}

}
