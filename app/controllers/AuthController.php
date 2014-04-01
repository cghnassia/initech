<?php

class AuthController extends BaseController {

	
	public function doLogin() {


		if (Request::isMethod('post')) {

			$username = Request::get('username');
			$password = Request::get('password');
			$remember = Request::get('remember');
			$token = Request::get('token');

			if ($token == Session::get('token') && Auth::attempt(array('username' => $username, 'password' => $password), $remember)) {
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
			Session::put('token', csrf_token());
			return View::make('login', array('authenticated' => Auth::check(), 'token' => Session::get('token')));
		}

	}

	public function doLogout() {
		Auth::logout();
		return Redirect::to('/');
	}

}