<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Aws\Ses\SesClient;

class BuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        DB::beginTransaction();
        try{
            $confirmation = DB::table('properties')->select('view_flg')->where('id', $request->properties_id)->first();
            if($confirmation->view_flg == null){
            $rand_num = rand(100000, 999999);
            $param=[
                'properties_id' => $request->properties_id,
                'mail_address' => $request->mail_address,
                'purchase_price' => $request->purchase_price,
                'discount_amount' => $request->discount_amount,
                'furigana' => $request->furigana,
                'phone_number' => $request->phone_number,
                'street_address' => $request->street_address,
                'postal_code' => $request->postal_code,
                'search_password' => $rand_num,
                'name' => $request->name,
                'card' => $request->card,
            ];
            DB::table('purchase_histories')->insert($param);
            $param=[
                'view_flg'=>true
            ];
            DB::table('properties')->where('id', $request->properties_id)->update($param);
            DB::commit();
            $ses = SesClient::factory(array(
                'version'=> 'latest',
                'region' => 'ap-northeast-1',
            ));
            $result = $ses->sendEmail([
            // TODO: 送信元メールアドレスの入力
            'Source' => 'hew@yasuto0101.com',
            'Destination' => [
            'ToAddresses' => [
            // TODO: 送信先メールアドレスの入力
            $request->mail_address,
            ],
            ],
            'Message' => [
            'Subject' => [
            'Charset' => 'UTF-8',
            'Data' => 'TROBLE HOUSE購入番号',
            ],
            'Body' => [
            'Text' => [
            'Charset' => 'UTF-8',
            'Data' => $rand_num,
            ],
            ],
            ],
            ]);

            $messageId = $result->get('MessageId');
            $flg = ['state'=>true,'num'=>$rand_num];
            return $flg;
        }else{
            $flg = ['state'=>false,'num'=>$confirmation->view_flg];
            return $flg;
        }
        }catch(\Exception $e){
            DB::commit();
            $flg = ['state'=>$e->getMessage()];
            return $flg;
        }
        catch (SesException $error) {
            $flg = ['state'=>$error->getAwsErrorMessage()];
            return $flg;
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
}
