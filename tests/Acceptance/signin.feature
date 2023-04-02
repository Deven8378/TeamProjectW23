Feature: signin
  In order to sign into the webpage 
  As a user of the application
  I need to enter criteria

  Scenario: try signin as admin
    Given I am on the sign in page
    When I input my "username"
    And I input "password" 
    And I click "Sign in"
    Then I should be redirected to the product page
