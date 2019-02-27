<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
   protected $fillable = [ 'id',
            'site_name',
            'contact_number',
            'contact_email',
            'contact_address'];
}
