<h1>Cart items</h1>
<?php
foreach ($cart as $line_item)
{
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
}