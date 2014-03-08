<?php
/* @var $this OrderProductController */
/* @var $model OrderProduct */

$this->breadcrumbs=array(
	'Order Products'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OrderProduct', 'url'=>array('index')),
	array('label'=>'Create OrderProduct', 'url'=>array('create')),
	array('label'=>'View OrderProduct', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage OrderProduct', 'url'=>array('admin')),
);
?>

<h1>Update OrderProduct <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>