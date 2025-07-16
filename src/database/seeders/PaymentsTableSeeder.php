<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::create([
            'user_id' => 1,
            'product_id' => 1,
            'amount' => 15000,
            'payment_method' => 'card',
            'paid_at' => now(),
        ]);
    }
}
