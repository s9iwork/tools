<?php

declare(strict_types=1);

namespace App\Ddg\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Ddg\Models\DdgCategory.
 *
 * @property int $id
 * @property string $name
 * @property null|Carbon $created_at
 * @property null|Carbon $updated_at
 * @property-read Collection|DdgDataType[] $dataTypes
 * @property-read null|int $data_types_count
 * @method static Builder|DdgCategory newModelQuery()
 * @method static Builder|DdgCategory newQuery()
 * @method static Builder|DdgCategory query()
 * @method static Builder|DdgCategory whereCreatedAt($value)
 * @method static Builder|DdgCategory whereId($value)
 * @method static Builder|DdgCategory whereName($value)
 * @method static Builder|DdgCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DdgCategory extends Model
{
    /**
     * @var array 除外カラム
     */
    protected $guarded = ['id'];

    /**
     * データ種別を取得する.
     *
     * @return HasMany
     */
    public function dataTypes()
    {
        return $this->hasMany(DdgDataType::class, 'category_id');
    }
}
