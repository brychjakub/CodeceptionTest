<?php

namespace Tests\AcceptanceTraining;

use Tests\Support\AcceptanceProxyTester;


class JakubFirstCest
{

    public function _failed(AcceptanceProxyTester $I){
        echo "failed";
        $I->pause();
    }
 public function test(AcceptanceProxyTester $I){

     $I->amOnUrl("https://brych.pythonanywhere.com/neops.html");
     $I->see("dotazník");

     $x= 0;
     while ($x < 240){
     $I->click(["id"=>"option-".$x."-".rand(0,4)]);
     $x++;

     }
     $y=1;
     while ($y < 5){
     $I->fillField(["id" => "q".$y], $I->randomText(1, 5));
     $y++;
 }
     $I->selectOption(["id"=>"q5"],array_rand(array_flip(array("Sebeposuzování", "Posouzení jiného")),1)); //"1" means it only picks 1 option
     $I->selectOption(["id"=>"q6"],array_rand(array_flip(array("Velmi nesouhlasím", "Spíše nesouhlasím", "Nesouhlasím", "Spíše souhlasím", "Souhlasím")),1));
     $I->selectOption(["id"=>"q7"],array_rand(array_flip(array("Ano", "Ne")),1));
     $I->selectOption(["id"=>"q8"],array_rand(array_flip(array("Ano", "Ne")),1));

     $I->click(["css"=>"body > div:nth-child(4) > button:nth-child(1)"]);

     codecept_pause();

 }

}
