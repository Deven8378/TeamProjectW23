Feature: editproduct
	In order to edit a item
	As an Admin
	I need to press edit item

Scenario: try editing an item as admin
	Given I am logged in as admin
	And I am on the items page
	And I click on "Bananas"
	And I click on "Edit Item"
	And I input "5.99" in "itemPrice"
	When I click on "Save Changes"
	And I click on "Confirm"
	Then I see "Changes were saved."
