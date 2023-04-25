Feature: sendMessage
	In order to delete message
	As an Admin or Employee
	I need to press delete message

Scenario: try deleting a message
    Given I am on the "Welcome Sweemory Team!" page
    And I fill field "admin1" in "username"
    And I fill field "1234" in "password"
    And I click "Sign in"
    And I click "Messages"
    When I click "Delete"
    Then I see "Message deleted"
Scenario: try sending a message as employee to admin
    Given I am on the "Welcome Sweemory Team!" page
    And I fill field "employee1" in "username"
    And I fill field "1234" in "password"
    And I click "Sign in"
    And I click "Messages"
    When I click "Delete"
    Then I see "Message deleted"