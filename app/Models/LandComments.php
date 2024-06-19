<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class LandComments extends CustomModel
{
    use HasFactory, CustomModelTrait;
    protected $table = "land_comments";
    protected $guarded = [];

    public function __construct() {
        $this->table = config("table.land_comments");
    }

}
