<?php

namespace App\Console\Commands;

use App\Models\Books;
use App\Repositories\token\Services\AbstractApi\AbstractApiServices;
use Illuminate\Console\Command;

class Books_count extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Books:count_update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update count for Books';

    /**
     * Execute the console command.
     */
    public function handle()
    {
     $client = new AbstractApiServices();
     $result = $client->live();

        foreach ($result->exchange_rates as $key => $value) {
            $token = Books::where(['name' => $key])->first();
            if (is_null($token)){
                Books::create(
                    [
                    'name' => (string) $key ,
                    'count'=>  $value,
                    'description' => 'скоро добавим' ,
                    'years' => 2024
                  ]);
            }else{
                Books::where(['name'=>$key])->update
                ([
                    'count'=>$value,
                ]);
            }
            }

     }


}

