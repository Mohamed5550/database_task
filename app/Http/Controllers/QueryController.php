<?php

namespace App\Http\Controllers;

use App\Models\User;

class QueryController extends Controller
{
    public function index()
    {
        return response()->json(
            User::leftJoin('user_has_role', 'user_has_role.user_id', '=', 'users.id')
                ->join('roles', 'roles.id', '=', 'user_has_role.role_id')
                ->orderBy('roles.created_at')
                ->groupBy('users.id')
                ->select('users.*')
                ->get()
        );
    }
}
