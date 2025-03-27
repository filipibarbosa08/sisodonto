<?php

require_once '../back-end/banco.php';
session_start();


$pdo = Banco::conectar();
$senha = password_hash("admin",PASSWORD_DEFAULT);
$cmd = $pdo->query("insert into usuarios (id,nome,login,senha,consultorio_id) values (1,'admin','admin',$senha,1)");
