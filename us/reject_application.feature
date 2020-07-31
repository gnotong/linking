Feature: Reject application
  Scenario: As a recruiter I want to reject application i received so that I can explain to the job seeker that we wont look further in the recruitment process
    Given I want to reject an application
    When I send a new message to explain the rejection
    Then The job seeker is aware of our decision and we cannot meet the job seeker