<<<<<<< HEAD
<?php


	class conectar{
		public $servername = 'localhost';
		public $database = "bodega";
		public $username = "root";
		public $password = "";


		function conexion(){
            $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
	        return $conn;
	    }
     
	}
=======
<?php


	class conectar{
		public $servername = 'localhost';
		public $database = "bodega";
		public $username = "root";
		public $password = "";


		function conexion(){
            $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
	        return $conn;
	    }
     
	}
>>>>>>> 2b5e34744706c9ae3f225e2e7b80605a5efeeb5f
?>