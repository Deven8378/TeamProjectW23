Feature: viewUserDetails
  In order to view user detail 
  As an itspecialist
  I need to click a users username

  Scenario: try viewing admin information
    Given I logged in as itspecialist
    And I am on the users page
    When I click on "admin1"
    Then I see "admin1's Information"

  Scenario: try viewing employee information
    Given I logged in as itspecialist
    And I am on the users page
    When I click on "employee1"
    Then I see "employee1's Information"
