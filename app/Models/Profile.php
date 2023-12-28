<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileimage()
    {

        $path = ($this->profile_picture) ? $this->profile_picture : 'uploads/4FsGtHX2z2ryXpHy3hvPUe6RGKO0uCfGcBuSZdBm.jpg';
        return '/storage/' . $path;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
