<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Barang;
use App\Karyawan;
use App\Supplier;
use App\Tran_Masuk;
use App\Tran_Keluar;

class Klik extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $User = User::create(['name'=>'Nadiyah','email'=>'nadiyah@gmail.com','password'=>'rahasia']);
        $Barang = Barang::create(['logo'=>'','nama_bar'=>'harddisk','merk'=>'Acer20','stock'=>20]);
        $Karyawan = Karyawan::create(['nama_kar'=>'nadiyah','alamat'=>'Sayuran','jk'=>'perempuan','no_hp'=>897656578,'bagian'=>'kasir']);
        $Supplier = Supplier::create(['nama_per'=>'Acer']);
        $Tran_Masuk = Tran_Masuk::create(['tgl_masuk'=>'2017-09-17','user_id'=>$User->id,'sup_id'=>$Supplier->id,'barang_id'=>$Barang->id,'hargas'=>1000000,'jumlahs'=>2000000,'total'=>1200000]);
        $Tran_Keluar = Tran_Keluar::create(['tgl_keluar'=>'2017-09-18','user_id'=>$User->id,'barang_id'=>$Barang->id,'jumlahk'=>'20']);

    }
}
