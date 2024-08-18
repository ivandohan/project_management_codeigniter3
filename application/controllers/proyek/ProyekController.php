<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class ProyekController extends CI_Controller {

	private $client;

	public function __construct() {
		parent::__construct();
		$this->client = new Client([
			'base_uri' => 'http://localhost:8080/', // Sesuaikan dengan base URI API Java Spring Boot kamu
		]);
	}

	public function index() {
		$response = $this->client->request('GET', 'api/proyek');
		$data['proyek'] = json_decode($response->getBody()->getContents(), true);
		$this->load->view('proyek/proyek_list', $data);
	}

	public function create() {
		if ($this->input->post()) {
			$proyekData = [
				'namaProyek' => $this->input->post('namaProyek'),
				'tglMulai' => $this->input->post('tglMulai'),
				'tglSelesai' => $this->input->post('tglSelesai')
			];
			$this->client->request('POST', 'api/proyek', [
				'json' => $proyekData
			]);
			redirect('proyek');
		}
		$this->load->view('proyek/proyek_create');
	}

	public function edit($id) {
		$response = $this->client->request('GET', 'api/proyek/' . $id);
		$data['proyek'] = json_decode($response->getBody()->getContents(), true);

		if ($this->input->post()) {
			$proyekData = [
				'namaProyek' => $this->input->post('namaProyek'),
				'tglMulai' => $this->input->post('tglMulai'),
				'tglSelesai' => $this->input->post('tglSelesai')
			];
			$this->client->request('PUT', 'api/proyek/' . $id, [
				'json' => $proyekData
			]);
			redirect('proyek');
		}

		$this->load->view('proyek/proyek_edit', $data);
	}

	public function delete($id) {
		$this->client->request('DELETE', 'api/proyek/' . $id);
		redirect('proyek');
	}
}
