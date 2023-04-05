Feature: editUserStatus
  In order to change a users status
  As a itspecialist
  I need to view the users information and change the status

  Scenario: try editUserStatus
    Given I am logged in as itspecialist
    And I am on the users page
    And I see "employee1" status is "Active"
    When I click "Active" button
    Then I see user status "Inactive"

  Scenario: try editUserStatus
    Given I am logged in as itspecialist
    And I am on the users page
    And I see "employee1" status is "Inactive"
    When I click "Inactive" button
    Then I see user status "Active"