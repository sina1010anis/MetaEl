<?php
namespace App\Repository\Front\Admin\Geter;

trait BindDataPanel{
    protected $class;
    public $data;
    public function set_class($class)
    {
        $this->class = new $class;
        return $this;
    }
    public function set_data($where , $name = null , $wheres = null , $data_where = null , $status = true)
    {
        ($status) ? $this->data = $this->class->where($where)->get() : $this->data = $this->class->where($name , $wheres , $data_where)->get() ;
        return $this;
    }
    public function get_data()
    {
        return $this->data;
    }
}


?>