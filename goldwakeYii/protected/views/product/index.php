<?php
/* @var $this ProductController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Products',
);

$this->menu=array(
	array('label'=>'Create Product', 'url'=>array('create'), 'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Manage Product', 'url'=>array('admin'), 'visible'=>!Yii::app()->user->isGuest),
);
?>

<h1>Products</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
