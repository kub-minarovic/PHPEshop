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

	<b><?php echo CHtml::encode($data->getAttributeLabel('category')); ?>:</b>
	<?php echo CHtml::encode($data->category->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode(sprintf("%.2f", $data->price)); ?> &euro;
	<br />

  <img src="<?= $this->getImageUrl($data->id) ?>" />
  <br />

  <?php 
    echo CHtml::button('Add to cart',
      array(
        'submit'=>array('product/AddToCart/'.$data->id),
        'confirm' => 'Are you sure you want to add '.$data->name.' to the cart?'
      )
    );
  
    if($this->isInWishlist($data->id)) {
      echo CHtml::button('Remove from wishlist',
        array(
          'submit'=>array('product/RemoveFromWishlist/'.$data->id),
          'confirm' => 'Are you sure you want to remove '.$data->name.' from your wishlist?'
        )
      );
    }
    else {
      echo CHtml::button('Add to wishlist',
        array(
          'submit'=>array('product/AddToWishlist/'.$data->id),
          'confirm' => 'Are you sure you want to add '.$data->name.' to your wishlist?'
        )
      );
    }
      
  ?>


</div>