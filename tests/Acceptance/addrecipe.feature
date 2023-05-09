Feature: addRecipe
	In order to add a recipe
	As an Admin
	I need to press add recipe

Scenario: try adding Recipe as admin
  Given I am on the "/User/index" page
  And I fill field "Nicole" in "username"
  And I fill field "1234" in "password"
  And I click "Sign in"
  And I click "Recipes"
  And I click "Add Recipe"
  And I fill field "Super Yummy Chocolate Ice Cream" in "title"
  And I fill field "Super Yummy Chocolate Ice Cream" in "description"
  And I attach file "chocoIceCream.jpg" in "recipePicture"
  When I click "action"
  Then I see "Super Yummy Chocolate Ice Cream"