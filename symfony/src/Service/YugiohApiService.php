<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class YugiohApiService
{
    private const API_URL = 'https://db.ygoprodeck.com/api/v7';

    public function __construct(private HttpClientInterface $httpClient) {}

    public function getSingleCard($search)
    {
        try {
            $responseData = $this->httpClient->request('GET', self::API_URL . '/cardinfo.php?name=' . $search);
            $data = $responseData->toArray();

            $card = $data;

        } catch (\Exception $e) {
            $error = $e->getMessage();
            return $error;
        }
        return $card;
    }

    public function getAllCards($search)
    {
        try {
            $responseData = $this->httpClient->request('GET', self::API_URL . '/cardinfo.php' . $search);
            $data = $responseData->toArray();

        } catch (\Exception $e) {
            $error = $e->getMessage();
            return $error;
        }
        return $data;
    }

    public function getSet() {
        try {
            $responseData = $this->httpClient->request('GET', self::API_URL . '/cardsets.php');
            $data = $responseData->toArray();

            $sets = array_slice($data, 0, 6);
            //$sets = array_rand($data, 6);

        } catch (\Exception $e) {
            $error = $e->getMessage();
            return $error;
        }
        return $sets;
    }
}
