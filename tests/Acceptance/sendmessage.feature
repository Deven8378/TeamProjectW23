Feature: sendMessage
	In order to send message
	As an Admin or Employee
	I need to press send message

Scenario: try sending a message as admin to employee
    Given I am on the "Welcome Sweemory Team!" page
    And I fill field "admin1" in "username"
    And I fill field "1234" in "password"
    And I click "Sign in"
    And I click "Messages"
    And I click "New Message"
    And I fill field "nicole@email.com" in "receiver"
    And I fill field "Hello, this is from emlpoyee to admin" in "message"
    When I click "action"
    Then I see "Message Sent"
Scenario: try sending a message as employee to admin
    Given I am on the "Welcome Sweemory Team!" page
    And I fill field "employee1" in "username"
    And I fill field "1234" in "password"
    And I click "Sign in"
    And I click "Messages"
    And I click "New Message"
    And I fill field "something@gmail.com" in "receiver"
    And I fill field "Hello, this is from employee to admin" in "message"
    When I click "action"
    Then I see "Message Sent"