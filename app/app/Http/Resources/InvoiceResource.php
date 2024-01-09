<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $request): array
    {
        return [
            'id' => $request->id,
            'dateCreated' => $request->dateCreated,
            'customer' => $request->customer,
            'value' => $request->value,
            'billingType' => $request->billingType,
            'status' => $request->status,
            'dueDate' => $request->dueDate,
            'invoiceNumber' => $request->invoiceNumber,
            'linkBoleto' => $request->bankSlipUrl,
            'barCode' => $request->barCode,
            'keyPix' => $request->keyPix,
            'qrCode' => $request->qrCode,
            'expirationDate' => $request->expirationDate,
        ];
    }
}
