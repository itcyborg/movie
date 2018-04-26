<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/25/2018
 * Time: 10:27 AM
 */

class DB
{
    public static $conn;
    public static function connect()
    {
        $conn=new self;
        self::$conn=new PDO('mysql:host=127.0.0.1;dbname=movies','root','',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        return $conn;
    }

    public static function All($table)
    {
        self::connect();
        $sql='SELECT * FROM '.$table;
        $sql=self::$conn->prepare($sql);
        $sql->execute();
        return $sql->fetchAll();
    }

    public static function search(array $data,$table)
    {
        self::connect();
        $sql='select * from %s where %s';
        $par=null;
        foreach ($data as $datum=>$item) {
            if($par==null){
                $par=$datum.' like "%'.$item.'%"';
            }else{
                $par=$par.' or '.$datum.' like "%'.$item.'%"';
            }
        }
        $statement=sprintf($sql,$table,$par);
        $statement=self::$conn->prepare($statement);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public static function put($table,$data)
    {
        self::connect();
        $param=null;
        $fields=null;
        foreach ($data as $datum=>$value) {
            if(is_null($fields)){
                $fields=$datum;
            }else{
                $fields.=",".$datum;
            }
            if(is_null($param)){
                $param="'$value'";
            }else{
                $param.=","."'$value'";
            }
        }
        $statement="INSERT INTO ".$table." ($fields) values ($param)";
        $statement=self::$conn->prepare($statement);
//        print_r($statement);
        try {
            return $statement->execute();
        }catch (PDOException $e){
            return $e->getMessage();
        }
    }
}