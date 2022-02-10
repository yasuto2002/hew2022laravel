<?php

namespace App\Http\Controllers;
use Aws\Ses\SesClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        header("Access-Control-Allow-Origin: *");  //CORS
        header('Access-Control-Allow-Methods', '*');
        header('Access-Control-Allow-Headers', 'Content-Type,Authorization, X-Requested-With,X-CSRF-Token,X-XSRF-TOKEN');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With");
        $item = ['data'=>$request->id];
        return $item;
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
        $rand_str = chr(mt_rand(65,90)) . chr(mt_rand(65,90)) . chr(mt_rand(65,90)) .
            chr(mt_rand(65,90)) . chr(mt_rand(65,90)) . chr(mt_rand(65,90));
        $pas = password_hash($request->password, PASSWORD_DEFAULT);
        $param=[
            'name' => $request->kName,
            'mail_address' => $request->mail_address,
            'password' => $pas,
            'sex' => $request->sex,
            'kname' => $request->hName,
            'birthday' => $request->birthday,
            'security_code' => $rand_str
        ];
        DB::beginTransaction();
        try{
            DB::table('tentative_users')->insert($param);
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
            'Data' => 'TROBLE HOUSE認証コード',
            ],
            'Body' => [
            'Text' => [
            'Charset' => 'UTF-8',
            'Data' => $rand_str,
            ],
            ],
            ],
            ]);

            $messageId = $result->get('MessageId');
            DB::commit();
            $flg = ['state'=>true];
            return $flg;
        }catch(\Exception $e){
            // $em = $e->getCode();
            $flg = ['state'=>false];
            return $flg;
        }
        // DB::table('users')->insert($param);
        //  $flg = ['state'=>true];
        return $flg;
        // $item = ['data'=>$request->hName];
        // return $item;
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
