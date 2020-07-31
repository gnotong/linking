Feature: Publish offer
  Scenario: As a recruiter I want to publish a new job offer so that I can look for my future employee
    Given I want to publish an offer
    When I write the offer
    Then The offer is published and job seeker can send their application for new job