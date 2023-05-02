Feature: edituser
	In order to edit a user
	As a Itspecialist
	I have to click on edit user 

Scenario: try editing employee
	Given I am on the "Welcome Sweemory Team!!" page
    And I fill field "itspecialist" in "username"
    And I fill field "1234" in "password"
    And I click "Sign in"
    And I see "List of Employee and Admin"
	And I click "EM20"
	And I see "Profile Page"
	And I click "Edit"
	And I fill field "Mubin" in "first_name"
	When I click "Upload Profile Change"
	Then I see "User Profile Was Updated"

Scenario: try editing employee
	Given I am on the "Welcome Sweemory Team!!" page
    And I fill field "itspecialist" in "username"
    And I fill field "1234" in "password"
    And I click "Sign in"
    And I see "List of Employee and Admin"
	And I click "EM20"
	And I see "Profile Page"
	And I click "Edit"
	And I fill field "Mubin" in "first_name"
	When I click "Upload Profile Change"
	Then I see "Error when modifying Profile"