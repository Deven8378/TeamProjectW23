Feature: signin
  In order to sign into the webpage as admin
  As a user of the application
  I need to enter criteria

Scenario: try sign in as admin
    Given I am on the "/User/index" page
    And I fill field "Nicole" in "username"
    And I fill field "1234" in "password"
    When I click "Sign in"
    Then I see "Welcome Sweemory Team!"
  Scenario: try sign in as employee
    Given I am on the "/User/index" page
    And I fill field "Rachelle" in "username"
    And I fill field "1234" in "password"
    When I click "Sign in"
    Then I see "Welcome Sweemory Team!"
  Scenario: try sign in as IT specialist
    Given I am on the "/User/index" page
    And I fill field "itspecialist" in "username"
    And I fill field "1234" in "password"
    When I click "Sign in"
    Then I see "List of Employee and Admin"
