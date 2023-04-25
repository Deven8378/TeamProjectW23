Feature: addIngredient
  In order to add an ingredient
  As a Admin
  I need to press add ingredient

  Scenario: try adding ingredient as admin
    Given I am on the "Add Ingredient" page
    And I fill field "Mango" in "name"
    And I fill field "This is a fruit." in "description"
    And I fill field "0.37" in "price"
    And I fill field "banana.png" in "image"
    When I click "Add Ingredient"
    Then I see "Ingredient Added"