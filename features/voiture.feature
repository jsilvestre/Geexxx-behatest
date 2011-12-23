# features/voiture.feature

Feature: voiture
  Pour faire fonctionner une voiture
  Jai besoin de pouvoir accélerer et avancer pendant un certain temps.
  
Scenario: Fait avancer une voiture pendant 1 heure
  Given I have a car with a default speed of "50" km/h 
  When I drive for "1" hour
  Then the counter should be at "50" km
  
Scenario: Faire accélerer une voiture
  Given I have a car with a default speed of "50" km/h 
  When I increase the speed of "100" km/h
  Then the speed should be at its maximum