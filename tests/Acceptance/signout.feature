Feature: signout
  In order to sign out of the webpage
  As a user of the application
  I need to press sign out

  Scenario: try sign out of webpage
    Given I am signed in
    And I am on the main page
    When I click "Log Out"
    Then I see "Please sign in"
