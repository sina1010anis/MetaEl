<?php 

namespace App\Repository\Front\Admin\Geter;

use Illuminate\Http\Request;

trait UploadImageProduct{

    public $file;
    public  $name;

    public function set_file(String $file , Request $request)
    {
        if($request->file($file))
        {
            $this->file = $request->file($file);
        }
        return $this;
    }

    public function set_name()
    {
        $this->name = $this->file->getClientOriginalName();
        return $this;
    }

    public function get_file()
    {
        return $this->file;
    }

    public function get_name()
    {
        return $this->name;
    }
    
    public function move_file()
    {
        return $this->file->move(public_path('/image/product/'), $this->set_name()->get_name());
    }

}

?>