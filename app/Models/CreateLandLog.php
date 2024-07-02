<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class CreateLandLog extends CustomModel
{
    use HasFactory;

    protected $table = "land_create_logs";
    protected $guarded = [];

    public function __construct() {
        $this->table = config("table.land_create_logs");
    }
}
