<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HelpRequest extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'title', 'description', 
        'amount_required', 'amount_raised', 'location', 'status'
    ];

    public function user() { return $this->belongsTo(User::class); }
    public function category() { return $this->belongsTo(Category::class); }
    public function donations() { return $this->hasMany(Donation::class); }
    public function distributions() { return $this->hasMany(Distribution::class); }
}
