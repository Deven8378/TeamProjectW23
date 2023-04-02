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
     * @Given I am on the sign in page
     */
     public function iAmOnTheSignInPage()
     {
         // throw new \PHPUnit\Framework\IncompleteTestError("Step `I am on the sign in page` is not defined");
        $this->wantTo('sign in');
     }

    /**
     * @When I input my :username
     */
     public function iInputMy($username)
     {
         // throw new \PHPUnit\Framework\IncompleteTestError("Step `I input my :arg1` is not defined");

     }

    /**
     * @When I input :arg1
     */
     public function iInput($arg1)
     {
         // throw new \PHPUnit\Framework\IncompleteTestError("Step `I input :arg1` is not defined");

     }

    /**
     * @When I click :arg1
     */
     public function iClick($arg1)
     {
         // throw new \PHPUnit\Framework\IncompleteTestError("Step `I click :arg1` is not defined");

     }

    /**
     * @Then I should be redirected to the product page
     */
     public function iShouldBeRedirectedToTheProductPage()
     {
         // throw new \PHPUnit\Framework\IncompleteTestError("Step `I should be redirected to the product page` is not defined");
        
     }
}
