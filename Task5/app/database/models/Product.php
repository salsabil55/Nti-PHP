<?php

// models
// echo  ;
require_once __DIR__ . "\..\config\connection.php";
require_once __DIR__ . "\..\config\crud.php";

class Product extends connection implements crud
{

    private $id;
    private $name_en;
    private $name_ar;
    private $price;
    private $quantity;
    private $desc_ar;
    private $desc_en;
    private $status;
    private $image;
    private $brand_id;
    private $subcategory_id;
    private $create_at;
    private $updated_at;
    private const available = '1';
    private const unavailable = '0';
    private const limit = '4';



    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }


    /**
     * Get the value of create_at
     */
    public function getCreate_at()
    {
        return $this->create_at;
    }

    /**
     * Set the value of create_at
     *
     * @return  self
     */
    public function setCreate_at($create_at)
    {
        $this->create_at = $create_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * Get the value of name_en
     */
    public function getName_en()
    {
        return $this->name_en;
    }

    /**
     * Set the value of name_en
     *
     * @return  self
     */
    public function setName_en($name_en)
    {
        $this->name_en = $name_en;

        return $this;
    }

    /**
     * Get the value of name_ar
     */
    public function getName_ar()
    {
        return $this->name_ar;
    }

    /**
     * Set the value of name_ar
     *
     * @return  self
     */
    public function setName_ar($name_ar)
    {
        $this->name_ar = $name_ar;

        return $this;
    }

    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of quantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get the value of desc_ar
     */
    public function getDesc_ar()
    {
        return $this->desc_ar;
    }

    /**
     * Set the value of desc_ar
     *
     * @return  self
     */
    public function setDesc_ar($desc_ar)
    {
        $this->desc_ar = $desc_ar;

        return $this;
    }

    /**
     * Get the value of desc_en
     */
    public function getDesc_en()
    {
        return $this->desc_en;
    }

    /**
     * Set the value of desc_en
     *
     * @return  self
     */
    public function setDesc_en($desc_en)
    {
        $this->desc_en = $desc_en;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of subcategory_id
     */
    public function getSubcategory_id()
    {
        return $this->subcategory_id;
    }

    /**
     * Set the value of subcategory_id
     *
     * @return  self
     */
    public function setSubcategory_id($subcategory_id)
    {
        $this->subcategory_id = $subcategory_id;

        return $this;
    }

    /**
     * Get the value of brand_id
     */
    public function getBrand_id()
    {
        return $this->brand_id;
    }

    /**
     * Set the value of brand_id
     *
     * @return  self
     */
    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;

        return $this;
    }


    public function create()
    {
        # code...
    }
    public function read()
    {
        $query = "SELECT id,name_en,price,image,description_en from products WHERE status = '" . SELF::available . "' ORDER BY name_en ASC";
        return $this->runDQL($query);
    }

    public function update()
    {
        # code...
    }
    public function delete()
    {
        # code...
    }
    public function getProductBySubcategory()
    {
        $query = "SELECT id,name_en,price,image,description_en from products WHERE status = '" . SELF::available . "' 
        AND subcategory_id = $this->subcategory_id ORDER BY name_en DESC";
        return $this->runDQL($query);
    }
    public function getProductByBrands()
    {
        $query = "SELECT id,name_en,price,image,description_en from products WHERE status = '" . SELF::available . "' 
        AND brand_id = $this->brand_id ORDER BY name_en DESC";
        return $this->runDQL($query);
    }


    public function getProductById()
    {
        $query =  "SELECT * FROM products WHERE status = '" . SELF::available . "' AND id=$this->id";
        return $this->runDQL($query);
    }


    public function getSpecsOfProduct()
    {
        $query = "SELECT  `products_specs`.`product_id`  ,`specs`.`name_en`, `products_specs`.`spec_value` 
        FROM `specs`
        JOIN `products_specs`
        ON `products_specs`.`spec_id` = `specs`.`id`
        WHERE `product_id` = $this->id";
        return $this->runDQL($query);
    }
    public function getReviewsOfProduct()
    {

        $query = "SELECT
        CONCAT(
            `users`.`first_name`,
            ' ',
            `users`.`last_name`
        ) AS `full_name`,
        `reviews`.`comments`,
        `reviews`.`value`,
        `reviews`.`created_at`
    FROM
        `reviews`
    JOIN `users` ON `reviews`.`user_id` = `users`.`id`
    WHERE
        `reviews`.`product_id` = $this->id";
        return $this->runDQL($query);

        // solve problem of duplicate user review for same product
        //     $query = "SELECT
        //     CONCAT(
        //         `users`.`first_name`,
        //         ' ',
        //         `users`.`last_name`
        //     ) AS `full_name`,
        //     `reviews`.`comments`,
        //     SUM(`reviews`.`value`) AS `user_reviews`,
        //     COUNT(DISTINCT `users`.`id`) AS `reviews_count`,
        //     `reviews`.`created_at`
        // FROM
        //     `reviews`
        // JOIN `users` ON `reviews`.`user_id` = `users`.`id`
        // WHERE
        //     `reviews`.`product_id` = 17
        // GROUP BY
        //     `users`.`first_name`,`users`.`last_name`";
        //         return $this->runDQL($query);

    }

    public function getLatestProduct()
    {
        $query =  "SELECT * FROM `products` WHERE status = '" . SELF::available . "' ORDER BY created_at Desc LIMIT " . SELF::limit . "";
        return $this->runDQL($query);
    }

    public function getMostOrderdProduct()
    {
        $query =  " SELECT
        `products`.`id`,
        `products`.`name_en`,
        `products`.`price`,
        `products`.`image`,
        `products`.`description_en`,
        `products_orders`.`product_id`,
        `products_orders`.`order_id`,
        `products_orders`.`quantity`,
        COUNT(`products_orders`.`order_id`) AS 'Total_order'
    FROM
        `products`
    LEFT JOIN `products_orders`
    ON `products_orders`.`product_id` = `products`.`id`
    GROUP BY `products_orders`.`product_id`
    ORDER BY
        COUNT(`products_orders`.`order_id`)
    DESC LIMIT " . SELF::limit . "
        ";
        return $this->runDQL($query);
    }
    public function getDetailsOfProduct()
    {

        $query = "SELECT * FROM `products_reviews` WHERE `products_reviews`.id = $this->id";
        return $this->runDQL($query);
    }

    public function getMostReviewdProduct()
    {
        $query = "SELECT id,name_en,reviews_count,reviews_avg ,price,image FROM `products_reviews` 
        WHERE reviews_count > 0 AND status = '" . SELF::available . "'
        ORDER BY reviews_count DESC LIMIT " . SELF::limit . "";
        return $this->runDQL($query);
    }
}
