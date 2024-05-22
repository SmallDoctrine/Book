<?php

namespace App\Console\Commands;

use App\Repositories\token\Services\AbstractApi\AbstractApiServices;
use App\Repositories\token\TokenRepositoriesInterface;
use Illuminate\Console\Command;

class BooksCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'books:count_update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update count for Books';

    /**
     * Execute the console command.
     */
    public function handle(TokenRepositoriesInterface $rep)
    {
        $client = new AbstractApiServices();
        $result = $client->live();

        foreach ($result->exchange_rates as $name => $value) {
            if (is_null($rep->GetOne($name))) {
                $rep->createStore(
                    [
                        'name' => (string)$name,
                        'count' => $value,
                        'description' => 'скоро добавим',
                        'years' => 2024
                    ]);
            } else {
                $rep->updateStore($name, ['count' => $value]);
            }
        }

    }

}

