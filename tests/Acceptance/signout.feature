Feature: signout
  In order to sign out of the webpage
  As a user of the application
  I need to press sign out

  Scenario: try sign out of webpage
    Given I am on page "/User/index"
    And I fill field "itspecialist" "username"
    And I fill field "1234" "password"
    And I click "Sign in"
    When I click "Log Out"
    Then I see "Welcome Sweemory"
