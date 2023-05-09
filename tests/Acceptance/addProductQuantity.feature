Feature: addProductQuantity
  In order to add an product quantity
  As a Admin
  I need to press add ingredient quantity

Scenario: try adding ingredient quantity as admin
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
  And I click "action"
  And I click "Super Yummy Chocolate Ice Cream"
  And I click "Add Quantity"
  And I fill field "2023-05-09" in "produced_date"
  And I fill field "2023-05-13" in "expired_date"
  And I fill field "5" in "quantity"
  And I fill field "5.99" in "price"
  When I click "action"
  Then I see "2023-05-13"