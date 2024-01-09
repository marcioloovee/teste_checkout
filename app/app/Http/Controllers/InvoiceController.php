<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceStoreRequest;
use App\Http\Resources\InvoiceResource;
use App\Models\Invoice;
use App\Models\User;
use App\Services\AsaasService;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function store(InvoiceStoreRequest $request)
    {

        $customerService = new AsaasService();
        $customer = $customerService->createCustomer($request->all());

        $request->merge([
            'customer' => $customer['id']
        ]);

        $payment = $customerService->createPayment($request->all());

        if ($request->billingType === "PIX") {
            $infoPix = $customerService->getPixQrCodePayment($payment['id']);
            $payment['keyPix'] = $infoPix['payload'];
            $payment['qrCode'] = $infoPix['encodedImage'];
            $payment['expirationDate'] = $infoPix['expirationDate'];
        }

        if ($request->billingType === "BOLETO") {
            $infoBoleto = $customerService->getBarCodePayment($payment['id']);
            $payment['barCode'] = $infoBoleto['barCode'];
        }

        $invoice = new Invoice();
        $invoice->id_external = $payment['id'];
        $invoice->user_id = User::query()->where('customer',$customer['id'])->first()->id;
        $invoice->type = $payment['billingType'];
        $invoice->amount = $payment['value'];
        $invoice->dueDate = $payment['dueDate'];
        $invoice->keyPix = $payment['keyPix'] ?? null;
        $invoice->codeBar = $payment['codeBar'] ?? null;
        $invoice->status = $payment['status'];
        $invoice->save();

        $request->merge($payment);

        return new InvoiceResource($payment);

    }
}
