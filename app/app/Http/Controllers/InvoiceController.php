<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceStoreRequest;
use App\Http\Resources\InvoiceResource;
use App\Models\Invoice;
use App\Models\User;
use App\Services\AsaasService;
use http\Client\Response;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function store(InvoiceStoreRequest $request)
    {

        $customerService = new AsaasService();
        $customer = $customerService->createCustomer($request->all());

        if ($customer['error']) {
            return response()->json($customer, \Illuminate\Http\Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $request->merge([
            'customer' => $customer['data']['id'],
            'dueDate' => now()->addDays(5),
        ]);

        $payment = $customerService->createPayment($request->all());

        if ($payment['error']) {
            return response()->json($payment, \Illuminate\Http\Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if ($request->billingType === "PIX") {
            $infoPix = $customerService->getPixQrCodePayment($payment['data']['id']);

            if ($infoPix['error']) {
                return response()->json($infoPix, \Illuminate\Http\Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            $payment['data']['keyPix'] = $infoPix['data']['payload'];
            $payment['data']['qrCode'] = $infoPix['data']['encodedImage'];
            $payment['data']['expirationDate'] = $infoPix['data']['expirationDate'];
        }

        if ($request->billingType === "BOLETO") {
            $infoBoleto = $customerService->getBarCodePayment($payment['data']['id']);

            if ($infoBoleto['error']) {
                return response()->json($infoBoleto, \Illuminate\Http\Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            $payment['data']['barCode'] = $infoBoleto['data']['barCode'];
        }

        $invoice = new Invoice();
        $invoice->id_external = $payment['data']['id'];
        $invoice->user_id = User::query()->where('customer',$customer['data']['id'])->first()->id;
        $invoice->type = $payment['data']['billingType'];
        $invoice->amount = $payment['data']['value'];
        $invoice->dueDate = $payment['data']['dueDate'];
        $invoice->keyPix = $payment['data']['keyPix'] ?? null;
        $invoice->codeBar = $payment['data']['barCode'] ?? null;
        $invoice->status = $payment['data']['status'];
        $invoice->save();

        $request->merge($payment['data']);

        return (new InvoiceResource($request))->toArray($request);

    }

    public function index()
    {
        return Invoice::all();
    }
}
