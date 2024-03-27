<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $image_url
 * @property string $url
 *
 * @method static inRandomOrder()
 */
class Banner extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image_url',
        'url'
    ];
}
