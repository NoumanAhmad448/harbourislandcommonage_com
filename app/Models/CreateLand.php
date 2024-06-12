<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateLand extends Model
{
    use HasFactory;
    protected $table = "land_create";

    public function __construct() {
        $this->table = config("table.land_create");
    }

}
