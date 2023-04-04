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
     * @Given I am on page :arg1
     */
     public function iAmOnPage($arg1)
     {
        $this->amOnPage($arg1);
     }

    /**
     * @Given I fill field :value :fieldName
     */
     public function iFillField($value, $fieldName)
     {
        $this->fillField($fieldName, $value);
     }

    /**
     * @When I click :text
     */
     public function iClick($text)
     {
        $this->click($text);
     }

    /**
     * @Then I see :text
     */
     public function iSee($text)
     {
        $this->see($text);
     }

}
