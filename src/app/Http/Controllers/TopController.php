<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class TopController extends Controller
{
	/**
	 * @return Application|Factory|View
	 */
	public function getTop()
	{
		return view('top');
	}
}
