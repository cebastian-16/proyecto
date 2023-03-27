<<<<<<< HEAD
<?php 
	class login{
		public $conn;

		public function __construct(){
			require_once 'conexionLogin.php';
			$conectar=new conectar();
			$this->conn=$conectar->conexion();
		}

		public function consultarLogin($username, $password){
			

			/*$consultaLogin = "SELECT * FROM usuarios where username='".$username."' and password='".$password."'";
            $resultadoLogin = mysqli_query( $this->conn, $consultaLogin );
			return $resultadoLogin;*/
			include('config.php');
			$query = $connection->prepare("SELECT * FROM usuarios WHERE username=:username");
		    $query->bindParam("username", $username, PDO::PARAM_STR);
		    $query->execute();
		 
		    $result = $query->fetch(PDO::FETCH_ASSOC);
		    return $result;
		}
		
	}
=======
<?php 
	class login{
		public $conn;

		public function __construct(){
			require_once 'conexionLogin.php';
			$conectar=new conectar();
			$this->conn=$conectar->conexion();
		}

		public function consultarLogin($username, $password){
			

			/*$consultaLogin = "SELECT * FROM usuarios where username='".$username."' and password='".$password."'";
            $resultadoLogin = mysqli_query( $this->conn, $consultaLogin );
			return $resultadoLogin;*/
			include('config.php');
			$query = $connection->prepare("SELECT * FROM usuarios WHERE username=:username");
		    $query->bindParam("username", $username, PDO::PARAM_STR);
		    $query->execute();
		 
		    $result = $query->fetch(PDO::FETCH_ASSOC);
		    return $result;
		}
		
	}
>>>>>>> 2b5e34744706c9ae3f225e2e7b80605a5efeeb5f
 ?>