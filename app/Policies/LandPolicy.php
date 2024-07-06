<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class LandPolicy {
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    public function update() {
        //
    }

    public function create(): bool {
        return is_normal_user();
    }
}
