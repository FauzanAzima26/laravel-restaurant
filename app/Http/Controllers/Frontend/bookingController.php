<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\services\fileService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\bookingRequest;
use App\Mail\bookingMailPending;

class bookingController extends Controller
{
    public function store(bookingRequest $request)
    {

        $data = $request->validated();

        $fileService = new fileService();

        try {
            $data['file'] = $fileService->upload($data['file'], 'transaction');

            if ($request->type == 'event') {
                $data['amount'] = 100000;
            } else {
                $data['amount'] = 50000;
            }

            // send email
            Mail::to('owner@gmail.com')
                ->cc('operator@gmail.com')
                ->send(new bookingMailPending($data));

            Transaction::create($data);

            return redirect()->back()->with('success', 'Booking created successfully');
        } catch (\Exception $err) {
            $fileService->delete($data['file']);
            return redirect()->back()->with('error', $err->getMessage());
        }
    }
}
