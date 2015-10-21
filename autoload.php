<?php
function __autoload($class) {
	require_once('lib/' . strtolower($class) . '.php');
}


function bootstrapItems($items) {
	
	// Starting from items at root level
	if( !is_array($items) ) {
		$items = $items->roots();
	}
	
	foreach( $items as $item ) {
	?>
		<li<?php if($item->hasChildren()): ?> class="dropdown"<?php endif ?><?php echo $item->manager->parseAttr($item->attributes()); ?>>
		<a href="<?php echo $item->link->get_url() ?>" <?php if($item->hasChildren()): ?> class="dropdown-toggle" data-toggle="dropdown" <?php endif ?><?php echo $item->manager->parseAttr($item->link->attributes()); ?>>
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