Feature: addUser
  In order to add a user
  As an IT specialist
  I need to press add user

Scenario: try creating a profile for a user admin as itspecialist
  Given I am on the "/User/index" page
  And I fill field "itspecialist" in "username"
  And I fill field "1234" in "password"
  And I click "Sign in"
  And I click "Add User"
  And I fill field "testUserAdmin6" in "username"
  And I fill field "1234" in "password"
  And I select "Admin" in "user_type"
  And I click "action"
  And I am on the "/ITspecialist/createProfile" page
  And I fill field "First Name" in "first_name"
  And I fill field "Middle Name" in "middle_name"
  And I fill field "Last Name User" in "last_name"
  And I fill field "testingAdmin1@email.com" in "email"
  And I select "Active" in "status"
  When I click "action"
  Then I see "testUserAdmin6"