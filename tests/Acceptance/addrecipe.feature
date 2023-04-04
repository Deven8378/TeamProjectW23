Feature: adduser
	In order to add a recipe
	As an Admin
	I need to press add recipe

Scenario: try adding a recipe as admin
	Given I am logged in as admin
	And I am on the recipes page
	And I click "Add Recipe"
	And I input "Banana Ice Cream" in "recipeName"
	And I input "Peel 1 Banana, chop and seal in container. Freeze banana for 2 hours. Blend until ice cream consistency." in "recipeDescription"
	When I click "Add Recipe"
	And I click "Confirm"
	Then I see "Recipe has been added."
