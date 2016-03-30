<?php

/**
 * Created by Serge Tallerr on 26-Mar-16.
 * mail-to: malashta@gmail.com
 * Russia, Novosibirsk
 * https://vk.com/serge.tallerr
 * https://ru.linkedin.com/in/tallerr
 * https://facebook.com/serge.tallerr
 * twitter @SergeTallerr
 * skype: Serge.tallerr
 */

class App
{


    public function __construct()
    {
    }

    public function gen_name(){
        return $this->__gen(10);
    }

    public function get_link_from_base($url){

    }

    public function set_name_to_base($url){

    }

    private function __gen($cnt){
        $result = '';
        $symbol_arr = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','r','s','t','u','v','x','y','z',
                            'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','R','S','T','U','V','X','Y','Z',
                            '1','2','3','4','5','6','7','8','9','0');
        for($c = 0; $c < $cnt; $c++) {
            $index = rand(0, count($symbol_arr) - 1);
            $result .= $symbol_arr[$index];
        }
        return $result;
    }
}