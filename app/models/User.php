<?php
    class User extends Model{
        protected $table = "users";
        public $name, $surname, $mail;
    }