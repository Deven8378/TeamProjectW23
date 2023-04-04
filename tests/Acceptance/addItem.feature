Feature: addItem
  In order to add an item
  As a Admin
  I need to press add item

  Scenario: try adding item as admin
    Given I am logged in as Admin 
    And I am on the items page
    And I click "Add Item"
    And I input "item1" in "name"
    And I input "this is a description" in "description"
    And I input "20" in "price"
    And I input "image.png" in "image"
    And I input "2023-01-04" in "arrivalDate"
    And I input "10" in "quantity"
    And I input "2023-03-02" in "expiredDate"
    When I click on "Add"
    Then I see "Item has been added"