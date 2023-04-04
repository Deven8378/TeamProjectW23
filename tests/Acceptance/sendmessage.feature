Feature: sendmessage
	In order to send message
	As an Admin or Employee
	I need to press send message

Scenario: try sending a message as admin to employee
	Given I am logged in as admin
	And I am on main page 
	And I click on "Send Message"
	And I input "employee1" in "receiver"
	And I input "Hello employee" in "message"
	When I click on "Send"
	Then I see "Message was sent."
Scenario: try sending a message as admin to admin
	Given I am logged in as admin
	And I am on main page 
	And I click on "Send Message"
	And I input "admin1" in "receiver"
	And I input "Hello admin2" in "message"
	When I click on "Send"
	Then I see "Message was sent."
Scenario: try sending a message as employee to admin
	Given I am logged in as employee
	And I am on main page 
	And I click on "Send Message"
	And I input "admin1" in "receiver"
	And I input "Hello admin" in "message"
	When I click on "Send"
	Then I see "Message was sent."
Scenario: try sending a message as employee to employee
	Given I am logged in as employee
	And I am on main page 
	And I click on "Send Message"
	And I input "employee2" in "receiver"
	And I input "Hello employee2" in "message"
	When I click on "Send"
	Then I see "Message was sent."	