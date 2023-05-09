Feature: editCategory
  In order to edit an Category
  As a Admin
  I need to press edit ingredient

Scenario: try editing category as admin
  Given I am on the "/User/index" page
  And I fill field "Nicole" in "username"
  And I fill field "1234" in "password"
  And I click "Sign in"
  And I click "Inventory"
  And I click "View categories"
  And I select "1" in "editCategory_id"
  And I fill field "Powder" in "editCategory_name" 
  When I click "edit"
  Then I see "Powder"