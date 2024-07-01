<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DashboardPolicy
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
    public function view(): bool {
        return isAdmin(false);
    }

    public function viewUser(): bool {
        return is_normal_user();
    }

    public function isSuperAdmin(): bool {
        return isSuperAdmin(false);
    }
    public function isAdmin(): bool {
        return isAdmin(false);
    }
}
