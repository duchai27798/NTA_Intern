<?php

namespace app\controllers;

use app\core\Controller;
use app\model\ProductModel;

class ProductEditorDialogController extends Controller
{
    /**
     * Open project editor dialog
     */
    public function openDialog()
    {
        $params = [];

        if (isset($_POST['productId'])) {
            $productModel = new ProductModel();

            $params['product'] = $productModel->getProductById($_POST['productId']);
            $params['title'] = 'Update';
        } else {
            $params['title'] = 'Create';
        }

        echo $this->renderComponent('product-editor-dialog', $params);
    }

    /**
     * Create new project
     */
    public function createNewProduct()
    {
        $productModel = new ProductModel();

        echo json_encode($productModel->insertProduct($_POST['product']));
    }

    /**
     * Update product
     */
    public function updateProduct()
    {
        $productModel = new ProductModel();

        echo json_encode($productModel->updateProduct($_POST['product']));
    }

    /**
     * Delete product
     */
    public function deleteProduct()
    {
        $productModel = new ProductModel();

//        echo $_POST['productId'];
        echo json_encode($productModel->deleteProduct($_POST['productId']));
    }

    /**
     * Validate form
     */
    public function validateForm()
    {
        $errorMessage = null;

        if (empty($_POST['name'])) {
            $errorMessage .= '<li>Name is required</li>';
        }

        if (empty($_POST['price'])) {
            $errorMessage .= '<li>Price is required</li>';
        }

        if (empty($_POST['urlImg'])) {
            $errorMessage .= '<li>Image is required</li>';
        }

        if (!$errorMessage) {
            echo json_encode(['code' => 200, 'product' => $_POST]);
            return;
        }

        echo json_encode(['code' => 404, 'message' => $errorMessage]);
    }
}
