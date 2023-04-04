Feature: viewmessage
	In order to view message
	As a admin or employee
	I need to click on view messages

Scenario: try viewing message as admin
	Given I am logged in as admin
	And I am on the main page
	When I click on "View Messages"
	Then I see "Messages"
Scenario: try viewing message as employee
	Given I am logged in as employee
	And I am on the main page
	When I click on "View Messages"
	Then I see "Messages"
