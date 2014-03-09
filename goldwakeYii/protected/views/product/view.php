<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Product', 'url'=>array('index'), 'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Create Product', 'url'=>array('create'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->roles == 1),
	array('label'=>'Update Product', 'url'=>array('update', 'id'=>$model->id), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->roles == 1),
	array('label'=>'Delete Product', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->roles == 1),
	array('label'=>'Manage Product', 'url'=>array('admin'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->roles == 1),
);
?>

<h1>View Product #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'category_id',
		'price',
	),
)); ?>
