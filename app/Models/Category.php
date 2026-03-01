<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function helpRequests()
    {
        return $this->hasMany(HelpRequest::class);
    }
}
