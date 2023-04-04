Feature: searchItem
  In order to find stuff on the items page
  As a admin or employee
  I need to be able to input text and get results

  Scenario: try search as admin
    Given I am logged in as admin 
    And I am on the items page
    When I input "chocolate" in "searchBar"
    And I press "Search"
    Then I see "chocolate"

  Scenario: try search as employee
    Given I am logged in as employee
    And I am on the items page
    When I input "bananas" in "searchBar"
    And I press "Search"
    Then I see "bananas"