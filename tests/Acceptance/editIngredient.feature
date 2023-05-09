Feature: editingredient
	In order to edit a ingredient
	As an Admin
	I need to press edit ingredient

Scenario: try editing an ingredient as admin
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
	And I click "Edit"
	And I fill field "Yummy Super Milk" in "name"
	And I fill field "Yummy Super Milk" in "description"
	And I select "4" in "category"
	And I attach file "milk.jpg" in "ingredientPicture"
	When I click "action"
	Then I see "Yummy Super Milk"