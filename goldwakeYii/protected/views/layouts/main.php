<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
	  <img src="<?php echo Yii::app()->request->baseUrl; ?>/css/header.jpg" width="950" />
		
		<div id="search">
  		<form method="get">
        <input type="text" placeholder="Search" name="search" value="<?php echo isset($_GET['search']) ? CHtml::encode($_GET['search']) : ''; ?>" />
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/css/search.png" class="icon" />
      </form>
    </div>
		
    <div id="logo"><a href="<?php echo Yii::app()->request->baseUrl; ?>"><span class="goldwake"><span class="gold">GOLD</span>WAKE</span> Surf Shop</a></div>
		
    <div id="mainmenu">
  		<?php $this->widget('zii.widgets.CMenu',array(
  			'items'=>array(
  				array('label'=>'Home', 'url'=>array('/site/index')),
  				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
  				array('label'=>'Contact', 'url'=>array('/site/contact')),
          array('label'=>'Products', 'url'=>array('/product/index')),
          array('label'=>'Categories', 'url'=>array('/category/index')),
          array('label'=>'Wishlist', 'url'=>array('/wishlist/index')),
          array('label'=>'Orders', 'url'=>array('/order/index'), 'visible'=>!Yii::app()->user->isGuest),
  				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
          array('label'=>'Registration', 'url'=>array('/registration/index'), 'visible'=>Yii::app()->user->isGuest),
  				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
  			),
  		)); ?>
  	</div><!-- mainmenu -->
  </div><!-- header -->
  <div class="clear"></div>
	
	<div>
  <?php 
    if(isset($this->breadcrumbs)) {
		  $this->widget('zii.widgets.CBreadcrumbs', array(
			  'links'=>$this->breadcrumbs,
	 	  ));
      echo "<!-- breadcrumbs -->";
    }  
	?>
  
  <div id="cart">
    <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/product/cart">
      <img src="<?php echo Yii::app()->request->baseUrl; ?>/css/cart.png" class="icon" title="Display Cart" alt="Display Cart" />
    </a>
    <div class="text"> 
  
    <?php
      $session=new CHttpSession;
      $session->open();
      if (!isset($session['cart']) || !@count($line_items = $session['cart'])) {
        echo "Cart is empty"; 
      }
      else {
        $quantity = 0;
        $sum_price = 0;
        foreach($line_items as $key => $line_item){
          $product = Product::model()->findByPk($key);
          if (isset($product)){
            $quantity = $quantity + $line_item;
            $sum_price = $sum_price + $quantity * $product->price;
          }
        }
        echo $quantity." product".($quantity > 1 ? "s" : "").", ".sprintf("%.2f", $sum_price)." &euro;";
        //echo CHtml::button('Display Cart', array('submit' => array('product/cart'))); 
      }
    ?>
    </div>
  </div><!-- cart -->
  </div>
	<div class="clear"></div>
	
  <?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
  ?>
	<div class="clear"></div>
	
	<div id="content-container">
	 <?php echo $content; ?>
  </div><!-- content-container -->
	<div class="clear"></div>

	<div id="footer">
    Copyright &copy; <?php echo date('Y'); ?> by GoldWake.<br />
		All Rights Reserved.
	</div><!-- footer -->
	<div class="clear"></div>

</div><!-- page -->

</body>
</html>
