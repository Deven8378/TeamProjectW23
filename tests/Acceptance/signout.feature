Feature: signout
  In order to sign out of the webpage
  As a user of the application
  I need to press sign out

  Scenario: try sign out of webpage
    Given I am on the "Welcome Sweemory Team!!" page
    And I fill field "Nicole" in "username"
    And I fill field "1234" in "password"
    And I click "Sign in"
    And I see "Welcome Sweemory Team!"
    When I click "Log Out"
    Then I see "Welcome Sweemory Team!"