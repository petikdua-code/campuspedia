<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{

    protected $fillable = ['nama', 'email', 'job', 'masalah', 'start', 'finish', 'tgl'];

}
