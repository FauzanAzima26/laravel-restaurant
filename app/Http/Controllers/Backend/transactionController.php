<?php

namespace App\Http\Controllers\Backend;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Mail\bookingMailConfirm;
use App\Http\services\fileService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class transactionController extends Controller
{

    public function __construct(
        private fileService $fileService
    ){}
    public function index()
    {
        return view('backend.transaction.index', [
            'transactions' => Transaction::latest()->paginate(10)
        ]);
    }

    public function show($id)
    {
        return view('backend.transaction.detail', [
            'transaction' => Transaction::where('uuid', $id)->firstOrFail(),
        ]);
    }

    public function update(Request $request, $id){
        
        $data = $request->validate([
            'status' => 'required|in:pending,success,failed'
        ]);

        try {
            $transaction = Transaction::where('uuid', $id)->firstOrFail();
            $transaction->status = $data['status'];
            $transaction->save();

            // send email
            if($transaction->status !== 'failed'){
                Mail::to($transaction->email)
                    ->cc('operator@gmail.com')
                    ->send(new bookingMailConfirm($transaction));
            }

            return redirect()->back()->with('success', 'Transaction status updated successfully');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', $error->getMessage());
        }
    }

    public function destroy($id){

        $transaction = Transaction::where('uuid', $id)->firstOrFail();
        $this->fileService->delete($transaction->file);
        $transaction->delete();

        return response()->json([
            'message' => 'Transaction deleted successfully'
        ]);
    }
}
