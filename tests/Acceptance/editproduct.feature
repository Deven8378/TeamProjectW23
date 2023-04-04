Feature: editproduct
	In order to edit a product
	As an Admin
	I need to press edit product

Scenario: try editing a product as admin
	Given I am logged in as admin
	And I am on the products page
	And I click on "Banana Ice Cream"
	And I click on "Edit Product"
	And I input "8.99" in "productPrice"
	When I click on "Save Changes"
	And I click on "Confirm"
	Then I see "Changes were saved."
