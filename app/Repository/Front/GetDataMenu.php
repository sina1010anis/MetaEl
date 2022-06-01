<?php

namespace App\Repository\Front;

use App\Repository\Front\Data\Datas;

class GetDataMenu extends Datas
{
    public function replyMenu()
    {
        return $this->menu();
    }
}
