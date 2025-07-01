<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class Helper {
    public static function parsing_alert($message)
    {
        $string = '';
        if (is_array($message)) {
            foreach ($message as $key => $value) {
                $string .= ucfirst($value) . '<br>';
            }
        } else {
            $string = ucfirst($message);
        }
        return $string;
    }

    public static function get_permission_by_role()
    {
        $get_roles_user = Auth::user()->roles->pluck('id')->toArray();
        /**1 = developer */
        if (in_array(1, $get_roles_user)) {
            $permission = Permission::get();
        } else {
            $not_in = [
                2, //user-read
                8, //permission-delete
                9, //permission-update
                10, //permission-list
                11, //permission-create
                12, //permission-delete
                13, //user-create
                14, //user-update
                15, //user-delete
                16, //user-store
            ];
            $permission = Permission::whereNotIn('id', $not_in)
                ->get();
        }

        return $permission;
    }
}
