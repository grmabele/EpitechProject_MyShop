<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'private',
        'logo_url',
        'cover_photo_url',
        'recruitment_url',
        'short_description',
        'ceo_name',
        'full_description',
        'why_join_us',
        'need_profiles',
        'discover_our_teams',
        'locale',
        'uuid'
    ];

    protected $hidden = [ 'created_at', 'updated_at', 'deleted_at'];

}
