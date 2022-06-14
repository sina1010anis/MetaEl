<?php

namespace App\Repository\Front\Comment;

use App\Models\DefaultModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

trait SetupCommentProduct
{
    private $request;
    private $model;
    public $dataCreate = null;
    public function set_request(Request $request)
    {
        if (!auth()->check()){
            return false;
        }else{
            $this->request = collect($request);
            $this->request->put('user_id' , auth()->user()->id);
            return $this;
        }
    }

    public function create($model , $data = null)
    {
        if ($data != null){
            $this->dataCreate = $model::create($data);
        }else{
            $this->dataCreate = $model::create([$this->request]);
        }
    }
}
