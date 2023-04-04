Feature: editrecipe
	In order to edit a recipe
	As an Admin
	I need to press edit recipe

Scenario: try editing a recipe as admin
	Given I am logged in as admin
	And I am on the recipes page
	And I click on "Banana Ice Cream"
	And I click "Edit Recipe"
	And I input "Peel 2 Banana, chop and seal in container. Freeze banana for 2 hours. Blend until ice cream consistency." in "recipeDescription"
	When I click "Save Changes"
	And I click "Confirm"
	Then I see "Recipe has been changed."