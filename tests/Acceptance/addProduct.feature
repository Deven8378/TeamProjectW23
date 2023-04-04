Feature: addProduct
  In order to add a product
  As a Admin
  I need to press add product

  Scenario: try adding product as admin
    Given I am logged in as Admin 
    And I am on the products page
    And I click "Add Product"
    And I input "product1" in "name"
    And I input "this is a description" in "description"
    And I input "8" in "price"
    And I input "image.png" in "image"
    And I input "2023-01-04" in "producedDate"
    And I input "2" in "quantity"
    And I input "2023-03-02" in "expiredDate"
    When I click on "Add"
    Then I see "Product has been added"