Feature: Close application
  Scenario: As a recruiter I want to close application that was accepted so that I can stop the recruitment process
    Given I want to close an application
    When I close it
    Then The recruitment process is stopped
