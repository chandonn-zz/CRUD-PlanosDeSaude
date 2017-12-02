<?php

/**
 * Classe para abrigar as funçoes de pacientes
 */
class Pacientes {

	/**
	 * Conexão com o banco de dados
	 *
	 * @since    0.1.0
	 * @access   protected
	 * @var      Monk_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $database;

	function __construct( $connection ) {
		$this->database = $connection;
	}

	public function create( $id, $nome, $email, $data_nascimento, $status, $endereco ) {
		try {
			$sentence = $this->database->prepare( 'INSERT INTO pacientes( ID, nome, email, data_nascimento, status, endereco ) VALUES( :ID, :nome, :email, :data_nascimento, :status, :endereco )' );

			$sentence->bindParam( ':ID', $id, PDO::PARAM_INT );
			$sentence->bindParam( ':nome', $nome, PDO::PARAM_STR );
			$sentence->bindParam( ':email', $email, PDO::PARAM_STR );
			$sentence->bindParam( ':data_nascimento', $data_nascimento, PDO::PARAM_STR );
			$sentence->bindParam( ':status', $status, PDO::PARAM_STR );
			$sentence->bindParam( ':endereco', $endereco, PDO::PARAM_STR );

			$sentence->execute();

			if ( $sentence->rowCount() > 0 ) {
				$message = 'Novo paciente cadastrado';
			} else {
				$message = 'Erro, tente novamente';
			}
		} catch ( PDOException $e ) {
			echo $e->getMessage();
		}
	}

	public function read( $id ) {
		try {
			$sentence = $database->prepare( 'SELECT FROM pacientes WHERE ID=:ID' );

			$sentence->bindParam( ':ID', $id, PDO::PARAM_INT );

			$sentence->execute();

		} catch ( PDOException $e ) {
			echo $e->getMessage();
		}
	}

	public function update( $id, $nome, $email, $data_nascimento, $status, $endereco ) {
		try {
			$sentence = $database->prepare( 'UPDATE pacientes SET nome=:nome, email=:email, data_nascimento=:data_nascimento, status=:status, endereco=:endereco WHERE ID=:ID' );

			$sentence->bindParam( ':ID', $id, PDO::PARAM_INT );
			$sentence->bindParam( ':nome', $nome, PDO::PARAM_STR );
			$sentence->bindParam( ':email', $email, PDO::PARAM_STR );
			$sentence->bindParam( ':data_nascimento', $data_nascimento, PDO::PARAM_STR );
			$sentence->bindParam( ':status', $status, PDO::PARAM_STR );
			$sentence->bindParam( ':endereco', $endereco, PDO::PARAM_STR );

			$sentence->execute();

			if ( $sentence->rowCount() > 0 ) {
				$message = 'O paciente ' . $nome . ' foi alterado com sucesso';
				$_POST = array();
			} else {
				$message = 'Um erro ocorreu, tente novamente';
			}
		} catch ( PDOException $e ) {
			echo $e->getMessage();
		}
	}

	public function delete( $id ) {
		try {
			$sentence = $database->prepare( 'DELETE FROM pacientes WHERE ID=:ID' );

			$sentence->bindParam( ':ID', $id, PDO::PARAM_INT );

			$sentence->execute();

		} catch ( PDOException $e ) {
			echo $e->getMessage();
		}
	}
}
