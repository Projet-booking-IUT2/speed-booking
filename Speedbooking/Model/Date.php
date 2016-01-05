<?php

/**
 * Classe modélisant la date, comprenant diverses méthodes de manipulation
 * et de formatage de dates. Utilisé notamment dans le calendrier.
 *
 * @author claudeld
 */
class Date {
    
    var $days= array('Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche');
    var $months = array('Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre');
   
    /**
     * ???
     */
    public function getAll($year){
        $r=array();
        $date = new DateTime($year.'-01-01');
        while ($date->format('Y')<=$year){
            $y=$date->format('Y');
            $m=$date->format('n');
            $d=$date->format('j');
            $w=  str_replace('0','7', $date->format('w'));
            $r[$y][$m][$d]=$w;
            $date->add(new DateInterval('P1D'));        
        }
        return $r;
    }
        
     public function getDays(){
         return $this->days;
     }
     
     public function getMonths(){
         return $this->months;
    }
}

?>
