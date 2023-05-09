Feature: addIngredientQuantity
  In order to add an ingredient quantity
  As a Admin
  I need to press add ingredient quantity

Scenario: try adding ingredient quantity as admin
  Given I am on the "/User/index" page
  And I fill field "Nicole" in "username"
  And I fill field "1234" in "password"
  And I click "Sign in"
  And I click "Inventory"
  And I click "Add Ingredient"
  And I fill field "Super Yummy Banana" in "name"
  And I fill field "This is a fruit." in "description"
  And I select "1" in "category"
  And I attach file "banana.jpg" in "ingredientPicture"
  And I click "action"
  And I click "Super Yummy Banana"
  And I click "Add Quantity"
  And I fill field "2023-05-09" in "arrival_date"
  And I fill field "2023-05-13" in "expired_date"
  And I fill field "5" in "quantity"
  And I fill field "5.99" in "price"
  When I click "action"
  Then I see "2023-05-13"