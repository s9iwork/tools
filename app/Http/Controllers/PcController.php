<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PcController extends Controller
{
	/**
	 * トップページを表示する
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('pc/top');
	}
}
