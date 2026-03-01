<?php 

namespace Config;
class Database{
    private $db;
    private $config;

    public function __construct(){
        require_once __DIR__.'/config.php';
        $this->config = getConfig();
    }

    public function connect(){
          $this->db = new \PDO("mysql:host={$this->config['host']};dbname={$this->config['dbname']}", $this->config['username'], $this->config['password']);
          return $this->db;
    }

}