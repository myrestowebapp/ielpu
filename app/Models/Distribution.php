<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distribution extends Model
{
    protected $fillable = ['help_request_id', 'amount', 'notes', 'date'];

    protected function casts(): array
    {
        return [
            'date' => 'date',
        ];
    }

    public function helpRequest() { return $this->belongsTo(HelpRequest::class); }
}
