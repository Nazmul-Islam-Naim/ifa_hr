<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OtherPaymentType;
use App\Models\OtherPaymentSubType;
use App\Models\BankAccount;
use App\Models\OtherPaymentVoucher;
use App\Models\Transaction;
use App\Models\TransactionReport;
use Validator;
use Response;
use Session;
use Auth;
use DB;
include(app_path() . '/library/commonFunction.php');

use App\Exports\PaymentVoucherExport;
use Maatwebsite\Excel\Facades\Excel;

class PaymentVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['alltype']= OtherPaymentType::where('branch_id', session('branch_id'))->where('status', '1')->get();
        $data['allbank']= BankAccount::where('branch_id', session('branch_id'))->get();
        return view('otherPayment.voucher', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'payment_type_id' => 'required',
            'payment_sub_type_id' => 'required',
            'amount' => 'required|numeric|gt:0',
            'payment_for' => 'required',
            'payment_date' => 'required',
            'bank_id' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('flash_message', $validator->errors());
            return redirect()->back()->with('status_color','warning');
        }
        
        $input = $request->all();
        $input['branch_id'] = session('branch_id');
        $input['created_by'] = Auth::id();
        $input['tok'] = date('Ymdhis');
        $input['status'] = 1;
        $input['payment_date'] = dateFormateForDB($request->payment_date);

        DB::beginTransaction();
        try{
            $bug=0;
            $insert= OtherPaymentVoucher::create($input);

            $update=DB::table('bank_account')->where('id', $request->bank_id)->decrement('balance', $request->amount);

            // get payment type name
            $paymentTypeName=DB::table('other_payment_type')->where('id', $request->payment_type_id)->first();

            $insertIntoTransaction = Transaction::create([
                'branch_id'=>session('branch_id'),
                'date'=>dateFormateForDB($request->payment_date),
                'reason'=>'Payment(others-'.$paymentTypeName->name.')',
                'amount'=>$request->amount,
                'tok'=> date('Ymdhis'),
                'status'=> '1',
                'created_by'=> Auth::id(),
            ]);

            $insertIntoReportForReceive = TransactionReport::create([
                'branch_id'=>session('branch_id'),
                'bank_id'=>$request->bank_id,
                'transaction_date'=>dateFormateForDB($request->payment_date),
                'reason'=>'payment(others-'.$paymentTypeName->name.')',
                'amount'=>$request->amount,
                'note'=>$request->note,
                'tok'=>date('Ymdhis'),
                'status'=>'1',
                'created_by'=>Auth::id()
            ]);

            DB::commit();
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            DB::rollback();
        }

        if($bug==0){
            Session::flash('flash_message','Payment Voucher Successfully Added !');
            return redirect()->back()->with('status_color','success');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function findPaymentSubTypeWithType(Request $request)
    {
        $subType = OtherPaymentSubType::where('payment_type_id',$request->id)->get();
        return Response::json($subType);
        die;
    }

    public function report(Request $request)
    {
        $data['alldata']= OtherPaymentVoucher::where('branch_id', session('branch_id'))->where('status', '1')->orderBy('id', 'DESC')->paginate(250);
        $data['alltype']= OtherPaymentType::where('branch_id', session('branch_id'))->where('status', '1')->get();
        $data['allbank']= BankAccount::where('branch_id', session('branch_id'))->get();
        return view('otherPayment.voucherReport', $data);
    }

    public function filter(Request $request)
    {
        if ($request->start_date !="" && $request->end_date !="") {
            $data['alldata']= OtherPaymentVoucher::whereBetween('payment_date', [dateFormateForDB($request->start_date), dateFormateForDB($request->end_date)])->where('branch_id', session('branch_id'))->where('status', '1')->orderBy('id', 'DESC')->paginate(250);
            $data['alltype']= OtherPaymentType::where('branch_id', session('branch_id'))->where('status', '1')->get();
            $data['allbank']= BankAccount::where('branch_id', session('branch_id'))->get();
            $data['start_date']= $request->start_date;
            $data['end_date']= $request->end_date;
            return view('otherPayment.voucherReport', $data);
        }
    }
}
