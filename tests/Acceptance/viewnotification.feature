Feature: viewnotification
	In order to view notification
	As an Admin or Employee
	I need to press view notifications

Scenario: try viewing notifications as admin
	Given I am logged in as admin
	And I am on the main page
	When I click on "View Notifications"
	Then I see "Notifications"
Scenario: try viewing notifications as employee
	Given I am logged in as employee
	And I am on the main page
	When I click on "View Notifications"
	Then I see "Notifications"