<?php
/* @var $this WishlistProductController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Wishlist Products',
);

$this->menu=array(
	array('label'=>'Create WishlistProduct', 'url'=>array('create')),
	array('label'=>'Manage WishlistProduct', 'url'=>array('admin')),
);
?>

<h1>Wishlist Products</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
