Feature: searchIngredient
  In order to find stuff on the items page
  As a admin or employee
  I need to be able to input text and get results

Scenario: try search as admin
  Given I am on the "/User/index" page
  And I fill field "Nicole" in "username"
  And I fill field "1234" in "password"
  And I click "Sign in"
  And I click "Inventory"
  And I click "Ingredients"
  And I click "Add Ingredient"
  And I fill field "Super Yummy Banana" in "name"
  And I fill field "This is a fruit." in "description"
  And I select "1" in "category"
  And I attach file "banana.jpg" in "ingredientPicture"
  And I click "action"
  And I fill field "Supper Yummy Banana" in "search"
  When I click ".search-btn"
  Then I see "Super Yummy Banana"
Scenario: try search as employee
  Given I am on the "/User/index" page
  And I fill field "Rachelle" in "username"
  And I fill field "1234" in "password"
  And I click "Sign in"
  And I click "Inventory"
  And I click "Ingredients"
  And I fill field "Supper Yummy Banana" in "search"
  When I click ".search-btn"
  Then I see "Super Yummy Banana"