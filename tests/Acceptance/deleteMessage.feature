Feature: deleteMessage
	In order to delete message
	As an Admin or Employee
	I need to press delete message

Scenario: try to delete a message a message as admin
  Given I am on the "/User/index" page
  And I fill field "Rachelle" in "username"
  And I fill field "1234" in "password"
  And I click "Sign in"
  And I click "Messages"
  And I click "New Message"
  And I fill field "nicole@gmail.com" in "receiver"
  And I fill field "Trying to delete a message as admin" in "message"
  And I click "action"
  And I click "Log Out"
  And I am on the "/User/index" page
  And I fill field "Nicole" in "username"
  And I fill field "1234" in "password"
  And I click "Sign in"
  And I click "Messages"
  And I click "Trying to delete a message as admin"
  And I click "delete"
  When I click "Delete"
  Then I see "Message deleted."
Scenario: try to delete a message a message as employee
  Given I am on the "/User/index" page
  And I fill field "Nicole" in "username"
  And I fill field "1234" in "password"
  And I click "Sign in"
  And I click "Messages"
  And I click "New Message"
  And I fill field "rachelle@gmail.com" in "receiver"
  And I fill field "Trying to delete a message as employee" in "message"
  And I click "action"
  And I click "Log Out"
  And I am on the "/User/index" page
  And I fill field "Rachelle" in "username"
  And I fill field "1234" in "password"
  And I click "Sign in"
  And I click "Messages"
  And I click "Trying to delete a message as employee"
  And I click "delete"
  When I click "Delete"
  Then I see "Message deleted."