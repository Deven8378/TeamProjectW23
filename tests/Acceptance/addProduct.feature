Feature: addProduct
  In order to add a product
  As a Admin
  I need to press add product

Scenario: try adding product as admin
  Given I am on the "/User/index" page
  And I fill field "Nicole" in "username"
  And I fill field "1234" in "password"
  And I click "Sign in"
  And I click "Inventory"
  And I click "Products"
  And I click "Add Product"
  And I fill field "Super Yummy Chocolate Ice Cream" in "name"
  And I fill field "Super Yummy Chocolate Ice Cream" in "description"
  And I select "10" in "category"
  And I attach file "chocoIceCream.jpg" in "productPicture"
  When I click "action"
  Then I see "Super Yummy Chocolate Ice Cream"