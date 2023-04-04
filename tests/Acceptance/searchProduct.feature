Feature: searchProduct
  In order to find stuff on the products page
  As a admin or employee
  I need to be able to input text and get results

  Scenario: try search as admin
    Given I am logged in as admin 
    And I am on the products page
    When I input "chocolate ice cream" in "searchBar"
    And I press "Search"
    Then I see "chocolate ice cream"

  Scenario: try search as employee
    Given I am logged in as employee 
    And I am on the products page
    When I input "banana ice cream" in "searchBar"
    And I press "Search"
    Then I see "banana ice cream"