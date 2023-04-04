Feature: removeproduct
	In order to remove a product
	As a admin
	I have to click on remove product

Scenario: try remove product as admin
	Given I am logged in as admin
	And I am on the main page
    And I click "Products"
    And I click "chocolate ice cream"
    When I click "Remove Product"
    And I click "Confirm"
    Then I see "Product is removed"