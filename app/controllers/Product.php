<?php
namespace app\controllers;

use \app\models\User;
use \app\models\Category;
use \app\models\ProductQuantity;

#[\app\filters\ProfileCreated]
#[\app\filters\Status]
#[\app\filters\Login]
class Product extends \app\core\Controller
{

    //Viewing

    #[\app\filters\EmployeeAndAdmin]
    public function index() 
    {
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
    
    #[\app\filters\EmployeeAndAdmin]
     public function productDetails($product_id){
        $product = new \app\models\Product();
        $success = $product->getProductDetails($product_id);
        $totalQuantity = new ProductQuantity;
        $totalQuantity = $totalQuantity->getTotalQuantity($product_id);
        $allQuantity = new ProductQuantity;
        $allQuantity = $allQuantity->getAll($product_id);
        $user = new User();
        $user = $user->getByUserId($_SESSION['user_id']);
        $type = $user->user_type;
        $isAdmin = false;
        if ($type == "admin")
            $isAdmin = true;

        if($success){
            $this->view('Product/productDetails', [$success, $totalQuantity, $allQuantity, $isAdmin]);
        } else {
            header('location:/Product/index?error=Product does not exists.');
        }
    }

    // Creating, Editing, Deleting

    #[\app\filters\Admin]
    public function createProduct() {
        if (isset($_POST['action'])) 
        {
            if($_POST['name']!='' && $_POST['name']!=null && $_POST['category']!='' && $_POST['category']!=null)
            {
                $product = new \app\models\Product();
                $product->name = htmlentities($_POST['name']);
                $product->category = htmlentities($_POST['category']);
                $product->description = htmlentities($_POST['description']);

                $picture = $this->saveProduct($_FILES['productPicture']);

                if($picture) {
                    $product->picture = $picture;
                }else{
                    $product->picture = 'default.jpg';
                }

                $success = $product->addProduct();
                if($success){
                    header('location:/Product/index?success='. $product->name .' has been added');
                }else{
                     header('location:/Product/index?error=Something went wrong when creating a new Product. Please Try again.');
                }

            }else{
                header('location:/Product/createProduct?error=Please enter a Name and select a Category.');
            }

        } else {
            $categories = new Category();
            $categories = $categories->getCategories();
            $this->view('Product/createProduct', $categories);
        }
    }

    #[\app\filters\Admin]
    public function edit($product_id) {
        $categories = new Category();
        $categories = $categories->getCategories();
        $product = new \app\models\Product();
        $product = $product->getProductDetails($product_id);

        if(isset($_POST['action']))
        {
            if($_POST['name']!='' && $_POST['name']!=null && $_POST['category']!='' && $_POST['category']!=null){
                $product->name = htmlentities($_POST['name']);
                $product->category = htmlentities($_POST['category']);
                $product->description = htmlentities($_POST['description']);
                $picture = $this->saveProduct($_FILES['productPicture']);

                if($picture){ 
                    $product->picture = $picture;
                }
                $success = $product->editProduct($product_id);

                if($success){
                    header('location:/Product/productDetails/' . $product_id. '?success=Product Updated.');
                } else {
                    header('location:/Product/edit/' . $product_id. '?error=Please modify in order to edit.');
                }
            } else {
                header('location:/Product/edit/' . $product_id. '?error=Please fill the required fields.');
            }
        } else {
            $this->view('Product/editProduct', [$product,$categories]);
        }
    }

    #[\app\filters\Admin]
    public function delete($product_id) {
        $product = new \app\models\Product();
        $success = $product->deleteProduct($product_id);
        if($success){
            unlink("productImages/$success->picture");
            header('location:/Product/index?success=Product deleted.');
        } else {
            header('location:/Product/index?error=Error occured.');
        }
    }


     #[\app\filters\Admin]
    public function addQuantity($product_id) 
    {
        if (isset($_POST['action'])) {
            if(!empty($_POST['arrival_date']) && !empty($_POST['expired_date']) &&
                !empty($_POST['quantity']) && !empty($_POST['price']))
            {
                if(strtotime($_POST['expired_date']) > strtotime($_POST['arrival_date']))
                {
                    $product_quantity = new ProductQuantity();
                    $product_quantity->arrival_date = $_POST['arrival_date'];
                    $product_quantity->expired_date = $_POST['expired_date'];
                    $product_quantity->quantity = $_POST['quantity'];
                    $product_quantity->price = $_POST['price'];
                    $success = $product_quantity->addProductQuantity($product_id);

                    if($success){
                        header('location:/Product/productDetails/' . $product_id. '?success=Product added quantity.');
                    } else {
                        header('location:/Product/productDetails/' . $product_id. '?error=Something went wrong when adding quantity. Please Try again.');
                    } 
                } else {
                    header('location:/Product/addQuantity/' . $product_id. '?error=Please recheck dates.');
                }
            } else {
                header('location:/Product/addQuantity/' . $product_id. '?error=Please fill the required fields.');
            }
        } else {
            $product = new \app\models\Product();
            $product = $product->getProductDetails($product_id);
            $this->view('Product/addQuantity', $product);
        }
    }

    #[\app\filters\Admin]
    public function editQuantity($pq_id)
    {  
        $productQuantity = new ProductQuantity();
        $productQuantity = $productQuantity->getOneQuantity($iq_id);

        if (isset($_POST['action'])) {
            if(!empty($_POST['arrival_date']) && !empty($_POST['expired_date']) &&
                !empty($_POST['quantity']) && !empty($_POST['price']))
            {
                if(strtotime($_POST['expired_date']) > strtotime($_POST['arrival_date']))
                {
                    $productQuantity->quantity = $_POST['quantity'];
                    $productQuantity->arrival_date = $_POST['arrival_date'];
                    $productQuantity->expired_date = $_POST['expired_date'];
                    $productQuantity->price = $_POST['price'];
                    $success = $productQuantity->editQuantity($iq_id);

                    if($success){
                        header('location:/Product/productDetails/' . $productQuantity->product_id . '?success=Product Quantity Updated.');
                    } else {
                        header('location:/Product/editQuantity/' . $iq_id . '?error=Please modify in order to edit.');
                    }
                } else {
                    header('location:/Product/editQuantity/' . $iq_id. '?error=Please recheck dates.');
                }
            } else {
                header('location:/Product/editQuantity/' . $iq_id. '?error=Please fill the required fields.');
            }
        } else {
            $productQuantity = new ProductQuantity();
            $productQuantity = $productQuantity->getOneQuantity($iq_id);
            $this->view('Product/editQuantity', $productQuantity);
        }
    }

    #[\app\filters\EmployeeAndAdmin]
    public function quantityUpdate($product_id) { //form action method
        $productQuantity = new ProductQuantity();
        $productQuantity = $productQuantity->getOneQuantity($iq_id);

        if(isset($_POST['action']))
        {
            $productQuantity->quantity = $_POST['quantity'];
            $success = $productQuantity->quantityUpdate($iq_id);

            if($success){
                header('location:/Product/productDetails/' . $productQuantity->product_id . '?success=Product Quantity Updated.');
            } else {
                header('location:/Product/editQuantity/' . $iq_id . '?error=Please modify in order to edit.');
            }
        } else {
            $productQuantity = new ProductQuantity();
            $productQuantity = $productQuantity->getOneQuantity($iq_id);
            $this->view('Product/editQuantity', $productQuantity);
        }
    }

    #[\app\filters\Admin]
    public function deleteQuantity($pq_id)
    {
        $productQuantity = new ProductQuantity();
        $product = $productQuantity->getOneQuantity($iq_id);
        $productNumber = $product->product_id;
        $success = $productQuantity->deleteQuantity($iq_id);
        if($success){
            header('location:/Product/productDetails/'. $productNumber .'?success=Product Quantity deleted.');
        } else {
            header('location:/Product/productDetails'. $productNumber .'?error=Error occured.');
        }
    }


    // Filters

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

        if($numResults->num_results != 0){
            $this->view('Product/index', [$searched, $categories, $numResults, $isAdmin]);
        } else {
            header('location:/Product/index?error=No matches found.');
        }
    }

    public function filterByCategory($category_id) {
        $products = new \app\models\Product();
        $searched = $products->getProductByCategory($category_id);

        $categories = new \app\models\Category();
        $categories = $categories->getCategories();

        $numResults = $products->getFilteredSum($category_id);

        $user = new \app\models\User();
        $user = $user->getByUserType($_SESSION['user_id']);
        $isAdmin = false;
        if ($user->user_type == "admin")
            $isAdmin = true;

        if($numResults->num_results != 0){
            $this->view('Product/index', [$searched, $categories, $numResults, $isAdmin]);
        } else {
            header('location:/Product/index?error=No matches found.');
        }
    }
        
}
