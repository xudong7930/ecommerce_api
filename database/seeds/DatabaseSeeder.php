<?php

use App\Blog;
use App\Category;
use App\Profile;
use App\User;
use App\Website;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    protected $tables = [
        'users', 'category', 'profile'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->tableTruncate();
        
        factory(Profile::class, 20)->create();
        factory(Website::class, 10)->create();
        factory(Blog::class, 40)->create()->each(function($blog){
            $flag = random_int(0, 1);
            $ids = range(1, 10);

            shuffle($ids);

            if ($flag) {
                $sliced = array_slice($ids, 0, 2);
                $blog->websites()->attach($sliced);
            } else {
                $blog->websites()->attach(array_rand($ids, 1));
            }
        });
    }

    protected function tableTruncate()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        foreach ($this->tables as $table) {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }


}
