<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $user = new User;
        $user->email = 'your_email_here.com';
        $user->name = 'anime';
        $user->is_super_admin = true;
        $user->email_verified_at = Carbon::now();
        $user->password = Hash::make('your_password_here');
        $user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }
};
