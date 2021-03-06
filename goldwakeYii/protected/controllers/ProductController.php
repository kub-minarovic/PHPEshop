<?php

class ProductController extends Controller
{

  public static function imagesPath() {
    return Yii::app()->basePath."/../images/products/";
  }
  
  public static function imagesUrl() {
    return Yii::app()->baseUrl."/images/products/";
  }

  public function getImageUrl($id) {
    $extensions = array(".png", ".jpg", ".gif");
    foreach($extensions as $ext) {
      if(file_exists(self::imagesPath().$id.$ext)) return self::imagesUrl().$id.$ext;
    }
  }

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
            array('deny',
                'actions'=>array('create', 'edit'),
                'users'=>array('?'),
            ),
            array('allow',
                'actions'=>array('delete'),
                'users'=>array('admin'),
            ),
            array('deny',
                'actions'=>array('delete'),
                'users'=>array('*'),
            ),
            
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
	  $this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new Product;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Product']))
		{
			$model->attributes = $_POST['Product'];
			$model->image = CUploadedFile::getInstance($model, 'image');
      if($model->save()) {
        $file = $model->id.".".$model->image->extensionName;
        $model->image->saveAs(self::imagesPath().$file);
				$this->redirect(array('view','id'=>$model->id));
			}	
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Product']))
		{
			$model->attributes=$_POST['Product'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Product');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Product('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Product']))
			$model->attributes=$_GET['Product'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

  public function actionMigrate() 
  {
    require_once(Yii::app()->basePath."/migrations/m140308_130414_products.php");
    $model = new m140308_130414_products;
    $model->down();
    $model->up();
  }
  
  public function actionCart(){
    $cart_line_items = array();
    $session=new CHttpSession;
    $session->open();
    if ($session['cart']){
        $line_items = $session['cart'];
        foreach ($line_items as $key => $value){
            $cart_items = new CartLineItem();
            array_push($cart_line_items,Product::model()->findByPk($key));
        }
        $this->render('cart',array(
             'cart'=>$cart_line_items,
        ));

//            $dataProvider=new CActiveDataProvider('Product',$cart_line_items);
//            $this->render('cart',array(
//                'dataProvider'=>$dataProvider,
//            ));

      }else{
          Yii::app()->user->setFlash('error', "No cart items.");
          $this->redirect(array('product/'));
      }



    }

    public function isInWishlist($id) {
      $wishlist = Wishlist::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
      if (!isset($wishlist)) {
        return false;
      }
      $wishlist_product = WishlistProduct::model()->findByAttributes(array('product_id' => $id, 'wishlist_id' => $wishlist->id));
      return isset($wishlist_product);
    }

    public function actionAddToWishlist($id) {
        $wishlist = Wishlist::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
        if (isset($wishlist)){
            $wishlist_product = WishlistProduct::model()->findByAttributes(array('product_id'=>$id,'wishlist_id'=>$wishlist->id));
            if (isset($wishlist_product)){
                Yii::app()->user->setFlash('error', "Selected item is already present in wishlist.");
                $dataProvider=new CActiveDataProvider('Product');
                $this->redirect(array('product/'));
            }else{
                $wishlist_product = new WishlistProduct();
                $wishlist_product->product_id = $id;
                $wishlist_product->wishlist_id = $wishlist->id;
                $wishlist_product->save();
                Yii::app()->user->setFlash('success', "Item added to wishlist.");
                $this->redirect(array('wishlist/'));
            }
        }else{
            $wishlist = new Wishlist();
            $wishlist->user_id = Yii::app()->user->id;
            $wishlist->name = "My wishlist.";
            $wishlist->save();
            $wishlist_product = new WishlistProduct();
            $wishlist_product->wishlist_id = $wishlist->id;
            $wishlist_product->product_id = $id;
            Yii::app()->user->setFlash('success', "Item added to new wishlist.");
            $this->redirect(array('wishlist/'));
        }
    }

    public function actionRemoveFromWishlist($id) {
        $wishlist = Wishlist::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
        if (isset($wishlist)){
            $wishlist_product = WishlistProduct::model()->findByAttributes(array('product_id'=>$id,'wishlist_id'=>$wishlist->id));
            if (isset($wishlist_product)){
                $wishlist_product->delete();
                Yii::app()->user->setFlash('success', "Product removed from wishlist.");
                $dataProvider=new CActiveDataProvider('Wishlist');
                $this->redirect(array('wishlist/'));
            }else{
                Yii::app()->user->setFlash('error', "Wishlist item doesn't exist.");
                $this->redirect(array('wishlist/'));
            }
        }else{
            Yii::app()->user->setFlash('error', "Wishlist no found.");
            $this->redirect(array('wishlist/'));
        }
    }

    public function actionAddToCart($id){
        $session=new CHttpSession;
        $session->open();
        if (isset($session['cart'])){
            $line_items = $session['cart'];
            if (array_key_exists($id,$line_items)){
                $line_items[$id] = $line_items[$id] + 1;
                Yii::app()->user->setFlash('success', "Product added.");
            }else{
                $line_items[$id] = 1;
                Yii::app()->user->setFlash('success', "Product added.");
            }
            $session['cart'] = $line_items;
            $session->close();
            $this->redirect(array('product/'));
        }else{
            $session=new CHttpSession;
            $session->open();
            $cart = array();
            $cart[$id] = 1;
            $session['cart'] = $cart;

//            Yii::app()->session['cart'] = array();
            Yii::app()->user->setFlash('success', "Product added.".print_r($session['cart']));
            $this->redirect(array('product/'));
        }
        //$this->redirect(Yii::app()->user->returnUrl);
    }

    public function actionRemoveFromCart($id){
        $session=new CHttpSession;
        $session->open();
        if (isset($session['cart'])){
            $line_items = $session['cart'];
            if (array_key_exists($id,$line_items)){
                unset($line_items[$id]);
                Yii::app()->user->setFlash('success', "Product removed from cart.");
                $session['cart'] = $line_items;
                $session->close();
                if (isset($line_items)){
                    $this->render('cart',array(
                        'cart'=>$line_items,
                    ));
                }
                $this->redirect(array('product/'));
            }else{
                Yii::app()->user->setFlash('error', "Product not found in cart.");
                $this->render('cart',array(
                    'cart'=>$line_items,
                ));
            }
        }else{
            Yii::app()->user->setFlash('error', "Cart not found.");
            $this->redirect(array('product/'));
        }
    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Product the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Product::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Product $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='product-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
