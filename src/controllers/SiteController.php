<?php

namespace app\controllers;

use app\core\Controller;
use app\model\ProductModel;

class SiteController extends Controller
{
    public function home()
    {
        $params = [];

        $productModel = new ProductModel();
        $params['listProduct'] = $productModel->getAllProduct();

        return $this->render('home', $params);
    }

    public function productManagement()
    {
        $params = [];

        $productModel = new ProductModel();
        $params['listProduct'] = $productModel->getAllProduct();

        return $this->render('product-management', $params);
    }

    public function cartDetail()
    {
        $params = [];

        $productModel = new ProductModel();
        $params['listProduct'] = $productModel->getAllProduct();

        return $this->render('cart-detail', $params);
    }
}
