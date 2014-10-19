<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\lib;

use app\lib\Model;

class Paginator {

    protected static $instance = false;
    protected $link = false;
    protected $result = false;
    protected $count = false;
    protected $limit = false;

    private function __construct(Model $mysqli, $limit, $target) {
        
        $this->limit = $limit;
        $this->link = $mysqli;

        $this->count = $this->rowNumber($target);
        
        if ($this->link->connect_errno) {
            throw new \Exception($this->link->connect_error);
        }
    }

    public static function getInstance(Model $mysqli, $limit, $target) {
        if (!self::$instance) {
            self::$instance = new Paginator($mysqli, $limit, $target);
        }
        return self::$instance;
    }

    protected function rowNumber($target) {
        
        $query = "select count(*) as maxid from $target";
        
        $this->max = $this->link->query($query);
        $valMax = $this->max->fetch_assoc();
        
        return $valMax['maxid'];
    }
    
    public function queryGet(Array $a, $target) {
        
        $page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_SPECIAL_CHARS);
        if ($page > ceil($this->count / $this->limit) || $page <= 0) {
            $page = 1;
        }

        $start = ($page - 1) * $this->limit;
        $stop = $page * $this->limit;
        --$stop;
        
        $columns = '';
        for($i = 0; $i < count($a); $i++){
            
            if($i == (count($a) - 1)){
                $columns .= $a[$i];
            }else{
                $columns .= $a[$i] . ',';
            }
            
        }
        
        $query = "select $columns from $target limit $start, $this->limit";
        //echo $query;
        $this->result = $this->link->query($query);

        return $this->result;
    }

    public function createPagination(Array $css, $limitDisplayPages, $ctrl, $act) {
        
        list($classDiv, $class_normal, $class_active, $np) = $css;
        
        $counterRow = $this->count / $this->limit;
        //$script = filter_input(INPUT_SERVER, "SCRIPT_NAME");
        $script = "";

        $counterAll = ceil($counterRow);
        
        if(!isset($start)){
            $start = 1;
        }else{
            
        }
        
        if(!isset($stop)){
            $stop = $limitDisplayPages;
        }else{
            
        }
        
        $page = filter_input(INPUT_GET, "page");
        $next = $page + 1;
        $prev = $page - 1;
        
        while($page > $stop){
            if($page > $counterAll){
                $page = 1;
                break;
            }
            $start++;
            $stop++;
            
        }
        
        if($next > $counterAll){
            $next = 1;
        }
        
        if($prev < 1){
            $prev = $counterAll;
        }
        echo "<a name = 'paginator'></a>";
        echo '<div class = "' . $classDiv . '">';
        echo "<a class = '" . $np . "' href = '" . $script . "?controller=$ctrl&action=$act&page=" . $prev . "#paginator'><p>POPRZEDNIE</p></a>";
        
//        if($stop < $counterAll - 1){
//            $stop += 2;
//        }
        
        for ($i = $start; $i <= $stop; $i++) {
            $string = "$script?controller=$ctrl&action=$act&page=$i";

            if ($page == $i) {
                echo "<a class = '" . $class_active . "' href = '" . $string . "#paginator'><p>$i</p></a>";
            } else {
                echo "<a class = '" . $class_normal . "' href = '" . $string . "#paginator'><p>$i</p></a>";
            }
            
        }
        echo "<a class = '" . $np . "' href = '" . $script . "?controller=$ctrl&action=$act&page=" . $next . "#paginator'><p>NASTĘPNE</p></a>";
        
        echo '</div>';
    }

}
