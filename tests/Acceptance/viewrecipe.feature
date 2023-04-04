Feature: viewrecipe
	In order to view recipe
	As an Admin or Employee
	I need to press view recipe

Scenario: try viewing recipe as admin
	Given I am logged in as admin
	And I am on the recipes page
	When I click on "Banana Ice Cream"
	Then I see "Banana Ice Cream Recipe"
Scenario: try viewing recipe as employee
	Given I am logged in as employee
	And I am on the recipes page
	When I click on "Banana Ice Cream"
	Then I see "Banana Ice Cream Recipe"