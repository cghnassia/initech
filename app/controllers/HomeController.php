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

		return View::make('index', array('authenticated' => Auth::check(), 'username' => Auth::user()->username));
	}

	public function showSort() {

		if (Request::isMethod('post')) {

			$input = Input::get('input');

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

			$numbers = self::bubbleSort($numbers);
		}
		else {
			return Response::json(array(
				'status' => 'error',
				'msg' => 'malformed request'
			));
		}

		return Response::json(array(
			'status' => 'success', 
			'output' => json_encode($numbers)
		));
	}

}
