Feature: removeProduct
	In order to delete a product
	As an Admin
	I need to press delete product

Scenario: try editing a product as admin
	Given I am on the "/User/index" page
	And I fill field "Nicole" in "username"
	And I fill field "1234" in "password"
	And I click "Sign in"
	And I click "Inventory"
	And I click "Products"
	And I click "Add Product"
	And I fill field "Red Banana" in "name"
	And I select "3" in "category"
	And I click "Add Product"
	And I click "Red Banana"
	And I click "#deleteProduct" 
	When I click "Delete"
	Then I see "Product deleted."
