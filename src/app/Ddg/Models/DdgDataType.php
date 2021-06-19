<?php

declare(strict_types=1);

namespace App\Ddg\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Ddg\Models\DdgDataType.
 *
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property string $sample
 * @property null|Carbon $created_at
 * @property null|Carbon $updated_at
 * @method static Builder|DdgDataType newModelQuery()
 * @method static Builder|DdgDataType newQuery()
 * @method static Builder|DdgDataType query()
 * @method static Builder|DdgDataType whereCategoryId($value)
 * @method static Builder|DdgDataType whereCreatedAt($value)
 * @method static Builder|DdgDataType whereId($value)
 * @method static Builder|DdgDataType whereName($value)
 * @method static Builder|DdgDataType whereSample($value)
 * @method static Builder|DdgDataType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DdgDataType extends Model
{
    /**
     * @var array 除外カラム
     */
    protected $guarded = ['id'];
}
