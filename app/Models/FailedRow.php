<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FailedRow extends Model
{
   protected $quarded = false;
   protected $table = 'failed_rows';
}
