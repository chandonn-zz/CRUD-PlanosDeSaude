<?php

 /**
  * Main class
  */
class Sistema_Saude {

	/**
	 * Conexão com o banco de dados
	 *
	 * @since    0.1.0
	 * @access   protected
	 * @var      Monk_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $connection;

	/**
	 * Classe de planos de saúde
	 *
	 * @since    0.1.0
	 * @access   protected
	 * @var      Monk_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $planos;

	/**
	 * Classe de pacientes
	 *
	 * @since    0.1.0
	 * @access   protected
	 * @var      Monk_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $pacientes;

	/**
	 * Construtor da classe principal
	 *
	 * @param object $database Objeto com os dados do banco.
	 */
	function __construct( $database ) {

		$this->connection = $database;
		$this->load_classes();

	}

	public function load_classes() {

		require_once 'planos-de-saude.class.php';

		require_once 'pacientes.class.php';

	}

	public function set_class_objects() {

		$this->planos    = new Planos_de_Saude( $connection );
		$this->pacientes = new Pacientes( $connection );

	}

	// planos.
	public function add_plan( $registro ) {
		$this->planos->create();
	}

	public function update_plan( $registro ) {
		$this->planos->update();
	}

	public function delete_plan( $registro ) {
		$this->planos->delete();
	}

	// paciantes.
	public function create_patient( $id ) {
		$this->pacientes->create();
	}

	public function update_patient( $id ) {
		$this->pacientes->update();
	}

	public function delete_patient( $id ) {
		$this->pacientes->delete();
	}
}
