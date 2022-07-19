<?php

namespace App\Repository\Front;

use App\Models\DefaultModel;
use App\Repository\Front\Data\CountItemDataBase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use PhpParser\Builder\Class_;
use PhpParser\Node\Expr\Cast\Array_;

use function PHPUnit\Framework\assertNotTrue;

trait QueryDatabase
{
    use CountItemDataBase;
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
    public function get( $model , Array $data = null , Array $where = null , $status = false){
        if($status == true){
            if ($data == null){
                $this->dataCreate = $model::where($where)->first() ;
            }
        }else{
            if ($data != null){
                ($where == null) ? $this->dataCreate = $model::get($data) :$this->dataCreate = $model::where($where)->get($data) ;
            }else{
                ($where == null) ? $this->dataCreate = $model::get($this->request) :$this->dataCreate = $model::where($where)->get($this->request);
            }
        }
        
    }
    public function gete( $model ,$where = null){
        return $model::where($where)->first(); 
    }
    public function delete( $model , Array $where = null){
        if (auth()->check()){
            ($where == null) ?$model::delete() :$model::where($where)->delete() ;
        }else{
            return false;
        }
    }
    public function update( $model , Array $where = null , Array $newDate ){
        ($where == null) ?$model::update($newDate) :$model::where($where)->update($newDate) ;
    }
}
