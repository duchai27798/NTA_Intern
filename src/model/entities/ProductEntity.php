<?php

namespace app\model\entities;

class ProductEntity
{
    public string $id;
    public string $name;
    public int $price;
    public string $urlImg;

    /**
     * ProductEntity constructor.
     * @param string $id
     * @param string $name
     * @param int $price
     * @param string $urlImg
     */
    public function __construct(string $id, string $name, int $price, string $urlImg)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->urlImg = $urlImg;
    }
}