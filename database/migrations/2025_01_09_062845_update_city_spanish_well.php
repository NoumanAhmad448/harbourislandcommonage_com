<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use App\Models\City;

return new class extends Migration
{
    public function up() {
        if (Schema::hasTable(config('table.cities'))) {

            $city = City::where("id",15703)->first();
            $city->is_active = 0;
            $city->update();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        if (Schema::hasTable(config('table.cities'))) {
            $city = City::where("id",15703)->first();
            $city->is_active = 1;
            $city->update();
        }
    }
};
