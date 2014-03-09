<?php
/* @var $this OrderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Orders',
);

$this->menu=array(
	array('label'=>'Create Order', 'url'=>array('create'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->roles == 1),
	array('label'=>'Manage Order', 'url'=>array('admin'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->roles == 1),
);
?>

<h1>Orders</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
