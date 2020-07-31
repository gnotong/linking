Feature: Accept application
  Scenario: As a recruiter I want to accept application i received so that I can explain to the job seeker that we want to look further in the recruitment process
    Given I want to accept an application
    When I send a new message to explain the next step
    Then The job seeker is aware of our decision and we can meet the job seeker