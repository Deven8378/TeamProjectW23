Feature: editproduct
	In order to edit a product
	As an Admin
	I need to press edit product

Scenario: try editing a product as admin
	Given I am on the "/User/index" page
	And I fill field "Nicole" in "username"
	And I fill field "1234" in "password"
	And I click "Sign in"
	And I click "Inventory"
	And I click "Products"
	And I click "Add Product"
	And I fill field "Super Yummy Chocolate Ice Cream" in "name"
	And I fill field "This is ice cream made with chocolate." in "description"
	And I select "10" in "category"
	And I attach file "chocoIceCream.jpg" in "productPicture"
	And I click "action"
	And I click "Super Yummy Chocolate Ice Cream"
	And I click "Edit"
	And I fill field "Yummy Super Strawberry Ice Cream" in "name"
	And I fill field "Yummy Super Strawberry Ice Cream" in "description"
	And I select "10" in "category"
	And I attach file "strawberryIC.jpg" in "productPicture"
	When I click "action"
	Then I see "Yummy Super Strawberry Ice Cream"