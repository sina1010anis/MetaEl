<?php

namespace App\Repository\Front;

use App\Models\DefaultModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

trait QueryDatabase
{
    private $request;
    private $model;
    public $dataCreate = null;
    public function set_request($request)
    {
        if (!auth()->check()){
            return false;
        }else{
            $this->request =$request;
            return $this;
        }
    }

    public function create($model , $data = null)
    {
        if ($data != null){
            $this->dataCreate = $model::create($data);
        }else{
            $this->dataCreate = $model::create($this->request);
        }
    }
}
