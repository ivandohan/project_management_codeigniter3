<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class LokasiController extends CI_Controller {

	private $client;

	public function __construct() {
		parent::__construct();
		// Inisialisasi Guzzle Client
		$this->client = new Client([
			'base_uri' => 'http://localhost:8080/', // Base URI API Anda
		]);
	}

	public function index() {
		try {
			$response = $this->client->request('GET', 'api/lokasi');
			$lokasiList = json_decode($response->getBody(), true);

			$data['lokasiList'] = $lokasiList;

			$this->load->view('lokasi/lokasi_list', $data);
		} catch (Exception $e) {
			show_error('Terjadi kesalahan: ' . $e->getMessage(), 500);
		}
	}
}
