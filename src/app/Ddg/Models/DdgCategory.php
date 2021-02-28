<?php

namespace App\Ddg\Models;

use Illuminate\Database\Eloquent\Model;

class DdgCategory extends Model
{
	/**
	 * @var array 除外カラム
	 */
	protected $guarded = ['id'];

	/**
	 * データ種別を取得する
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function dataTypes()
	{
		return $this->hasMany('App\DdgDataType', 'category_id');
	}

}
