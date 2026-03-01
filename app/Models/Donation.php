<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = ['donor_id', 'help_request_id', 'amount', 'transaction_id'];

    public function donor() { return $this->belongsTo(User::class, 'donor_id'); }
    public function helpRequest() { return $this->belongsTo(HelpRequest::class); }
}
