<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Aws\Ses\SesClient;
class PasforgottenController extends Controller
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
            $exits = DB::table('users')->where('mail_address', $request->mail_address)->exists();
            if($exits){
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
                'Data' => 'TROBLE HOUSEパスワード認証',
                ],
                'Body' => [
                'Text' => [
                'Charset' => 'UTF-8',
                'Data' => 'https://yasuto0101.com/ForgetConfirmation?id='.$request->rand,
                ],
                ],
                ],
                ]);

                $messageId = $result->get('MessageId');
                $flg = ['state'=>true];
                DB::commit();
                return $flg;
            }else{
                $flg = ['state'=>false];
                DB::commit();
                return $flg;
            }
        }catch(\Exception $e){
            DB::commit();
            $ret = ['state'=>$e->getMessage()];
            return $ret;
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
