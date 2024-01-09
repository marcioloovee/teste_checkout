<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'cpfCnpj' => 'required|numeric',
            'mobilePhone' => 'required|numeric',
            'billingType' => 'required|in:PIX,BOLETO,CREDIT_CARD',
            'value' => 'required|numeric|min:0.1',
            'dueDate' => 'date',
            'creditCardHolderName' => 'required_if:billingType,CREDIT_CARD',
            'creditCardNumber' => 'required_if:billingType,CREDIT_CARD',
            'creditCardExpiryMonth' => 'required_if:billingType,CREDIT_CARD',
            'creditCardExpiryYear' => 'required_if:billingType,CREDIT_CARD',
            'creditCardCcv' => 'required_if:billingType,CREDIT_CARD',
        ];
    }
}
