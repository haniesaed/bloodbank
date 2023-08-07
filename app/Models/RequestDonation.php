<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestDonation extends Model
{
    use HasFactory;

    protected $table = 'requests';
    const STATUS_APPROVED = "Approved";
    const STATUS_PENDING= "Pending";
    protected $fillable = [
        "user_id",
        "blood_donation_id",
        "status",
    ];
    public function bloodDonation()
    {
        return $this->hasOne(BloodDonation::class , 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
