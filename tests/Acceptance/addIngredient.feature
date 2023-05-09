Feature: addIngredient
  In order to add an ingredient
  As a Admin
  I need to press add ingredient

  Scenario: try adding ingredient as admin
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
    When I click "action"
    Then I see "Super Yummy Banana"