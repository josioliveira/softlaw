<?php

namespace App\entity;

use App\db\Database;

class courtHearing {

    public $num;
    public $date;
    public $time;
    public $lawyer;
    public $forum;
    public $endress;

    public function register(){
       
       $obDatabase = new Database('court_hearing');
       $this->id = $obDatabase->insert([
           'num' => $this->num,
           'date' => $this->date,
           'time' => $this->time,
           'lawyer' => $this->lawyer,
           'forum' => $this->forum,
           'endress' => $this->endress
       ]);

       return true;
    }


}

