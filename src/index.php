<?php

require_once __DIR__.'/../vendor/autoload.php';

use app\core\Application;
use app\controllers\SiteController;
use app\controllers\ProductEditorDialogController;

$app = new Application(__DIR__);

$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/product-management', [SiteController::class, 'productManagement']);
$app->router->get('/cart-detail', [SiteController::class, 'cartDetail']);

$app->router->post('/open-product-editor-dialog', [ProductEditorDialogController::class, 'openDialog']);
$app->router->post('/create-new-product', [ProductEditorDialogController::class, 'createNewProduct']);
$app->router->post('/validate-form', [ProductEditorDialogController::class, 'validateForm']);
$app->router->post('/update-product', [ProductEditorDialogController::class, 'updateProduct']);
$app->router->post('/delete-product', [ProductEditorDialogController::class, 'deleteProduct']);

$app->run();
