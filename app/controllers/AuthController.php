<?php

class AuthController extends BaseController {

	
	public function doLogin() {


		if (Request::isMethod('post')) {

			$username = Request::get('username');
			$password = Request::get('password');
			$remember = Request::get('remember');

			if (Auth::attempt(array('username' => $username, 'password' => $password), $remember)) {
				//return Redirect::to('/');
				$status = true;
			}
			else {
				$status = false;
			}


			return Response::json(array(
				'status' => $status
			));
		}
		else {
			return View::make('login', array('authenticated' => Auth::check()));
		}

	}

	public function doLogout() {
		Auth::logout();
		return Redirect::to('/');
	}

}