<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Doctor
 *
 * @author Usuario
 */
class persona {
    var $nombre ;
    var $documento ;
    
    function __construct($nombre, $documento) {
        $this->nombre = $nombre;
        $this->documento = $documento;
    }

}
