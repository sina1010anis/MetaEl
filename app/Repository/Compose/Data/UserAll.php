<?php

namespace App\Repository\Compose\Data;

use App\Models\User;
use Illuminate\View\View;

class UserAll{

    public function compose(View $view)
    {
        return $view->with('user_all' , User::all());
    }

}

?>