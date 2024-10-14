<?php
namespace App\Services;
class UserApiService {
    protected $client;
    protected $url = 'http://localhost:4000/users';
    public function __construct()
    {
        $this->client = \Config\Services::curlrequest();
    }
    public function register($data)
    {
        $response = $this->client->post($this->url, [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body' => json_encode($data)
        ]);
        return json_decode($response->getBody(), true);
    }
    public function findAll()
    {
        $response = $this->client->get($this->url);
        return json_decode($response->getBody(), true);
    }
    public function delete($id)
    {
        $response = $this->client->delete($this->url . '/' . $id);
        return json_decode($response->getBody(), true);
    }
    public function getById($id)
    {
        $response = $this->client->get($this->url . '/' . $id);
        return json_decode($response->getBody(), true);
    }
    public function update($id, $data) {
        $response = $this->client->put($this->url . '/' . $id, [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body' => json_encode($data)
        ]);
        return json_decode($response->getBody(), true);
    }
}