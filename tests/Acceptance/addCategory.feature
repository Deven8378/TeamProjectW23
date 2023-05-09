Feature: addCategory
  In order to add an Category
  As a Admin
  I need to press add ingredient

Scenario: try adding ingredient as admin
  Given I am on the "/User/index" page
  And I fill field "Nicole" in "username"
  And I fill field "1234" in "password"
  And I click "Sign in"
  And I click "Inventory"
  And I click "View categories"
  And I fill field "NewCategory" in "category_name"
  When I click "create"
  Then I see "NewCategory"