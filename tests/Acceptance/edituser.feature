Feature: edituser
	In order to edit a user
	As a Itspecialist
	I have to click on edit user 

Scenario: try editing employee
	Given I am logged in as Itspecialist
	And I am on the main page
	And I see "Employees" heading
	When I click on "Edit User"
	And I input "employee2" in "username"
	And I click on "Save Changes"
	Then I see "User Updated"
Scenario: try editing admin
	Given I am logged in as Itspecialist
	And I am on the main page
	And I see "Admin" heading
	When I click on "Edit User"
	And I input "admin2" in "username"
	And I click on "Save Changes"
	Then I see "User Updated"