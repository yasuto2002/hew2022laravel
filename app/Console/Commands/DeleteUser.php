<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
class DeleteUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Delete:User';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'ユーザー削除';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        DB::beginTransaction();
        $now = date("Y-m-d");
        try{
            DB::table('users')->whereDate('deleted_at', $now)->delete();
            DB::commit();
            echo $now;
        }catch(\Exception $e){
            echo 'エラー';
        }

    }
}
