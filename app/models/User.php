<?php
    namespace app\models;
    use \Model;

    class User extends Model{
        protected $table = "users";
        public $name, $surname, $mail;
    }