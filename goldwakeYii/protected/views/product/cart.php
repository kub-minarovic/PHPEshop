<h1>Cart items</h1>
<?php
foreach ($cart as $line_item) {
  echo '<div class="row">';
  echo $line_item->category_id;
  echo '</div>';
  echo '<div class="row">';
  echo $line_item->name;
  echo '</div>';
  echo '<div class="row">';
  echo $line_item->id;
  echo '</div>';
  echo '<div class="row">';
  echo $line_item->price;
  echo '</div>';
  echo  CHtml::button('Remove from cart.',
  array(
    'submit'=>array('product/RemoveFromCart/'.$line_item->id),
    'confirm' => 'Are you sure you want to remove '.$line_item->name.' from the cart?'
    // or you can use 'params'=>array('id'=>$id)
  ));
}

echo CHtml::button('Continue with order.',
  array(
    'submit'=>array('order/create'),
    'confirm' => 'Are you sure?'
    // or you can use 'params'=>array('id'=>$id)
  ));