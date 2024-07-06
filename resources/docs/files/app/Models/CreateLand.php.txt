<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class CreateLand extends CustomModel {
    use CustomModelTrait, HasFactory;

    protected $table = 'land_create';

    protected $guarded = [];

    public function __construct() {
        $this->table = config('table.land_create');
    }

    public function landDetails($user) {
        if (isNotArray($user)) {
            $user = [$user];
        }
        $lands = self::whereIn(config('table.user_id'), $user)
            ->with('landComment', function ($query) {
                return $query->orderByDesc(config('table.created_at'));
            });
        $lands = $lands->showQuery();
        $lands = $lands->orderByDesc(config('table.primary_key'));
        $lands = $lands->get();

        return $lands;
    }

    public function insert($user, $input) {
        $data = [];
        debug_logs($input);
        debug_logs($user);

        $data = add_key_if_exist(config('table.size'), $input, $data);
        $data = add_key_if_exist(config('table.location'), $input, $data);
        $data = add_key_if_exist(config('table.title'), $input, $data);
        $data = add_key_if_exist(config('table.description'), $input, $data);

        $data[config('table.user_id')] = $user->id;
        $data[config('table.city').'_id'] = $input[config('table.city')];
        $created_obj = CreateLand::create($data);
        debug_logs('Before data');
        debug_logs($data);

        $data[config('table.land_id')] = $created_obj->id;
        CreateLandLog::create($data);
        debug_logs('After Data');
        debug_logs($data);

        debug_logs($created_obj->toSql());

        return $created_obj;
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function landFiles() {
        return $this->hasMany(LandFile::class, config('table.land_create_id'));
    }

    public function landComment() {
        return $this->hasMany(LandComments::class, config('table.land_create_id'));
    }

    public function commonUser() {
        return $this->belongsTo(User::class, 'user_id')
            ->whereNull('users.'.config('table.is_super_admin'))
            ->whereNull('users.'.config('table.is_admin'));
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function normalUserRel() {
        return ['users' => function ($query) {
            $query->where('users.'.config('table.is_super_admin'), false);
        }];
    }
}
