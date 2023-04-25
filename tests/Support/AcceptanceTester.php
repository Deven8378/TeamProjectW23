<?php

declare(strict_types=1);

namespace Tests\Support;

/**
 * Inherited Methods
 * @method void wantTo($text)
 * @method void wantToTest($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause($vars = [])
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    /**
     * Define custom actions here
     */

    /**
     * @Given I am on the :arg1 page
     */
     public function iAmOnThePage($arg1)
     {
         $this->amOnPage($arg1);
     }

    /**
     * @Given I fill field :value in :fieldName
     */
     public function iFillFieldIn($value, $fieldName)
     {
         // throw new \PHPUnit\Framework\IncompleteTestError("Step `I fill field :arg1 in :arg2` is not defined");
         $this->fillField($fieldName, $value);
     }

    /**
     * @When I click :text
     */
     public function iClick($text)
     {
         // throw new \PHPUnit\Framework\IncompleteTestError("Step `I click :arg1` is not defined");
         $this->click($text);
     }

    /**
     * @Then I see :text
     */
     public function iSee($text)
     {
         // throw new \PHPUnit\Framework\IncompleteTestError("Step `I see :arg1` is not defined");
         $this->see($text);
     }

     /**
     * @Given I select :arg1 in :arg2
     */
     public function iSelectIn($arg1, $arg2)
     {
         $this->selectOption($arg2,$arg1);
     }

     /**
     * @Given I attach file :arg1 in :arg2
     */
     public function iAttachFileIn($arg1, $arg2)
     {
         $this->attachFile($arg2, $arg1); 
     }


}
