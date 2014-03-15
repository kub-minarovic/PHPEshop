<?php
/* @var $this WishlistController */
/* @var $model Wishlist */

$this->breadcrumbs=array(
	'Wishlists'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Wishlist', 'url'=>array('index'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->roles == 1),
	array('label'=>'Create Wishlist', 'url'=>array('create'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->roles == 1),
	array('label'=>'Update Wishlist', 'url'=>array('update', 'id'=>$model->id), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->roles == 1),
	array('label'=>'Delete Wishlist', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->roles == 1),
	array('label'=>'Manage Wishlist', 'url'=>array('admin'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->roles == 1),
);
?>

<h1>View Wishlist #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>

<?php
  foreach ($model->products as $wishproduct){
    echo '<div class="row">';
    echo 'Name :'.$wishproduct->product->name;
    echo '</div>';
    echo '<div class="row">';
    echo 'Price :'.$wishproduct->product->price;
    echo '</div>';
    echo '<div class="row">';
    echo 'Category :'.$wishproduct->product->category->name;
    echo '</div>';
  }
?>
