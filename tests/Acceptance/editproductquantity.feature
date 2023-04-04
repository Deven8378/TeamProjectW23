Feature: editproductquantity
	In order to edit a product
	As a admin or employee
	I have to click on edit quantity

Scenario: try editing a product as admin
	Given I am logged in as admin
	And I am on the "Products" page
	And I click on "chocolate ice cream"
	Then I click "up-arrow"
	And I click on "Save Changes"
	Then I see updated quantity
Scenario: try editing a product as employee
	Given I am logged in as admin
	And I am on the "Products" page
	And I click on "chocolate ice cream"
	When I click "up-arrow"
	And I click on "Save Changes"
	Then I see updated quantity

