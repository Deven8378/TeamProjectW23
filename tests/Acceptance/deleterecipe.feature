Feature: deleterecipe
	In order to delete recipe,
	As an admin
	I need to click on delete recipe

	Scenario: try deleting recipe as admin
	Given I am logged in as admin
	And I am on the recipes page
	And I click on "Banana Ice Cream"
	And I see "Banana Ice Cream Recipe"
	When I click on "Delete Recipe"
	And I click on "Confirm"
	Then I see "Recipe is removed"