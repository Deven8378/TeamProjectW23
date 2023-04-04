Feature: viewproducts
	In order to view products on the webpage
	I have to signin as a employee or admin

Scenario: try view products as admin
   Given I am on the sign in page
    And I input "admin" in "username"
    And I input "1234" in "password" 
    And I click "Sign in"
    When I click "Products"
    Then I should be redirected to the products page
Scenario: try view products as employee
   Given I am on the sign in page
    And I input my "employee" in "username"
    And I input "1234" in "password" 
    And I click "Sign in"
    When I click "Products"
    Then I should be redirected to the products page