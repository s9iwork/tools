<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class DdgController
 * @package App\Http\Controllers
 */
class DdgController extends Controller
{
	/**
	 * トップページを表示する
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('ddg/top');
	}
}
