<?php

use PHPUnit\Framework\TestCase;



class Test2 extends TestCase{
    public function testMonTest(){
        require_once 'includes/class.pdogsb.inc.php';
        $pdo_test = PdoGsb::getPdoGsb();


        $attendu= 
            ['id'=>'a131',
            'nom'=>'Villechalane',
            'prenom'=>'Louis',
            'login'=>'lvillachane',
            'mdp'=>'jux7g',
            'adresse'=>'8 rue des Charmes',
            'cp'=>'46000',
            'ville'=>'Cahors',
            'dateEmbauche'=>'2005-12-21',
            'role'=>0];
        
        $resultat= $pdo_test-> selectUser();
        var_dump($resultat[0]);

        foreach ($attendu as $key => $value) {   
            $this->assertSame($attendu,$resultat[0]);
            $this->assertIsArray($resultat[0]);
        }
    }

}
?>

