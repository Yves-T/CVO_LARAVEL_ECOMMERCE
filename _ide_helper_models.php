<?php
/**
 * An helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Category
 *
 */
	class Category extends \Eloquent {}
}

namespace App{
/**
 * App\Product
 *
 * @property-read \App\Category $category
 */
	class Product extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 */
	class User extends \Eloquent {}
}

