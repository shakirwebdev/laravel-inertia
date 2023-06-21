<?php

namespace Database\Seeders;

use App\Models\Sentence;
use Illuminate\Database\Seeder;

class SentenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sentence::insert([
            [
                'text' => 'Dropee.com',
                'row' => 1,
                'col' => 2,
                'css' => 'text-black',
            ],
            [
                'text' => 'B2B Marketplace',
                'row' => 3,
                'col' => 1,
                'css' => 'text-black',
            ],
            [
                'text' => 'SaaS enabled marketplace',
                'row' => 2,
                'col' => 3,
                'css' => 'text-black',
            ],
            [
                'text' => 'Provide Transparency',
                'row' => 4,
                'col' => 4,
                'css' => 'text-black',
            ],
            [
                'text' => 'Build Trust',
                'row' => 1,
                'col' => 4,
                'css' => 'text-black',
            ],
        ]);
    }
}
