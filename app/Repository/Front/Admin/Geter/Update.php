<?php
namespace App\Repository\Front\Admin\Geter;

trait Update{

    use BindDataPanel;

    public function update(Array $new_data)
    {
        $this->data->update($new_data);
    }
}
?>