<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Order', 'url'=>array('index'), 'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Create Order', 'url'=>array('create'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->roles == 1),
	array('label'=>'Update Order', 'url'=>array('update', 'id'=>$model->id), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->roles == 1),
	array('label'=>'Delete Order', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->roles == 1),
	array('label'=>'Manage Order', 'url'=>array('admin'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->roles == 1),
);
?>

<h1>View Order #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'user_name',
		'user_surname',
		'user_email',
		'user_phone',
		'billing_address',
		'shipping_address',
		'status',
	),
)); ?>
