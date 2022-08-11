<?php

namespace App\Repository\Front;

trait Back
{
    public function back(String $key = Null  , String $message = Null )
    {
        return ($key != Null) ? $this->back_for_msg($key , $message): $this->back_not_msg() ;
    }
    public function back_for_msg($key , $messgae)
    {
        return redirect()->back()->with([$key => $messgae]);
    }
    public function back_not_msg()
    {
        return redirect()->back();
    }
}

?>