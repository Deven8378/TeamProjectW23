Feature: signin
  In order to sign into the webpage as admin
  As a user of the application
  I need to enter criteria

  Scenario: try sign in as admin
    Given I am on the sign in page
    And I fill field "admin" in "username"
    And I fill field "1234" in "password"
    And I click "Sign in"
    When I click on "Products" 
    Then I see "Welcome Admin"
  Scenario: try sign in as employee
    Given I am on the sign in page
    And I fill field "employee" in "username"
    And I fill field "1234" in "password"
    When I click "Sign in"
    Then I see "Welcome Employee"
  Scenario: try sign in as IT specialist
    Given I am on the sign in page
    And I fill field "itspecialist" in "username"
    And I fill field "1234" in "password"
    When I click "Sign in"
    Then I see "Welcome IT specialisr"
