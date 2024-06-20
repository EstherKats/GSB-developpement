<?php

use PHPUnit\Framework\TestCase;

class Test2 extends TestCase{
    public function testMonTest(){
        require_once 'includes/class.pdogsb.inc.php';
        $pdo_test = PdoGsb::getPdoGsb();

$a=strlen("aa");
        $attendu= 
            ['role'=> 0,
            'id'=>'a131',
            'nom'=>'Villechalane',
            'prenom'=>'Louis',
            ];
        
        $resultat= $pdo_test-> getInfosVisiteur('lvillachane', 'jux7g');
        

        $this->assertSame($attendu,$resultat);
    }
}
?>