<?php
namespace app\controllers;

class Inventory extends \app\core\Controller
{

    #[\app\filters\EmployeeAndAdmin]
    public function index()
    {
        $ingredient = new \app\models\Ingredient();
        $ingredients = $ingredient->getAll();
        $this->view('Inventory/index', $ingredients);
    }

    #[\app\filters\Admin]
    public function createIngredient() 
    {
        if (isset($_POST['action'])) {
            $ingredient = new \app\models\Ingredient();
            $ingredient->name = $_POST['name'];
            $ingredient->description = $_POST['description'];
            $ingredient->price = $_POST['price'];
            $picture = $this->saveIngredient($_FILES['ingredientPicture']);

            if ($picture) {
                $ingredient->picture = $picture;
                $ingredient->addIngredient();
                header('location:/Inventory/index?success=Ingredient Added');
            }
        } else {
            $ingredient = new \app\models\Ingredient();
            $ingredients = $ingredient->getAll();
            $this->view('Inventory/createIngredient', $ingredients);
        }
    }

    #[\app\filters\EmployeeAndAdmin]
    public function ingredientDetails($ingredient_id){
        $ingredient = new \app\models\Ingredient();
        $success = $ingredient->getIngredientDetails($ingredient_id);

        if($success){
            $this->view('Inventory/ingredientDetails', $success);
        } else {
            header('location:/Inventory/index?error=Ingredient does not exists.');
        }
    }

    #[\app\filters\Admin]
    public function createProduct() {
        if (isset($_POST['action'])) {
            $product = new \app\models\Product();
            $product->name = htmlentities($_POST['name']);
            $product->description = htmlentities($_POST['description']);
            $product->price = htmlentities($_POST['price']);
            $picture = $this->saveProduct($_FILES['productPicture']);

            if ($picture) {
                $product->picture = $picture;
                $product->addProduct();
                header('location:/Inventory/products?success=Product Added');
            }
        }
       
            $this->view('Inventory/createProduct');
    }

    #[\app\filters\EmployeeAndAdmin]
    public function products() {
        $product = new \app\models\Product();
        $products = $product->getAll();
        $this->view('Inventory/products',$products);
    }

    #[\app\filters\EmployeeAndAdmin]
    public function productDetails($product_id) {
        $product = new \app\models\Product();
        $product = $product->getProductDetails($product_id);
        $this->view('Inventory/productDetails',$product);
    }
}
