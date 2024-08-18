<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class Guzzle {

	protected $client;

	public function __construct() {
		$this->client = new Client();
	}

	public function get($url, $options = []) {
		return $this->client->request('GET', $url, $options);
	}

	public function post($url, $options = []) {
		return $this->client->request('POST', $url, $options);
	}

	// Add other methods if needed
}
