<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LandComments extends CustomModel
{
    use HasFactory, CustomModelTrait;
    protected $table = "land_comments";
    protected $guarded = [];

    public function __construct() {
        $this->table = config("table.land_comments");
    }

    public function insertRecords($user,$input){
        $data = [];
        debug_logs($input);
        debug_logs($user);

        $land_ids = str_to_array($input[config("table.land_create_id")]);
        debug_logs($land_ids);

        foreach ($land_ids as $land_id) {
            $record = [];
            $record[config("table.land_create_id")] = $land_id;
            $record[config("table.created_by")] = $user->id;
            $record[config("table.is_admin_approved")] = $input[config("table.land_ops_id")] == "1";
            $record = add_key_if_exist(config("table.comment"), $input, $record);
            $record[config("table.created_at")] = Carbon::now();

            debug_logs($record);

            $data[] = $record;
        }


        debug_logs($data);
        $created_obj = self::insert($data);

        return $created_obj;
    }

}
