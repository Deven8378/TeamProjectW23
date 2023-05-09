Feature: viewproducts
	In order to view products on the webpage
	I have to signin as a employee or admin

Scenario: try view products as admin
   Given I am on the "/User/index" page
   And I fill field "Nicole" in "username"
   And I fill field "1234" in "password"
   And I click "Sign in"
   And I click "Inventory"
   When I click "Products"
   Then I am on the "/Product/index" page
Scenario: try view products as employee
   Given I am on the "/User/index" page
   And I fill field "Rachelle" in "username"
   And I fill field "1234" in "password"
   And I click "Sign in"
   And I click "Inventory"
   When I click "Products"
   Then I am on the "/Product/index" page