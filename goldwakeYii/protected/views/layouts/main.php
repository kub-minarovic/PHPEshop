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
		<div id="logo" style="width: 70%"><?php echo CHtml::encode(Yii::app()->name); ?></div>
        <div style="width: 29.9999%">
<!--            --><?php //if (!Yii::app()->user->isGuest) echo CHtml::encode(Yii::app()->user->roles);  ?>
            <span>
<?php
//echo isset(Yii::app()->session['cart']) ? print_r(Yii::app()->session['cart']) : "Prazdny";
$quantity = 0;
$sum_price = 0;
$session=new CHttpSession;
$session->open();
if (isset($session['cart'])){
    $line_items = $session['cart'];
    foreach($line_items as $key => $line_item){
        $product = Product::model()->findByPk($key);
        if (isset($product)){

            $quantity = $quantity + $line_item;
            $sum_price = $sum_price + $quantity * $product->price;
        }
    }

}
echo "Produktov :".$quantity;
echo "Celkom :".$sum_price;
?>
<?php echo CHtml::button('Kosik', array('submit' => array('product/cart'))); ?>

        </span></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
                array('label'=>'Products', 'url'=>array('/product/index')),
                array('label'=>'Wishlists', 'url'=>array('/wishlist/index')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Registration', 'url'=>array('/registration/index'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
    <?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
    ?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
        <? phpYii::app()->user->isAdmin() ?>
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
