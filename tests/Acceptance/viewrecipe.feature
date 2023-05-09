Feature: viewrecipe
	In order to view recipe
	As an Admin or Employee
	I need to press view recipe

Scenario: try viewing recipe as admin
   Given I am on the "/User/index" page
   And I fill field "Nicole" in "username"
   And I fill field "1234" in "password"
   And I click "Sign in"
   When I click "Recipes"
   Then I see "Recipes Page"
Scenario: try viewing recipe as employee
   Given I am on the "/User/index" page
   And I fill field "Rachelle" in "username"
   And I fill field "1234" in "password"
   And I click "Sign in"
   When I click "Recipes"
   Then I see "Recipes Page"