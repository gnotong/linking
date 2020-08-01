Feature: Match
  Scenario: As a recruiter I want to look for the job seeker that matches my job offer so that I can show my interest
    Given I want to look for job seekers that match my job offer
    When I select an offer
    Then I can see the list of job seekers with the best compatibilities with my job offer