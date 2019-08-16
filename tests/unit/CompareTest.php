<?php 
class CompareTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $chips = array('551199449944' , '551199449942' ,'551199449945'  );
        $numeros = array('55119944994' , '551199449922' ,'551199449955' );
        foreach ($chips as $chip) {
            foreach ($numeros as $numero) {
                if ($chip == $numero) {
                    print_r($chip);
                }
            }
        }

    }
}