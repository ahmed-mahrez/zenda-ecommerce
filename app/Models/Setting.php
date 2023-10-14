<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
                        'website_name', 'website_url', 'website_title', 'meta_keywords', 'meta_description', 
                        'address', 'phone_1', 'phone_2', 'email_1', 'email_2', 'facebook', 'twitter', 'instagram', 'youtube'
                        ];
    
    


}
