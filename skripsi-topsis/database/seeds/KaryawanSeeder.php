<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `karyawans`(`id`,`nik`,`name`,`birthday`,`gender`,`agama`,`status`,`gaji`,`masuk`,`created_at`,`updated_at`) VALUES
        (1, 'wd-1001', 'Daru Mustofa', '1986-12-23', 'L', 'Islam', 'Bekerja', '6500000', '2014-01-24', '2014-01-24', '2014-01-24'),
        (2, 'wd-1002', 'Vian Michael', '1981-09-15', 'L', 'Katolik', 'Bekerja', '6500000', '2015-01-24', '2015-01-24', '2015-01-24' ),
        (3, 'wd-1003', 'Indra Ahmad Hadi', '1987-11-01', 'L', 'Islam', 'Bekerja', '6500000', '2016-01-24', '2016-01-24', '2016-01-24' ),
        (4, 'wd-1004', 'Imron Fajar', '1991-01-14', 'L', 'Hindu', 'Bekerja', '6500000', '2017-01-24', '2017-01-24', '2017-01-24' ),
        (5, 'wd-1005', 'Djendrie', '1985-10-24', 'L', 'Budah', 'Bekerja', '6500000', '2018-01-24', '2018-01-24', '2018-01-24' );");
    }
}
