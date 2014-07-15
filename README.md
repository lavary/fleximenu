fleximenu
=========

A Simple menu builder in PHP


**Attention** This package is a basic menu builder and has been developed for an educational purpose. If you're a Laravel developer and looking for a menu builder with adcanced features you can check out [Laravel-menu](https://github.com/lavary/laravel-menu) 

## Usage


```php
<?php

require_once('autoload.php');

$menu = new Menu;

$menu->add('Home', '');

$about = $menu->add('About', 'about');

// since this item has sub items we append a caret icon to the hyperlink text
$about->link->append(' <span class="caret"></span>');

// we can attach HTML attributes to the hyper-link as well
$about->link->attributes(array('class' => 'link-item', 'target' => '_blank'));

$about->attributes('data-model', 'nice');

$t = $about->add('Who we are?', array('url' => 'who-we-are',  'class' => 'navbar-item whoweare'));
$about->add('What we do?', array('url' => 'what-we-do',  'class' => 'navbar-item whatwedo'));


$menu->add('Portfolio', 'portfolio');
$menu->add('Contact',   'contact');

// we're only going to hide items with `display` set to **false**

$menu->filter( function($item){
	if( $item->meta('display') === false) {
		return false;
	}
	return true;
});

// Now we can render the menu as various HTML entities:

echo $menu->asUl( array('class' => 'awesome-ul') );

//OR

echo $menu->asOl( array('class' => 'awesome-ol') );

// OR

echo $menu->asDiv( array('class' => 'awesome-div') );

?>
```

## If You Need Help
Please submit all issues and questions using GitHub issues and I will try to help you :)

## License
Fleximenu is free software distributed under the terms of the MIT license
