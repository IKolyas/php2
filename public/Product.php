<?php


class Product
{
    protected int $id;
    protected string $title;
    protected string $description;
    protected int $price;

    function __construct(int $id, string $title, string $description, int $price)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
    }

    public function renderProduct()
    {
        echo "<h2>Product name: $this->title</h2> 
              <p>Product description: $this->description</p>
              <p>Product price: $this->price</p>
              ";
    }

}
