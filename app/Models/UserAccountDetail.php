<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAccountDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_number',
        'account_type',
        'nationality',
        'cid',
        'dob',
        'work_permit',
        'guarenter_id',
        'passport_no',
        'dzongcode',
        'gewocode',
        'villcode',
        'thram_number',
        'house_number',
        'phone_number',
        'email', 
        'new_account_number'
    ];

    public function getDzongnameAttribute()
    {
        return $this->dzongkhag->dzongname;
    }

    public function dzongkhag() {
        return $this->belongsTo(Dzongkhag::class, 'dzongcode');
    }

    public function gewog() {
        return $this->belongsTo(Gewog::class, 'gewocode');
    }

    public function getGewognameAttribute()
    {
        return $this->gewog->gewogname;
    }


    public function village() {
        return $this->belongsTo(Village::class, 'villcode');
    }

    public function getVillagenameAttribute()
    {
        return $this->village->villname;
    }


}
