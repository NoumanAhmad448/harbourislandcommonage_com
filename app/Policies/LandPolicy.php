<?php

namespace App\Policies;

use App\Models\CreateLand;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LandPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update()
    {
        //
    }
    public function create()
    {
        return is_normal_user();
    }
}
