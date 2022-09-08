<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $guarded = ['id'];

    /**
     * カテゴリ毎の備品一覧
     * 備品が存在しないカテゴリは取得しない
     *
     * @return Collection
     */
    public static function findCategoriesWithItem(): Collection
    {
        $categories = self::latest()->with('items')->get();

        return $categories->filter(function ($value, $key) {
            return count($value->items->where('is_public', true)) > 0;
        });
    }

    public function items()
    {
        return $this->hasMany(Item::class)->where('is_public', true);
    }
}
