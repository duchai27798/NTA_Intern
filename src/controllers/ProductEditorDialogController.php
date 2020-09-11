<?php

namespace app\controllers;

use app\core\Controller;
use app\model\entities\ProductEntity;
use app\model\ProductModel;

class ProductEditorDialogController extends Controller
{
    public function openDialog()
    {
        $params = [];

        if (isset($_POST['productId']))
        {
            $productModel = new ProductModel();

            $params['product'] = $productModel->getProductById($_POST['productId']);
            $params['title'] = 'Update';
        }
        else
        {
            $params['title'] = 'Create';
        }

        echo $this->renderComponent('product-editor-dialog', $params);
    }

    public function createNewProduct()
    {
        $productModel = new ProductModel();

        echo json_encode($productModel->insertProduct($_POST['product']));
    }

    public function updateProduct()
    {
        $productModel = new ProductModel();

        echo json_encode($productModel->updateProduct($_POST['product']));
    }

    public function validateForm()
    {
        $errorMessage = null;

        if (isset($_POST['isSubmit']))
        {
            if (empty($_POST['name']))
            {
                $errorMessage .= '<li>Name is required</li>';
            }

            if (empty($_POST['price']))
            {
                $errorMessage .= '<li>Price is required</li>';
            }

            if (empty($_POST['urlImg']))
            {
                $errorMessage .= '<li>Image is required</li>';
            }
        }

        if (!$errorMessage)
        {
            echo json_encode(['code' => 200, 'product' => $_POST]);
            return;
        }

        echo json_encode(['code' => 404, 'message' => $errorMessage]);
    }
}