<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	private static function bubbleSort($numbers) {
		
		$sorted = false;
		while (! $sorted) {

			$sorted = true;
			for ($i = 0; $i < count($numbers) - 1; $i++) {
				if ($numbers[$i] > $numbers[$i + 1]) {
					$tmp = $numbers[$i];
					$numbers[$i] = $numbers[$i + 1]; 
					$numbers[$i + 1] = $tmp;
					$sorted = false;
				}
			}
		}

		return $numbers;
	}

	public function showWelcome() {
	
		return View::make('hello');
	}

	public function showIndex() {
		Session::put('token', csrf_token());
		return View::make('index', array('authenticated' => Auth::check(), 'username' => Auth::user()->username, 'token' => Session::get('token')));
	}

	public function showSort() {

		if (Request::isMethod('post')) {

			$input = Request::get('input');
			$token = Request::get('token');

			if($token == Session::get('token')) {

				//check if the input is good (numbers with separators)
				if(! preg_match('/^(\d+[, -]*)+$/', $input)) {
					return Response::json(array(
						'status' => 'error',
						'msg' => 'wrong input'
					));
				}

				$numbers = preg_split('/[, -]+/', $input, -1, PREG_SPLIT_NO_EMPTY);

				//convert string number to int
				for ($i = 0; $i < count($numbers); $i++) {
					$numbers[$i] = intval($numbers[$i]);	
				}

				//no we check if the user has already sorted something
				/*if(Session::has('numbers')) {
					$sessionNumbers = Session::get('numbers');
					//first we remove the number that no longer appear in the new list
					foreach($val in $sessionNumbers) {
						if(array_count_value($val) > array_count_value($val)) {

						}
					}
				}
				else {

				}*/
				$numbers = self::bubbleSort($numbers);
				sleep(1);

				return Response::json(array(
					'status' => 'success', 
					'output' => json_encode($numbers)
				));
			}
		}

		return Response::json(array(
			'status' => 'error',
			'msg' => 'malformed request'
		));
	}

}
