Feature: removeUser
  In order to remove a user
  As an itspecialist
  I need to view user details and press remove user

  Scenario: try removing user as itspecialist
    Given I am on the "/User/index" page
    And I fill field "itspecialist" in "username"
    And I fill field "1234" in "password"
    And I click "Sign in"
    And I click "Add User"
    And I fill field "delUserAdmin" in "username"
    And I fill field "1234" in "password"
    And I select "Admin" in "user_type"
    And I click "action"
    And I see "Create a profile for delUserAdmin"
    And I fill field "firstName" in "first_name"
    And I fill field "middlename" in "middle_name"
    And I fill field "lastname" in "last_name"
    And I fill field "email@email.com" in "email"
    And I fill field "1234567890" in "phone_number"
    And I select "Active" in "status"
    And I click "action"
    And I click "delUserAdmin"
    And I click "Delete"
    When I click "#itdelete"
    Then I see "Profile for user has been deleted"
