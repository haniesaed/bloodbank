<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BloodDonation extends Model
{
    use HasFactory , SoftDeletes;
    protected $dateFormat = 'Y-m-d';

    const STATUS_UNAPPROVED = "Unapproved";

    protected $fillable = [
      "user_id",
      "location",
      "blood_type",
      "quantity",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function feedback()
    {
        return $this->hasOne(User::class);
    }
    public function requestDonation()
    {
        return $this->belongsTo(RequestDonation::class);
    }
}
