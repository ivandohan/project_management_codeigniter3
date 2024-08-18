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
		$this->load->library('guzzle');
	}

	public function index() {
		$response = $this->client->request('GET', 'api/proyek');
		$data['proyek'] = json_decode($response->getBody()->getContents(), true);
		$this->load->view('proyek/proyek_list', $data);
	}

	public function detail($id) {
		// Mengambil detail proyek dari API
		$response = $this->guzzle->get("http://localhost:8080/api/proyek/detail/$id");
		$data = json_decode($response->getBody(), true);

		// Menyediakan data untuk view
		$data['proyek'] = $data['proyek'];
		$data['lokasiList'] = $data['lokasiList'];

		// Memuat view detail
		$this->load->view('proyek/proyek_detail', $data);
	}

// Menampilkan form tambah proyek baru
	public function create()
	{
		// Mengambil data lokasi dari API
		$response = $this->client->request('GET', 'http://localhost:8080/api/lokasi');
		$lokasiList = json_decode($response->getBody(), true);

		$data['lokasiList'] = $lokasiList;

		$this->load->view('proyek/proyek_create', $data);
	}

// Menyimpan data proyek baru
	public function store()
	{
		// Ambil data dari form
		$namaProyek = $this->input->post('namaProyek');
		$client = $this->input->post('client');
		$pimpinanProyek = $this->input->post('pimpinanProyek');
		$keterangan = $this->input->post('keterangan');
		$tglMulai = $this->input->post('tglMulai');
		$tglSelesai = $this->input->post('tglSelesai');
		$idLokasiList = $this->input->post('idLokasiList'); // Ambil list ID lokasi sebagai string

		// Log untuk debugging
		log_message('debug', 'Data yang diterima: ' . json_encode($this->input->post()));

		// Jika $idLokasiList bukan array, ubah menjadi array
		if (!is_array($idLokasiList)) {
			$idLokasiList = explode(',', $idLokasiList);
		}

		// Siapkan data untuk dikirim ke API
		$data = [
			'namaProyek' => $namaProyek,
			'client' => $client,
			'pimpinanProyek' => $pimpinanProyek,
			'keterangan' => $keterangan,
			'tglMulai' => $tglMulai,
			'tglSelesai' => $tglSelesai,
			'idLokasiList' => $idLokasiList
		];

		try {
			$response = $this->client->request('POST', 'http://localhost:8080/api/proyek', [
				'json' => $data
			]);

			if ($response->getStatusCode() === 201 || $response->getStatusCode() === 200) {
				redirect('proyek');
			} else {
				echo 'Gagal menambahkan proyek baru.';
			}
		} catch (\GuzzleHttp\Exception\ClientException $e) {
			echo 'Gagal menambahkan proyek baru. Error: ' . $e->getMessage();
		}
	}


	public function edit($id)
	{
		$response = $this->guzzle->get('http://localhost:8080/api/proyek/detail/'.$id);
		$proyekData = json_decode($response->getBody()->getContents(), true);

		// Get all available locations
		$lokasiResponse = $this->guzzle->get('http://localhost:8080/api/lokasi');
		$lokasiList = json_decode($lokasiResponse->getBody()->getContents(), true);

		if ($this->input->post()) {
			$id = $this->input->post('id');
			$namaProyek = $this->input->post('namaProyek');
			$pimpinanProyek = $this->input->post('pimpinanProyek');
			$client = $this->input->post('client');
			$keterangan = $this->input->post('keterangan');
			$tglMulai = $this->input->post('tglMulai');
			$tglSelesai = $this->input->post('tglSelesai');
			$idLokasiList = $this->input->post('idLokasiList');

			$proyekData1 = [
				'namaProyek' => $namaProyek,
				'pimpinanProyek' => $pimpinanProyek,
				'client' => $client,
				'keterangan' => $keterangan,
				'tglMulai' => $tglMulai,
				'tglSelesai' => $tglSelesai,
				'idLokasiList' => $idLokasiList
			];


			$this->client->request('PUT', 'http://localhost:8080/api/proyek/update/'.$id, [
				'json' => $proyekData1
			]);
			redirect('proyek');
		}

		$data['proyek'] = $proyekData['proyek'];
		$data['selectedLocationList'] = $proyekData['lokasiList'];
        $data['currentLokasiList'] = array_column($proyekData['lokasiList'], 'id');
        $data['lokasiList'] = $lokasiList;

        $this->load->view('proyek/proyek_edit', $data);
	}

	public function delete($id) {
		$this->client->request('DELETE', 'api/proyek/' . $id);
		redirect('proyek');
	}
}
