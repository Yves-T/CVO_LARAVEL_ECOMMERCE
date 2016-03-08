<?php

namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class ProductPresenter extends Presenter
{

    public function showAvailability()
    {
        $class = ($this->availability) ? 'instock' : 'outofstock';
        $text = ($this->availability) ? 'In Stock' : 'Out of Stock';
        return sprintf('<span class="%s">%s</span>', $class, $text);
    }
}
