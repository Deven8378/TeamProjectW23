Feature: viewUsers
  In order to view users
  As an itspecialist
  I want to login as an itspecialist

  Scenario: try viewing user
    Given I am on the sign in page
    And I input "itspecialist" in "username"
    And I input "1234" in "password"
    When I click "Sign in"
    Then I see "Users Page"