<?php
    //SE DEFINE UN MODELO BASE
    class Model{
        protected $table;
        protected $primaryKey="id";

        //METODO PARA BUSQUEDA POR ID
        public static function find($id){
            $model = new static();
            $sql = "SELECT * FROM ".$model->table." WHERE ".$model->primaryKey." = :id";
            $params = ["id"=>$id];
            $rs = new Database();
            $rs = $rs->query($sql, $params);

            if($rs){
                foreach($rs as $key => $value) {
                    $model->$key = $value;
                }
                return $model;
            }else{
                return false;
            }
        }
    }