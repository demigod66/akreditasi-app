<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset cahced roles and permission
        app()[PermissionRegistrar::class]->forgetCachedPermissions();


        // tambah permission
        Permission::create(['name' => 'lihat content']);
        Permission::create(['name' => 'tambah content standar isi dan standar proses']);
        Permission::create(['name' => 'edit content standar isi dan standar proses']);
        Permission::create(['name' => 'hapus content standar isi dan standar proses']);
        Permission::create(['name' => 'tambah content standar penilaian dan standar sarana']);
        Permission::create(['name' => 'edit content standar penilaian dan standar sarana']);
        Permission::create(['name' => 'hapus content standar penilaian dan standar sarana']);
        Permission::create(['name' => 'tambah content standar pembiayaan dan standar pengelola']);
        Permission::create(['name' => 'edit content standar pembiayaan dan standar pengelola']);
        Permission::create(['name' => 'hapus content standar pembiayaan dan standar pengelola']);
        Permission::create(['name' => 'tambah content standar lulusan dan standar pendidik']);
        Permission::create(['name' => 'edit content standar lulusan dan standar pendidik']);
        Permission::create(['name' => 'hapus content standar lulusan dan standar pendidik']);


        $pic1 = Role::create(['name' => 'PIC_1']);
        $pic1->givePermissionTo('lihat content');
        $pic1->givePermissionTo('tambah content standar isi dan standar proses');
        $pic1->givePermissionTo('edit content standar isi dan standar proses');
        $pic1->givePermissionTo('hapus content standar isi dan standar proses');

        $pic2 = Role::create(['name' => 'PIC_2']);
        $pic2->givePermissionTo('lihat content');
        $pic2->givePermissionTo('tambah content standar penilaian dan standar sarana');
        $pic2->givePermissionTo('edit content standar penilaian dan standar sarana');
        $pic2->givePermissionTo('hapus content standar penilaian dan standar sarana');

        $pic3 = Role::create(['name' => 'PIC_3']);
        $pic3->givePermissionTo('lihat content');
        $pic3->givePermissionTo('tambah content standar pembiayaan dan standar pengelola');
        $pic3->givePermissionTo('edit content standar pembiayaan dan standar pengelola');
        $pic3->givePermissionTo('hapus content standar pembiayaan dan standar pengelola');

        $pic4 = Role::create(['name' => 'PIC_4']);
        $pic4->givePermissionTo('lihat content');
        $pic4->givePermissionTo('tambah content standar lulusan dan standar pendidik');
        $pic4->givePermissionTo('edit content standar lulusan dan standar pendidik');
        $pic4->givePermissionTo('hapus content standar lulusan dan standar pendidik');



        $kepsek = Role::create(['name' => 'kepsek']);
        $kepsek->givePermissionTo('lihat content');

        $superadminRole = Role::create(['name' => 'super-admin']);

        $user = User::factory()->create([
            'name' => 'Person In Charge 1',
            'email' => 'pic1@smkm3.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($pic1);


        $user = User::factory()->create([
            'name' => 'Person In Charge 2',
            'email' => 'pic2@smkm3.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($pic2);


        $user = User::factory()->create([
            'name' => 'Person In Charge 3',
            'email' => 'pic3@smkm3.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($pic3);

        $user = User::factory()->create([
            'name' => 'Person In Charge 4',
            'email' => 'pic4@smkm3.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($pic4);

        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@smkm3.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($superadminRole);

        $user = User::factory()->create([
            'name' => 'Kepala Sekolah',
            'email' => 'kepsek@smkm3.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($kepsek);
    }
}
