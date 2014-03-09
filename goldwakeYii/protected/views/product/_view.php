<?php
/* @var $this ProductController */
/* @var $data Product */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo CHtml::encode($data->category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

    <?php echo CHtml::button('Add',
    array(
    'submit'=>array('product/AddToCart/'.$data->id),
    'confirm' => 'Are you sure?'
    // or you can use 'params'=>array('id'=>$id)
    )
    );
    ?>

    <?php echo CHtml::button('To Wishlist',
        array(
            'submit'=>array('product/AddToWishlist/'.$data->id),
            'confirm' => 'Are you sure?'
            // or you can use 'params'=>array('id'=>$id)
        )
    );
    ?>


</div>