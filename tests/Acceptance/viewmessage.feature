Feature: viewmessage
	In order to view message
	As a admin or employee
	I need to click on view messages

Scenario: try viewing message as admin
	Given I am on the "/User/index" page
	And I fill field "Nicole" in "username"
	And I fill field "1234" in "password"
	And I click "Sign in"
	When I click "Messages"
	Then I see "Inbox"
Scenario: try viewing message as employee
	Given I am on the "/User/index" page
	And I fill field "Rachelle" in "username"
	And I fill field "1234" in "password"
	And I click "Sign in"
	When I click "Messages"
	Then I see "Inbox"
