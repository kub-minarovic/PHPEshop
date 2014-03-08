<?php
/* @var $this WishlistProductController */
/* @var $model WishlistProduct */

$this->breadcrumbs=array(
	'Wishlist Products'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List WishlistProduct', 'url'=>array('index')),
	array('label'=>'Create WishlistProduct', 'url'=>array('create')),
	array('label'=>'View WishlistProduct', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage WishlistProduct', 'url'=>array('admin')),
);
?>

<h1>Update WishlistProduct <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>