<?php
namespace app\controllers;

class Product extends \app\core\Controller
{
    #[\app\filters\EmployeeAndAdmin]
    public function index() {
        $product = new \app\models\Product();
        $products = $product->getAll();
        $this->view('Product/index', $products);
    }
    

    #[\app\filters\Admin]
    public function createProduct() {
        if (isset($_POST['action'])) {
            $product = new \app\models\Product();
            $product->name = htmlentities($_POST['name']);
            $product->description = htmlentities($_POST['description']);
            $picture = $this->saveProduct($_FILES['productPicture']);

            if ($picture) {
                $product->picture = $picture;
                $product->addProduct();
                header('location:/Product/index?success=Product Added');

            }
        }
       
            $this->view('Product/createProduct');
    }

    #[\app\filters\EmployeeAndAdmin]
    public function productDetails($product_id) {
        $product = new \app\models\Product();
        $product = $product->getProductDetails($product_id);
        $this->view('Product/productDetails',$product);
    }

    #[\app\filters\Admin]
    public function delete($product_id) {
        $product = new \app\models\Product();
        $product = $product->getProductDetails($product_id);
        $product->delete();
        unlink("productImages/$product->picture");
        header('location:/Product/index');
    }

    public function edit($product_id) {
        $product = new \app\models\Product();
        $product = $product->getProductDetails($product_id);

        if(isset($_POST['action'])) {
        
            $product->name = $_POST['name'];
            $product->description = $_POST['description'];
            $product->price = $_POST['price'];
            $picture = $this->saveProduct($_FILES['productPicture']);

        if($picture){
                $product->picture = $picture;
            }

        $picture = $product->edit($product_id);
        header('location:/Product/productDetails/' .$product_id.'?success=Product Updated.');
                    
        }
        else
        $this->view('Product/edit', $product);
    }
}
