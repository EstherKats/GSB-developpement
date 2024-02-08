<?php

use PHPUnit\Framework\TestCase;



class Test extends TestCase{
    public function testMonTest(){
        require_once 'includes/class.pdogsb.inc.php';
        $pdo_test = PdoGsb::getPdoGsb();

        $pdo = new PDO('mysql:host=127.0.0.1;port=3307;dbname=gsb2','root',''); 
        $requetePrepare = $pdo->prepare(
            'SELECT * 
             FROM visiteur
             WHERE visiteur.role = 0 '
        );
        $requetePrepare->execute();
        $attendu= $requetePrepare->fetchAll();
        
        $resultat= $pdo_test-> selectUser();

        $this->assertSame($attendu,$resultat);
    }
}
?>