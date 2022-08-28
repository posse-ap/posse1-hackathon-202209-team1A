<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    const LATEST_ITEMS_DAYS = 30;

    protected $table = 'items';
    protected $guarded = ['id'];

    /**
     * 新着備品一覧を取得
     *
     * @return Collection
     */
    public static function latestItems(): Collection
    {
        return self::whereDate('created_at', '>=', Carbon::now()->subDays(self::LATEST_ITEMS_DAYS))
            ->with('category')
            ->get();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
