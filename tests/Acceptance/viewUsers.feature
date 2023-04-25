Feature: viewUsers
  In order to view users
  As an itspecialist
  I want to login as an itspecialist

  Scenario: try viewing user
    Given I am on the "Welcome Sweemory Team!!" page
    And I fill field "itspecialist" in "username"
    And I fill field "1234" in "password"
    When I click "Sign in"
    Then I see "List of Employee and Admin"