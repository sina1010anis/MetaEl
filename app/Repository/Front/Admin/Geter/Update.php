<?php
namespace App\Repository\Front\Admin\Geter;

trait Update{

    use BindDataPanel , Created;

    public function update(Array $new_data)
    {
        $this->data->update($new_data);
    }
}
?>