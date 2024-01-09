<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AsaasService
{
    private $token = '$aact_YTU5YTE0M2M2N2I4MTliNzk0YTI5N2U5MzdjNWZmNDQ6OjAwMDAwMDAwMDAwMDAwNzIyNTQ6OiRhYWNoXzQ4OWFmMTE2LTQ0ODAtNDJhZi1iNjkyLTcxZDJhMjIxZGIyOQ==';
    private $url = 'https://sandbox.asaas.com/api/v3';

    public function createCustomer($params)
    {
        $endpoint = '/customers';

        $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'access_token' => $this->token
            ])
            ->post($this->url . $endpoint, [
                'name' => $params['name'],
                'cpfCnpj' => $params['cpfCnpj'],
                'mobilePhone' => $params['mobilePhone']
            ]);

        return $response->json();
    }

    public function createPayment($params)
    {
        $endpoint = '/payments';

        $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'access_token' => $this->token
            ])
            ->post($this->url . $endpoint, [
                'customer' => $params['customer'],
                'billingType' => $params['billingType'],
                'value' => $params['value'],
                'dueDate' => $params['dueDate']
            ]);

        return $response->json();
    }

    public function getPixQrCodePayment($payment)
    {
        $endpoint = "/payments/{$payment}/pixQrCode";

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'access_token' => $this->token
        ])
            ->get($this->url . $endpoint);

        return $response->json();
    }

    public function getBarCodePayment($payment)
    {
        $endpoint = "/payments/{$payment}/identificationField";

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'access_token' => $this->token
        ])
            ->get($this->url . $endpoint);

        return $response->json();
    }
}
