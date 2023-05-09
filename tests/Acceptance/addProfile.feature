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
  And I fill field "testingUserAdmin" in "username"
  And I fill field "1234" in "password"
  And I select "Admin" in "user_type"
  And I click "action"
  And I see "Create a profile for testingUserAdmin"
  And I fill field "testingUserAdmin" in "first_name"
  And I fill field "middlename" in "middle_name"
  And I fill field "lastname" in "last_name"
  And I fill field "email@email.com" in "email"
  And I fill field "1234567890" in "phone_number"
  And I select "Active" in "status"
  When I click "action"
  Then I see "testingUserAdmin"
Scenario: try creating a profile for a user employee as itspecialist
  Given I am on the "/User/index" page
  And I fill field "itspecialist" in "username"
  And I fill field "1234" in "password"
  And I click "Sign in"
  And I click "Add User"
  And I fill field "testingUserEmployee" in "username"
  And I fill field "1234" in "password"
  And I select "Employee" in "user_type"
  And I click "action"
  And I see "Create a profile for testingUserEmployee"
  And I fill field "firstname" in "first_name"
  And I fill field "middlename" in "middle_name"
  And I fill field "lastname" in "last_name"
  And I fill field "email@email.com" in "email"
  And I fill field "1234567890" in "phone_number"
  And I select "Active" in "status"
  When I click "action"
  Then I see "testingUserEmployee"