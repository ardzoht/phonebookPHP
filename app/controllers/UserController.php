<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();

		// load the view and pass the nerds
		return View::make('user.index')
			->with('users', $users);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('user.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$rules = array(
			'name'       => 'required',
			'email'      => 'required|email',
			'phone'       => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('user/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$user = new User;

			$user->name       = Input::get('name');
			$user->last_name      = Input::get('last_name');
			$user->address      = Input::get('address');
			$user->phone = Input::get('phone');
			$user->email      = Input::get('email');
			$user->phone_type = Input::get('phone_type');


			if($user->save()){
				echo "<script type='text/javascript'>alert('$user');</script>";

			} else{
				echo "<script type='text/javascript'>alert('$user');</script>";
			}

			// redirect
			Session::flash('message', 'Usuario creado exitosamente!');
			return Redirect::to('user');

		}
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
		//
		$user = User::find($id);

		// show the edit form and pass the nerd
		return View::make('user.edit')
			->with('user', $user);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$rules = array(
			'name'       => 'required',
			'email'      => 'required|email',
			'phone'       => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('user/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$user = User::find($id);
			$user->name       = Input::get('name');
			$user->last_name      = Input::get('last_name');
			$user->address      = Input::get('address');
			$user->phone = Input::get('phone');
			$user->email      = Input::get('email');
			$user->phone_type = Input::get('phone_type');
			$user->save();

			// redirect
			Session::flash('message', 'usuario guardado exitosamente!');
			return Redirect::to('user');
		}
	}



	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$user = User::find($id);
		$user->delete();

		// redirect
		Session::flash('message', 'Usuario borrado Exitosamente!');
		return Redirect::to('user');
	}


}
