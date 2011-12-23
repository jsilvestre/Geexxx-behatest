<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

require_once 'Voiture.php';

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{
    protected $fixture;
    
    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param   array   $parameters     context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        // Initialize your context here
    }

    /**
     * @Given /^I have a car with a default speed of "([^"]*)" km\/h$/
     */
    public function iHaveACarWithADefaultSpeedOfKmH($defaultSpeed)
    {
        $this->fixtures = new Voiture($defaultSpeed);
    }

    /**
     * @When /^I drive for "([^"]*)" hour$/
     */
    public function iDriveForHour($hour)
    {
        $this->fixtures->avancePendant($hour);
    }

    /**
     * @Then /^the counter should be at "([^"]*)" km$/
     */
    public function theCounterShouldBeAtKm($km)
    {
        if($this->fixtures->getCompteur() != $km)
        {
            throw new Exception("Le compteur est à ".$this->fixtures->getCompteur());
        }
    }
    
    /**
     * @When /^I increase the speed of "([^"]*)" km\/h$/
     */
    public function iIncreaseTheSpeedOfKmH($speed)
    {
        $this->fixtures->accelere($speed);
    }

    /**
     * @Then /^the speed should be at its maximum$/
     */
    public function theSpeedShouldBeAtItsMaximum()
    {
        $this->fixtures->getVitesse() == Voiture::VITESSE_MAXIMUM;
    }    
}
