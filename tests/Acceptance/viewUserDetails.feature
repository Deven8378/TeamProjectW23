Feature: viewUserDetails
  In order to view user detail 
  As an itspecialist
  I need to click a users username

  Scenario: try viewing admin information
    Given I am on the "/User/index" page
    And I fill field "itspecialist" in "username"
    And I fill field "1234" in "password"
    And I click "Sign in"
    And I see "List of Employee and Admin"
    When I click "testingUserAdmin"
    Then I see "testingUserAdmin"

  Scenario: try viewing employee information
    Given I am on the "Welcome Sweemory Team!!" page
    And I fill field "itspecialist" in "username"
    And I fill field "1234" in "password"
    And I click "Sign in"
    And I see "List of Employee and Admin"
    When I click "testingUserEmployee"
    Then I see "testingUserEmployee"
