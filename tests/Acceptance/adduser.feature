Feature: adduser
	In order to add a user
	As an IT specialist
	I need to press add user

Scenario: try adding user as IT specialist
	Given I am logged in as IT specialist
	And I am on the users page
	And I click "Add User"
	And I input "employee" in "username"
	And I input "1234" in "password"
	When I click "Add User"
	And I click "Confirm"
	Then I see "User has been added."
