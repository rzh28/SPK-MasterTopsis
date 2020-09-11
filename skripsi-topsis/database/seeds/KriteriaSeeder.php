<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `kriterias` (`id`,`name`,`w`,`created_at`,`updated_at`) VALUES
        ('1','Kehadiran','0.30',NULL,NULL),
        ('2','Displin','0.25',NULL,NULL),
        ('3','Tanggung Jawab','0.15',NULL,NULL),
        ('4','Kreativitas','0.10',NULL,NULL),
        ('5','Loyalitas','0.10',NULL,NULL),
        ('6','Kerjasama','0.10',NULL,NULL);");
    }
}
