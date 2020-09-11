<?php

namespace app\model;

use app\model\entities\ProductEntity;
use app\utils\Model;
use PDO;

class ProductModel extends Model
{
    public function getAllProduct()
    {
        $listProduct = [];
        $sql = 'select * from product';
        $result = $this->db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch())
        {
            array_push($listProduct, new ProductEntity($row['id'], $row['product_name'], $row['price'], $row['url_img']));
        }

        return $listProduct;
    }

    public function getProductById(string $productId)
    {
        $sql = 'select * from product where id = :id';
        $statement = $this->db->prepare($sql);

        $statement->bindParam(':id', $productId, PDO::PARAM_STR);
        $statement->execute();

        $data = $statement->fetch();

        return new ProductEntity($data['id'], $data['product_name'], $data['price'], $data['url_img']);
    }

    public function insertProduct($product)
    {
        $sql = 'insert into product(product_name, price, url_img) values (:name, :price, :urlImg)';

        $statement = $this->db->prepare($sql);
        $statement->bindParam(':name', $product['name'], PDO::PARAM_STR);
        $statement->bindParam(':price', $product['price'], PDO::PARAM_INT);
        $statement->bindParam(':urlImg', $product['urlImg'], PDO::PARAM_STR);

        if ($statement->execute()) {
            return true;
        }

        return false;
    }

    public function updateProduct($product)
    {
        $sql = 'update product set product_name = :name, price = :price, url_img = :urlImg when id = :id';

        $statement = $this->db->prepare($sql);
        $statement->bindParam(':id', $product['id'], PDO::PARAM_STR);
        $statement->bindParam(':name', $product['name'], PDO::PARAM_STR);
        $statement->bindParam(':price', $product['price'], PDO::PARAM_INT);
        $statement->bindParam(':urlImg', $product['urlImg'], PDO::PARAM_STR);

        if ($statement->execute()) {
            return true;
        }

        return false;
    }
}