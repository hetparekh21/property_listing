<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $category_id
 * @property integer $category_name
 * @property string $tags
 * @property string $img
 * @property Property[] $properties
 */
class category extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'category';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'category_id';

    /**
     * @var array
     */
    protected $fillable = ['category_name', 'tags', 'img'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function properties()
    {
        return $this->hasMany('App\Models\properties', null, 'category_id');
    }
}
