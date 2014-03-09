<?php
/* @var $this WishlistController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Wishlists',
);

$this->menu=array(
	array('label'=>'Create Wishlist', 'url'=>array('create'), 'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Manage Wishlist', 'url'=>array('admin'), 'visible'=>!Yii::app()->user->isGuest),
);
?>

<h1>Wishlists</h1>
<?php if (Yii::app()->user->isGuest){
    echo '<pre>Please login to visit your wishlist.</pre>';
    echo CHtml::button('Login', array('submit' => array('site/login')));
    }
    else
    {
     $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
    ));
    } ?>

