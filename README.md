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

$menu->asUl( attribute('class' => 'ausomw-ul') );

//OR

$menu->asOl( attribute('class' => 'ausomw-ol') );

// OR

$menu->asDiv( attribute('class' => 'ausomw-div') );

?>
```

## Use with Bootstrap 3 Navbar


First of all, we need to create a helper function that populates our items in a Bootstrap friendly format.

I name this function `bootstrapItems()` (I couldn't really think of a better name, feel free to name it what you please.). 
You can put this function in any file you like as long as it is loaded at application startup.

```php
<?php

function bootstrapItems($items) {
	
	// Starting from items at root level
	if( !is_array($items) ) {
		$items = $items->roots();
	}
	
	foreach( $items as $item ) {
	?>
		<li <?php if($item->hasChildren()): ?> class="dropdown" <?php endif ?>>
		<a href="<?php echo $item->link->get_url() ?>" <?php if($item->hasChildren()): ?> class="dropdown-toggle" data-toggle="dropdown" <?php endif ?>>
		 <?php echo $item->link->get_text() ?> <?php if($item->hasChildren()): ?> <b class="caret"></b> <?php endif ?></a>
		<?php if($item->hasChildren()): ?>
		<ul class="dropdown-menu">
		<?php bootstrapItems( $item->children() ) ?>
		</ul> 
		<?php endif ?>
		</li>
	<?php
	}
}
?>
```


Ok now that we are able to generate the items in a Bootstrap friendly format, let's create some menus:


```php
<?php

// $menu #1
$main = new Menu;

$main->add('<span class="glyphicon glyphicon-home"></span>', '');
$about = $main->add('about', 'about');
   $about->add('Who we are?', 'who-we-are?');
   $about->add('What we do?', 'what-we-do?');
$main->add('Services', 'services');
$main->add('Portfolio', 'portfolio');
$main->add('Contact', 'contact');

// menu #2
$user = new Menu;

$user->add('login', 'login');
$profile = $user->add('Profile', 'profile');
  $profile->add('Account', 'account')
          ->link->prepend('<span class="glyphicon glyphicon-user"></span> ');
  
  $profile->add('Settings', 'settings')
          ->link->prepend('<span class="glyphicon glyphicon-cog"></span> ');
	
?>
```


```html
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Sitepoint</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php echo bootstrapItems($main); ?>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
         	<?php echo bootstrapItems($user); ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

```

Cool! We just made dynamic Bootstrap navbar.

Hope this solves a problem :)