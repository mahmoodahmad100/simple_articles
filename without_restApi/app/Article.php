<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'image', 'description',
    ];

    /**
     * setting up the image
     *
     */

public function setImageAttribute($image) {
        $name = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path().'/uploads/images/', $name);
        $this->attributes['image'] = $name;
    }
}
