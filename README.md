fleximenu
=========

A flexible menu builder in PHP


## Usage


```php
<?php

$menu = new Menu;

$menu->add('Home', '');

$about = $menu->add('About', 'about');

// since this item has sub items we append a caret icon to the hyperlink text
$about->link->append(' <span class="caret"></span>');

// we can attach HTML attributes to the hyper-link as well
$about->link->attributes(['class' => 'link-item', 'target' => '_blank']);

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

echo $menu->asUl( attribute('class' => 'ausomw-ul') );

//OR

echo $menu->asOl( attribute('class' => 'ausomw-ol') );

// OR

echo $menu->asDiv( attribute('class' => 'ausomw-div') );

?>
```

## If You Need Help
Please submit all issues and questions using GitHub issues and I will try to help you :)

## License
Fleximenu is free software distributed under the terms of the MIT license
