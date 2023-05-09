Feature: addUser
	In order to add a user
	As an IT specialist
	I need to press add user

Scenario: try adding a user admin as itspecialist
  Given I am on the "/User/index" page
  And I fill field "itspecialist" in "username"
  And I fill field "1234" in "password"
  And I click "Sign in"
  And I click "Add User"
  And I fill field "testUserAdmin5" in "username"
  And I fill field "1234" in "password"
  And I select "Admin" in "user_type"
  When I click "action"
  Then I see "Create a profile for testUserAdmin5"
Scenario: try adding a user employee as itspecialist
  Given I am on the "/User/index" page
  And I fill field "itspecialist" in "username"
  And I fill field "1234" in "password"
  And I click "Sign in"
  And I click "Add User"
  And I fill field "testUserEmployee1" in "username"
  And I fill field "1234" in "password"
  And I select "Employee" in "user_type"
  When I click "action"
  Then I see "Create a profile for testUserEmployee1"