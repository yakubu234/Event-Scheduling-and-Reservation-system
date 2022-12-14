<?php

namespace App\Http\Controllers;

use App\Actions\Events\MakeReservationAction;
use App\Http\Requests\ReceiptNumberOnlyRequest;
use App\Http\Requests\ReservationHistoryRequest;
use App\Http\Requests\ReservationRequest;
use App\Http\Resources\ReservationResource;
use App\Models\Reservation;
use App\Traits\paystackCallbackTrait;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    use ResponseTrait, paystackCallbackTrait;

    public function makeReservation(ReservationRequest $request)
    {
        return (new MakeReservationAction())->makeReservation($request->all());
    }

    public function previewReservation(ReceiptNumberOnlyRequest $request)
    {
        $reservation = Reservation::where('receipt_number', $request->receipt_number)->get();

        if ($reservation->isEmpty()) return $this->error('Receipt number is invalid', 402, 'receipt number is invalid');

        return $this->success((new ReservationResource($reservation[0])), 'booked successfully', 200);
    }

    public function paystackCallback(Request $request)
    {
        $reference = $request->reference;
        return $this->getCallbackData($reference);
    }

    public function reservationHistory(ReservationHistoryRequest $request)
    {
        $searcKey = $request->email ? $request->email : $request->phone;
        $reservation = Reservation::where('email', 'LIKE', "%{$searcKey}%")->orWhere('phone', 'LIKE', "%{$searcKey}%")->latest()->paginate(50);

        if ($reservation->isEmpty()) return $this->error('The data is invalid', 402, 'The data is invalid');
        $resourceData = [
            ReservationResource::collection($reservation)->response()->getData(true)
        ];

        return $this->success($resourceData, 'booked successfully', 200);
    }
}
