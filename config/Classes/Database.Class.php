<?php 
	/**
	* 
	*/
	class Database 
	{
		public static $server = "localhost";
		public static $dbName = "";
		public static $username = "faridibin";
		public static $password = "hamzazara";
		

        public static function connect() {
            $pdo = new PDO('mysql:host='.self::$server.';dbname='.self::$dbName.';charset=utf8', self::$username, self::$password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }

        public static function query($query, $params = array()) {
            $statement = self::connect()->prepare($query);
            $statement->execute($params);

            if (explode(' ', $query)[0] == 'SELECT') {
                $data = $statement->fetchAll();
                return $data;
            }
        }
	}
?>