<?php

namespace Lekardal;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function author()
    {
        return $this->belongsTo('Lekardal\User', 'user_id');
    }
}