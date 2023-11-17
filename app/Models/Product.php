<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'external_id',
        'name',
        'sku',
        'image',
        'description',
        'price',
        'shops_id'
    ];
    public function shops ()
    {
        return $this->belongsTo(Shops::class);
    }
}
