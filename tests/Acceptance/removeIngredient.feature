Feature: editingredient
	In order to delete a ingredient
	As an Admin
	I need to press delete ingredient

Scenario: try editing an ingredient as admin
	Given I am on the "/User/index" page
	And I fill field "Nicole" in "username"
	And I fill field "1234" in "password"
	And I click "Sign in"
	And I click "Inventory"
	And I click "Add Ingredient"
	And I fill field "Green Banana" in "name"
	And I select "3" in "category"
	And I click "Add Ingredient"
	And I click "Green Banana"
	And I click "#deleteIngredient" 
	When I click "Delete"
	Then I see "Ingredient deleted."
