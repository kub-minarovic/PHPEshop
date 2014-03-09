<?php

class ProductController extends Controller
{
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
                'roles'=>array('admin'),
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
		$model=new Product;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Product']))
		{
			$model->attributes=$_POST['Product'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

    public function actionCart(){
        $cart_line_items = array();
        $session=new CHttpSession;
        $session->open();
        if (isset($session['cart'])){
            $line_items = $session['cart'];
            foreach ($line_items as $key => $value){
                $cart_items = new CartLineItem();
                array_push($cart_line_items,Product::model()->findByPk($key));
            }
            Yii::app()->user->setFlash('success', "Retrieved cart items");
            $this->render('cart',array(
                 'cart'=>$cart_line_items,
            ));

//            $dataProvider=new CActiveDataProvider('Product',$cart_line_items);
//            $this->render('cart',array(
//                'dataProvider'=>$dataProvider,
//            ));

        }else{
            Yii::app()->user->setFlash('error', "No cart items.");
            $this->redirect(Yii::app()->user->returnUrl);
        }



    }

    public function actionAddToWishlist($id) {
        $wishlist = Wishlist::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
        if (isset($wishlist)){
            $wishlist_product = WishlistProduct::model()->findAllByAttributes(array('product_id'=>$id));
            if (isset($wishlist_product)){
                Yii::app()->user->setFlash('error', "Selected item is already present in wishlist.");
                $this->redirect(Yii::app()->user->returnUrl);
            }else{
                $wishlist_product = new WishlistProduct();
                $wishlist_product->product_id = $id;
                $wishlist_product->wishlist_id = $wishlist->id;
                Yii::app()->user->setFlash('success', "Item added to wishlist.");
                $this->redirect(Yii::app()->user->returnUrl);
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
            $this->redirect(Yii::app()->user->returnUrl);
        }
    }

    public function actionAddToCart($id){
        $session=new CHttpSession;
        $session->open();
        if (isset($session['cart'])){
            $line_items = $session['cart'];
            if (array_key_exists($id,$line_items)){
                $line_items[$id] = $line_items[$id] + 1;
                Yii::app()->user->setFlash('success', "add one");
            }else{
                $line_items[$id] = 1;
                Yii::app()->user->setFlash('success', "set one");
            }
//        if (isset(Yii::app()->session['cart'])){
//            $line_items = Yii::app()->session['cart'];
//            if (array_key_exists($id,$line_items)){
//                $count = 0;
//                $count = $line_items[$id];
//                $line_items[$id] = $line_items[$id]++;
//                Yii::app()->user->setFlash('notice', "add one");
//            }else{
//                $line_items[$id] = 1;
//                Yii::app()->user->setFlash('notice', "set one");
//            }
//            Yii::app()->session['cart'] = $line_items;
            //Yii::app()->user->setFlash('notice', "Cart is set");
            $session['cart'] = $line_items;
            $session->close();
            $this->redirect(Yii::app()->user->returnUrl);
        }else{
            $session=new CHttpSession;
            $session->open();
            $cart = array();
            $cart[$id] = 1;
            $session['cart'] = $cart;

//            Yii::app()->session['cart'] = array();
            Yii::app()->user->setFlash('success', "Cart is not set");
            $this->redirect(Yii::app()->user->returnUrl);
        }
        //$this->redirect(Yii::app()->user->returnUrl);
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
