Feature: Send application
  Scenario: As job seeker I want to send my application to a job offer so that I could be recruited
    Given I want to send an application to a job
    When I write and send my application
    Then My application is on pending and recruiter can process it