Feature: signout
  In order to sign out of the webpage
  As a user of the application
  I need to press sign out

  Scenario: try sign out of webpage
    Given I am on the "Welcome Sweemory Team!" page
    And I fill field "admin1" in "username"
    And I fill field "1234" in "password"
    And I click "Sign in"
    And I am on the "Home Page" page
    And I click "sideMenu"
    When I click "Log Out"
    Then I see "Please sign in"
