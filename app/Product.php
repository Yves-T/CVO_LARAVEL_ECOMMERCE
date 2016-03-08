<?php

namespace App;

use App\Presenters\ProductPresenter;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Product extends Model
{
    use PresentableTrait;
    protected $presenter = ProductPresenter::class;

    protected $fillable = ['category_id', 'title', 'description', 'price', 'availability', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
