Feature: deleterecipe
	In order to delete recipe,
	As an admin
	I need to click on delete recipe

Scenario: try deleting recipe as admin
  Given I am on the "/User/index" page
  And I fill field "Nicole" in "username"
  And I fill field "1234" in "password"
  And I click "Sign in"
  And I click "Recipes"
  And I click "Add Recipe"
  And I fill field "Super Yummy Chocolate Ice Cream" in "title"
  And I fill field "Super Yummy Chocolate Ice Cream" in "description"
  And I attach file "chocoIceCream.jpg" in "recipePicture"
  And I click "action"
  And I click "Super Yummy Chocolate Ice Cream"
  And I click "#beforeDelete"
  When I click "#confirmDelete"
  Then I see "Recipe was deleted"

