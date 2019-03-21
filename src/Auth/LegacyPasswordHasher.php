<?php

namespace App\Auth;
use Cake\Auth\AbstractPasswordHasher;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LegacyPassworhHasher
 *
 * @author Epic
 */
class LegacyPasswordHasher extends AbstractPasswordHasher{
    public function check($password, $hashedPassword) {
        return md5($password) === $hashedPassword;
    }

    public function hash($password) {
        return md5($password);
    }

//put your code here
}
