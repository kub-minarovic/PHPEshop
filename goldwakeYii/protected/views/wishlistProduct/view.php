<?php
/* @var $this WishlistProductController */
/* @var $model WishlistProduct */

$this->breadcrumbs=array(
	'Wishlist Products'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List WishlistProduct', 'url'=>array('index')),
	array('label'=>'Create WishlistProduct', 'url'=>array('create')),
	array('label'=>'Update WishlistProduct', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete WishlistProduct', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage WishlistProduct', 'url'=>array('admin')),
);
?>

<h1>View WishlistProduct #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'wishlist_id',
		'product_id',
	),
)); ?>
