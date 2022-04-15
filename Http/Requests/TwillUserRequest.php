<?php

namespace App\Twill\Capsules\TwillUsers\Http\Requests;

use A17\Twill\Http\Requests\Admin\Request;

class TwillUserRequest extends Request
{
    public function rulesForCreate()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:' . config('twill.users_table', 'twill_users') . ',email',
            'password' => 'required',
            'role' => 'required|not_in:SUPERADMIN',
        ];
    }

    public function rulesForUpdate()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:twill_users,email,' . $this->route('twillUser'),
            'role' => 'required|not_in:SUPERADMIN',
        ];
    }


}
