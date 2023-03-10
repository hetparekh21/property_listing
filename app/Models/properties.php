<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $property_id
 * @property integer $category_id
 * @property string $property_name
 * @property string $description
 * @property string $loction
 * @property string $price
 * @property string $tags
 * @property Category $category
 * @property PropImg[] $propImgs
 */
class properties extends Model
{
    public $timestamps = false;
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'property_id';

    /**
     * @var array
     */
    protected $fillable = ['category_id', 'property_name', 'description', 'location', 'price', 'tags'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\category', null, 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function propImgs()
    {
        return $this->hasMany('App\Models\prop_img', null, 'property_id');
    }
}
