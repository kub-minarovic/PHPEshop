<?php
/* @var $this WishlistController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Wishlists',
);

$this->menu=array(
	array('label'=>'Create Wishlist', 'url'=>array('create'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->roles == 1),
	array('label'=>'Manage Wishlist', 'url'=>array('admin'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->roles == 1),
);
?>

<h1>Wishlists</h1>
<?php if (Yii::app()->user->isGuest){
    echo 'Please login to visit your wishlist.<br />';
    echo CHtml::button('Login', array('submit' => array('site/login')));
    }
    else
    {
     $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
    ));
    } ?>

