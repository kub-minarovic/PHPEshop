<?php
/* @var $this OrderProductController */
/* @var $model OrderProduct */

$this->breadcrumbs=array(
	'Order Products'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OrderProduct', 'url'=>array('index')),
	array('label'=>'Manage OrderProduct', 'url'=>array('admin')),
);
?>

<h1>Create OrderProduct</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>