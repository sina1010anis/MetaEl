<?php
namespace App\Repository\Front;

trait Query{
    public function fore($data , $push , String $model)
    {
        foreach($data as $i){
            $push[] = $i->$model;
        }
    }
}

?>