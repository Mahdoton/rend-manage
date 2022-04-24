<?php

namespace App\Observers;

use App\Models\Apiuser;

class Apiuserobserver {

    // 添加动作之前
    public function creating(Apiuser $apiuser) {
        $apiuser->password = bcrypt(request()->get('password'));
    }

}
