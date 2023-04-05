Feature: removeUser
  In order to remove a user
  As an itspecialist
  I need to view user details and press remove user

  Scenario: try removing user as itspecialist
    Given I am logged in as itspecialist
    And I am on the users page
    And I click "employee1"
    And I see "employee1's information"
    When I click "Remove User"
    And I click "Confirm"
    Then I see "User has been removed"
