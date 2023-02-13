<?php

namespace App\Models;

use App\Domain\Contracts\ResultContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = ResultContract::FILLABLE;
}
