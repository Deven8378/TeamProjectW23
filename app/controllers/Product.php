<?php
namespace app\controllers;

use \app\models\Category;
use \app\models\ProductQuantity;


class Product extends \app\core\Controller
{
    #[\app\filters\EmployeeAndAdmin]
    public function index() {
        $product = new \app\models\Product();
        $products = $product->getAll();
        $categories = new \app\models\Category();
        $categories = $categories->getCategories();
        $numResults = $product->getSum();

        $user = new \app\models\User();
        $user = $user->getByUserType($_SESSION['user_id']);
        $isAdmin = false;
        if ($user->user_type == "admin")
            $isAdmin = true;

        $this->view('Product/index', [$products, $categories, $numResults, $isAdmin]);
    }
    

    #[\app\filters\Admin]
    public function createProduct() {
        $categories = new Category();
        $categories = $categories->getCategories();
        if (isset($_POST['action'])) {
            $product = new \app\models\Product();
            $product->name = htmlentities($_POST['name']);
            $product->description = htmlentities($_POST['description']);
            $product->category = $_POST['category'];
            $picture = $this->saveProduct($_FILES['productPicture']);

            if ($picture) {
                $product->picture = $picture;
            }
            $product->addProduct();
            header('location:/Product/index?success=Product Added');
        }
       
        $this->view('Product/createProduct', $categories);
    }

    #[\app\filters\EmployeeAndAdmin]
     public function productDetails($product_id){
        $product = new \app\models\Product();
        $success = $product->getProductDetails($product_id);
        $totalQuantity = new ProductQuantity;
        $totalQuantity = $totalQuantity->getTotalQuantity($product_id);
        $allQuantity = new ProductQuantity;
        $allQuantity = $allQuantity->getAll($product_id);


        if($success){
            $this->view('Product/productDetails', [$success, $totalQuantity, $allQuantity]);
        } else {
            header('location:/Product/index?error=Product does not exists.');
        }
    }


    #[\app\filters\Admin]
    public function delete($product_id) {
        $product = new \app\models\Product();
        $product = $product->getProductDetails($product_id);
        $product->delete();
        unlink("productImages/$product->picture");
        header('location:/Product/index');
    }

    #[\app\filters\Admin]
    public function edit($product_id) {
        $categories = new Category();
        $categories = $categories->getCategories();
        $product = new \app\models\Product();
        $product = $product->getProductDetails($product_id);

        if(isset($_POST['action'])) {
        
            $product->name = $_POST['name'];
            $product->description = $_POST['description'];
            $product->category = $_POST['category'];
            $picture = $this->saveProduct($_FILES['productPicture']);

        if($picture){
                $product->picture = $picture;
            }

        $success = $product->edit($product_id);
        if ($success) {
        header('location:/Product/productDetails/' .$product_id.'?success=Product Updated.');
        } else {
            header('location:/Product/productDetails/' .$product_id. '?error=Error');
        }
           
        }
        else
        $this->view('Product/edit', [$product,$categories]);
    }

     #[\app\filters\Admin]
    public function addQuantity($product_id) 
    {
        if (isset($_POST['action'])) {
            $product_quantity = new ProductQuantity();
            $product_quantity->produced_date = $_POST['produced_date'];
            $product_quantity->expired_date = $_POST['expired_date'];
            $product_quantity->quantity = $_POST['quantity'];
            $product_quantity->price = $_POST['price'];
            $success = $product_quantity->addProductQuantity($product_id);

            if($success){
                header('location:/Product/productDetails/' . $product_id. '?success=Product added quantity.');
            } else {
                header('location:/Product/edit/' . $product_id. '?error=Error.');
            }
        } else {
            $this->view('Product/addQuantity');
        }
    }

    #[\app\filters\Admin]
    public function editQuantity($pq_id)
    {  
        $productQuantity = new ProductQuantity();
        $productQuantity = $productQuantity->getOneQuantity($pq_id);

        if(isset($_POST['action']))
        {
            $productQuantity->quantity = $_POST['quantity'];
            $productQuantity->produced_date = $_POST['produced_date'];
            $productQuantity->expired_date = $_POST['expired_date'];
            $productQuantity->price = $_POST['price'];
            $success = $productQuantity->editQuantity($pq_id);

            if($success){
                header('location:/product/productDetails/' . $productQuantity->product_id . '?success=Product Quantity Updated.');
            } else {
                header('location:/product/productDetails/' . $productQuantity->product_id . '?error=Error.');
            }
        } else {
            echo $productQuantity->pq_id;
            $this->view('product/editQuantity', $productQuantity);
        }
    }

    #[\app\filters\Admin]
    public function deleteQuantity($pq_id)
    {
        $productQuantity = new ProductQuantity();
        $product = $productQuantity->getOneQuantity($pq_id);
        $productNumber = $product->product_id;
        $success = $productQuantity->deleteQuantity($pq_id);
        if($success){
            header('location:/product/productDetails/'. $productNumber .'?success=Product Quantity deleted.');
        } else {
            header('location:/productDetails'. $productNumber .'?error=Error occured.');
        }
    }

    public function editQuantityOnly($product_id) //view that shows form when clicking Edit Quantity
    {
        $product = new \app\models\Product();
        $success = $product->getProductDetails($product_id);
        $totalQuantity = new ProductQuantity;
        $totalQuantity = $totalQuantity->getTotalQuantity($product_id);
        $allQuantity = new ProductQuantity;
        $allQuantity = $allQuantity->getAll($product_id);

        if($success){
            $this->view('Product/editQuantityOnly', [$success, $totalQuantity, $allQuantity]);
        }

     }

    public function quantityUpdate($product_id) { //form action method
        $allQuantity = new ProductQuantity;
        $allQuantity = $allQuantity->getAll($product_id);
        $counter = 1; //each product quantity row's input name is quantity$counter

        if (isset($_POST['action'])) {
                foreach ($allQuantity as $oneQuantity) {
                $oneQuantity = $oneQuantity->getOneQuantity($oneQuantity->pq_id);
                $oneQuantity->quantity = $_POST['quantity' . $counter];
                ++$counter;
                $success = $oneQuantity->editQuantity($oneQuantity->pq_id);
            }
           
            if ($success) {
        
                 header('location:/product/productDetails/'. $product_id .'?success=Quantities Saved.');
             } else {
            
            header('location:/product/productDetails/'. $product_id .'?error=Error occured.');
            }

        }

    }

    public function search() 
    {
        $products = new \app\models\Product();
        $searched = $products->search($_GET['search']);

        $categories = new \app\models\Category();
        $categories = $categories->getCategories();

        $numResults = new \app\models\Product();
        $numResults = $numResults->getSearchedSum($_GET['search']);

        $user = new \app\models\User();
        $user = $user->getByUserType($_SESSION['user_id']);
        $isAdmin = false;
        if ($user->user_type == "admin")
            $isAdmin = true;

        $this->view('Product/index', [$searched, $categories, $numResults, $isAdmin]);
    }

    public function filterByCategory($category_id) {
        $products = new \app\models\Product();
        $searched = $products->getProductByCategory($category_id);

        $categories = new \app\models\Category();
        $categories = $categories->getCategories();

        $numResults = $products->getSum();

        $user = new \app\models\User();
        $user = $user->getByUserType($_SESSION['user_id']);
        $isAdmin = false;
        if ($user->user_type == "admin")
            $isAdmin = true;

        $this->view('Product/index', [$searched, $categories, $numResults, $isAdmin]);
    }
        
}
