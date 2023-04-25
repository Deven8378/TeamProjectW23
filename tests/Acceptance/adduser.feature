Feature: adduser
	In order to add a user
	As an IT specialist
	I need to press add user

Scenario: try adding user as IT specialist
	Given I am on the "Welcome Sweemory Team!!" page
    And I fill field "itspecialist" in "username"
    And I fill field "1234" in "password"
    And I click "Sign in"
    And I see "List of Employee and Admin"
	And I click "Add User"
	And I fill field "employee" in "username"
	And I fill field "1234" in "password"
	And I select "Admin" in "user_type"
	When I click "Create User"
	Then I am on the "Create Profile" page