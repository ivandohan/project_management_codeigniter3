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
	public function create() {
		$this->load->view('lokasi/lokasi_create');
	}

	public function store() {
		$data = array(
			"namaLokasi" => $this->input->post('namaLokasi'),
			"negara" => $this->input->post('negara'),
			"provinsi" => $this->input->post('provinsi'),
			"kota" => $this->input->post('kota')
		);

		try {
			$client = new \GuzzleHttp\Client();
			$response = $client->request('POST', 'http://localhost:8080/api/lokasi', [
				'json' => $data
			]);

			if ($response->getStatusCode() == 201 || $response->getStatusCode() === 200) {
				redirect('lokasi'); // Redirect to the lokasi list page after successful creation
			} else {
				echo 'Failed to create lokasi. Please try again.';
			}
		} catch (\GuzzleHttp\Exception\RequestException $e) {
			echo 'Error: ' . $e->getMessage();
		}
	}

	public function edit($id) {
		try {
			$client = new \GuzzleHttp\Client();
			$response = $client->request('GET', 'http://localhost:8080/api/lokasi/' . $id);

			if ($response->getStatusCode() == 200) {
				$data['lokasi'] = json_decode($response->getBody()->getContents(), true);
				$this->load->view('lokasi/lokasi_edit', $data);
			} else {
				echo 'Failed to fetch lokasi data.';
			}
		} catch (\GuzzleHttp\Exception\RequestException $e) {
			echo 'Error: ' . $e->getMessage();
		}
	}

	public function update($id) {
		$data = array(
			"namaLokasi" => $this->input->post('namaLokasi'),
			"negara" => $this->input->post('negara'),
			"provinsi" => $this->input->post('provinsi'),
			"kota" => $this->input->post('kota')
		);

		try {
			$client = new \GuzzleHttp\Client();
			$response = $client->request('PUT', 'http://localhost:8080/api/lokasi/' . $id, [
				'json' => $data
			]);

			if ($response->getStatusCode() == 200) {
				redirect('lokasi'); // Redirect to lokasi list page after successful update
			} else {
				echo 'Failed to update lokasi. Please try again.';
			}
		} catch (\GuzzleHttp\Exception\RequestException $e) {
			echo 'Error: ' . $e->getMessage();
		}
	}

	public function delete($id) {
		try {
			$client = new \GuzzleHttp\Client();
			$response = $client->request('DELETE', 'http://localhost:8080/api/lokasi/' . $id);

			if ($response->getStatusCode() == 200) {
				redirect('lokasi'); // Redirect to lokasi list page after successful deletion
			} else {
				echo 'Failed to delete lokasi. Please try again.';
			}
		} catch (\GuzzleHttp\Exception\RequestException $e) {
			echo 'Error: ' . $e->getMessage();
		}
	}
}
