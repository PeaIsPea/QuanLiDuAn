<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends BaseModel
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'description', 'publisher_id', 'image', 'like'];
    const STATUS = [
        'In Stock',
        'Out of Stock'
    ];
    
    /**
     * @return BelongsTo
     */
    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }

    /**
     * @return BelongsToMany
     */
    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class);
    }

    /**
     * @return HasMany
     */
    public function keys() : HasMany
    {
        return $this->hasMany(Key::class);
    }
}
