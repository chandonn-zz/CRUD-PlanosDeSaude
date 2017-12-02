<?php

/**
 * Classe para abrigar as funçoes dos planos de saúde
 */
class Planos_De_Saude {

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

	public function create( $registro_ans, $nome, $cnpj, $status ) {
		try {
			$sentence = $this->database->prepare( 'INSERT INTO planos_de_saude( registro_ans, nome, cnpj, status ) VALUES( :registro_ans, :nome, :cnpj, :status )' );

			$sentence->bindParam( ':registro_ans', $registro_ans, PDO::PARAM_INT );
			$sentence->bindParam( ':nome', $nome, PDO::PARAM_STR );
			$sentence->bindParam( ':cnpj', $cnpj, PDO::PARAM_INT );
			$sentence->bindParam( ':status', $status, PDO::PARAM_STR );

			$sentence->execute();

			if ( $sentence->rowCount() > 0 ) {
				$message = 'Novo plano de saúde cadastrado';
			} else {
				$message = 'Erro, tente novamente';
			}
		} catch ( PDOException $e ) {
			echo $e->getMessage();
		}
	}

	public function read( $registro ) {
		try {
			$sentence = $database->prepare( 'SELECT FROM planos_de_saude WHERE registro_ans=:registro_ans' );

			$sentence->bindParam( ':registro_ans', $registro, PDO::PARAM_INT );

			$sentence->execute();

		} catch ( PDOException $e ) {
			echo $e->getMessage();
		}
	}

	public function update( $registro, $nome, $cnpj, $status ) {
		try {
			$sentence = $database->prepare( 'UPDATE planos_de_saude SET nome=:nome, cnpj=:cnpj, status=:status WHERE registro_ans=:registro_ans' );

			$sentence->bindParam( ':registro_ans', $registro, PDO::PARAM_INT );
			$sentence->bindParam( ':nome', $nome, PDO::PARAM_STR );
			$sentence->bindParam( ':cnpj', $cnpj, PDO::PARAM_INT );
			$sentence->bindParam( ':status', $status, PDO::PARAM_STR );

			$sentence->execute();

			if ( $sentence->rowCount() > 0 ) {
				$message = 'O plano de saúde ' . $nome . ' foi alterado com sucesso';
				$_POST = array();
			} else {
				$message = 'Um erro ocorreu, tente novamente';
			}
		} catch ( PDOException $e ) {
			echo $e->getMessage();
		}
	}

	public function delete( $registro ) {
		try {
			$sentence = $database->prepare( 'DELETE FROM planos_de_saude WHERE registro_ans=:registro_ans' );

			$sentence->bindParam( ':registro_ans', $id, PDO::PARAM_INT );

			$sentence->execute();

		} catch ( PDOException $e ) {
			echo $e->getMessage();
		}
	}
}
