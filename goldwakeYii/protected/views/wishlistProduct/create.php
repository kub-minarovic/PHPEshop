<?php
/* @var $this WishlistProductController */
/* @var $model WishlistProduct */

$this->breadcrumbs=array(
	'Wishlist Products'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List WishlistProduct', 'url'=>array('index')),
	array('label'=>'Manage WishlistProduct', 'url'=>array('admin')),
);
?>

<h1>Create WishlistProduct</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>