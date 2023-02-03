<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $img_id
 * @property integer $property_id
 * @property string $img
 * @property Property $property
 */
class prop_img extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'prop_img';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'img_id';

    /**
     * @var array
     */
    protected $fillable = ['property_id', 'img'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function property()
    {
        return $this->belongsTo('App\Models\Property', null, 'property_id');
    }
}
