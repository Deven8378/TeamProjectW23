Feature: editrecipe
	In order to edit a recipe
	As an Admin
	I need to press edit recipe

Scenario: try editing a recipe as admin
	Given I am on the "/User/index" page
	And I fill field "Nicole" in "username"
	And I fill field "1234" in "password"
	And I click "Sign in"
	And I click "Recipes"
	And I click "Super Yummy Chocolate Ice Cream"
	And I click "Edit"
	And I fill field "Super Yummy Chocolate Ice Cream with extra cream" in "description"
	When I click "Edit Recipe"
	Then I see "Super Yummy Chocolate Ice Cream with extra cream"