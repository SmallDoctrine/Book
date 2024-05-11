<?php

namespace App\Console\Commands;

use App\Models\Books;
use Illuminate\Console\Command,
    GuzzleHttp\Client;

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
     $result = $this->up();
    Books::where('name',$result->bpi->BTC->code)
        ->update(
            [
          'count'=>  (int) $result->bpi->USD->rate_float
            ]);
    }


    public function up()
    {
        //$client - функция которая находится в родительсском классе
        $client = new Client([
            'base_uri' => 'https://api.coindesk.com/v1/bpi/',
            // префикс сайта /  вся дальнейшая конкрретная часть роута указывается в  $client->get (url)
            'timeout'  => 2.0,
            // время ожидания ответа с домена при отстувии ответа в течении времени результат не будет выполнен
        ]);
        $response = $client->get('currentPrice/btc.json',[]);
        //   теперь в клиенте содержится тело и хедер запроса получуенный с сайта
        return json_decode($response ->getBody());
        //  сейчас получаем именно тело с помощью getBody() можно получить и хедер (200- статус код - ОК)
        // json decode - декорация - расшифровка на человекопонятный формат ( конвертирует с байтов )
        //  сейчас $body имееит результат в своего рода массиве с переменными , где нужно последовательно выбрать нужную нам инфу
     }

}
