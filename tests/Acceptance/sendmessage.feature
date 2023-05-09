Feature: sendMessage
	In order to send message
	As an Admin or Employee
	I need to press send message

Scenario: try sending a message as admin to employee
  Given I am on the "/User/index" page
  And I fill field "Nicole" in "username"
  And I fill field "1234" in "password"
  And I click "Sign in"
  And I click "Messages"
  And I click "New Message"
  And I fill field "rachelle@gmail.com" in "receiver"
  And I fill field "This is a test message." in "message"
  When I click "action"
  Then I see "This is a test message."
Scenario: try sending a message as employee to admin
  Given I am on the "/User/index" page
  And I fill field "Rachelle" in "username"
  And I fill field "1234" in "password"
  And I click "Sign in"
  And I click "Messages"
  And I click "New Message"
  And I fill field "nicole@gmail.com" in "receiver"
  And I fill field "Sending back a test message." in "message"
  When I click "action"
  Then I see "Sending back a test message."