<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandFile extends Model
{
    use HasFactory;
    protected $table = "land_files";

    public function __construct() {
        $this->table = config("table.land_files");
    }
}
