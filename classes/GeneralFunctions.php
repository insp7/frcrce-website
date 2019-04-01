<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 2/25/2019
 * Time: 8:55 PM
 */

    require_once('Database.php');

    /**
     * 'GeneralFunctions' class to perform various common operations on database relations;
     *
     * @package frcrce
     * @subpackage classes
     * @author Aniket
     * @access public
     */
    class GeneralFunctions {

        public static function generalInsert($relation_name, $attributes) {

            global $database;

            $conn = $database->getConnection();

            $columnString = implode(", ", array_keys($attributes));
            $valueString = ":".implode(", :", array_keys($attributes));

            $sql = "INSERT INTO {$relation_name} ({$columnString}) VALUES ({$valueString})";

            $ps = $conn->prepare($sql);

            $result = $ps->execute($attributes);
            if($result) {
                return $conn->lastInsertId();
            } else {
                return false;
            }

        }

        function generalUpdate($table, $data, $condition) {
            global $database;

            $conn = $database->getConnection();

            $i = 0;
            $columnValueSet = "";
            foreach ($data as $key=>$value) {
                $comma = ($i<count($data)-1?", ":"");
                $columnValueSet .= $key. "='".$value."'".$comma;
                $i++;
            }
            $sql = "UPDATE $table SET $columnValueSet WHERE $condition";
            $ps = $conn->prepare($sql);

            $result = $ps->execute();
            if($result) {
                return $ps->rowCount();
            } else {
                return false;
            }
        }

    }
?>