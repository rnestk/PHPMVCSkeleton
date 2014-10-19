<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\abstraction;

use app\lib\Configuration;

/**
 * @author Piotr Klimaszewski <rnestk@interia.pl>
 * @abstract
 */
abstract class ModelAbstract {

    /**
     *
     * @var resource - wynik połączenia z bazą danych. 
     */
    protected $link;
    
    protected $rowsNumber = null;

    /**
     * 
     * @throws \Exception
     */
    public function __construct() {

        $configs = Configuration::getConfig();
        $host = $configs['db.host'];
        $db = $configs['db.dbname'];
        $pass = $configs['db.password'];
        $user = $configs['db.username'];

        $this->link = mysqli_connect($host, $user, $pass, $db);

        if (!$this->link) {
            throw new \Exception("</br>Błąd połaczenia z bazą danych $db.</br>");
        }
    }

    /**
     * <b>Metoda pobiera cała zawartość tabeli $tableName.</b>
     * </br>
     * Zwraca $result = object, gdy zapytanie się powiedzie lub false w przeciwnym razie
     * @param string $tableName - nazwa tabeli w bazie danych.
     * @return object $result
     * @throws \Exception
     */
    public function fetchAll($tableName) {
        $query = "SELECT * FROM $tableName";
        $result = \mysqli_query($this->link, $query);
        if (!$result) {
            throw new \Exception("</br>Problem z zapytaniem w metodzie "
            . __METHOD__ . " klasy " . get_called_class() . ".</br>");
        }
        return $result;
    }

    public function selectColumns(array $columns, $tableName) {
        $list = '';

        for ($i = 0; $i < count($columns); $i++) {
            if ($i == (count($columns) - 1)) {
                $list .= $columns[$i];
            } else {
                $list .= $columns[$i] . ',';
            }
        }

        $query = "SELECT $list FROM $tableName";
        $result = mysqli_query($this->link, $query);

        if (!$result) {
            throw new \Exception("</br>Problem z zapytaniem w metodzie "
            . __METHOD__ . " klasy " . get_called_class() . ".</br>");
        }
        return $result;
    }

    /**
     * <b>Metoda wyszukuje w wyspecyfikowanych kolumnach w $columns wartości, które nie są powielone.</b>
     * @param array $columns
     * @param string $tableName
     * @return object
     * @throws \Exception
     */
    public function selectDistinctColumns(array $columns, $tableName) {
        $list = '';

        for ($i = 0; $i < count($columns); $i++) {
            if ($i == (count($columns) - 1)) {
                $list .= $columns[$i];
            } else {
                $list .= $columns[$i] . ',';
            }
        }

        $query = "SELECT DISTINCT $list FROM $tableName";
        $result = mysqli_query($this->link, $query);

        if (!$result) {
            throw new \Exception("</br>Problem z zapytaniem w metodzie "
            . __METHOD__ . " klasy " . get_called_class() . ".</br>");
        }
        return $result;
    }

    /**
     * <b>Metoda wykonuje zapytanie do db specyficzne dla listy kolumn $columns i określonego warunku $where</b>
     * @param string $tableName - nazwa tabeli bazy danych
     * @param string $where - specyficzny warunek zadany podczas zapytania
     * @param array $columns - lista kolumn bazy danych do przeszukania, jeśli tablica jest pusta $columns = "*"
     * @return object mysqli - wynik zapytania do bazy danych
     * @throws \Exception
     */
    public function selectWhere($tableName, $where, array $columns) {
        $list = "";
        if (count($columns) == 0 || $columns == null) {
            $list = "*";
        } else {
            for ($i = 0; $i < count($columns); $i++) {
                if ($i == (count($columns) - 1)) {
                    $list .= $columns[$i];
                } else {
                    $list .= $columns[$i] . ',';
                }
            }
        }

        $query = "SELECT {$list} FROM {$tableName} WHERE " . $where;
        $result = mysqli_query($this->link, $query);

        if (!$result) {
            throw new \Exception("</br>Problem z zapytaniem w metodzie "
            . __METHOD__ . " klasy " . get_called_class() . ".</br>");
        }
        return $result;
    }

}
