<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class CreateLand extends CustomModel
{
    use HasFactory, CustomModelTrait;
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commonUser()
    {
        return $this->belongsTo(User::class, "user_id")
            ->whereNull("users.".config("table.is_super_admin"))
            ->whereNull("users.".config("table.is_admin"));
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function normalUserRel(){
        return ["users" => function($query){
            $query->where("users.".config("table.is_super_admin"),false);
        }];
    }

}
