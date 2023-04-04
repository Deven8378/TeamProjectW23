Feature: removeitem
	In order to remove item
	As a admin
	I have to click on remove item

Scenario: try remove item as admin
	Given I am logged in as admin
	And I am on the main page
    And I click "Items"
    And I click "banana"
    When I click "Remove Item"
    And I click "Confirm"
    Then I see "Item is removed"