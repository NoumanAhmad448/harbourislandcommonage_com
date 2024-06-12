<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class CreateLand extends Model
{
    use HasFactory;
    protected $table = "land_create";
    protected $guarded = [];

    public function __construct() {
        $this->table = config("table.land_create");
        // array_push($this->fillable, config("table.city"));
    }

    public function insert($user,$input){
        $data = [];
        debug_logs($input);
        debug_logs($user);

        $data = add_key_if_exist(config("table.size"),$input,$data);
        $data = add_key_if_exist(config("table.location"),$input,$data);
        $data = add_key_if_exist(config("table.title"),$input,$data);
        $data = add_key_if_exist(config("table.description"),$input,$data);

        $data[config("table.user_id")] = $user->id;
        $data[config("table.city")."_id"] = $input[config("table.city")];
        debug_logs($data);
        debug_logs(CreateLand::create($data)->toSql());
        return CreateLand::create($data);
    }

}
