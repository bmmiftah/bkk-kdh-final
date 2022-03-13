<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use App\Models\Lowongan;
use App\Models\Informasi;
use App\Models\Perusahaan;
use Illuminate\Database\Seeder;
use App\Http\Controllers\InformasiController;
use App\Models\Jenis_kelamin;
use App\Models\Vaksin;
use Illuminate\Database\DBAL\TimestampType;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // user
        

        User::create([
            'role_id' => 2,
            'name' => 'Bagus Miftah Nur Haqqi',
            'username' => 'bmiftah',
            'email' => 'bagus.miftah@outlook.com',
            'password' => bcrypt('Aprl031999'),
            'active' => 1,
            'email_verified_at' => date('Y-m-d H:m:s')
        ]);

         // jenis kelamin

        Jenis_kelamin::create([
            'jenis_kelamin' => 'Laki-Laki',
            'slug' => 'laki-laki'
        ]);

        Jenis_kelamin::create([
            'jenis_kelamin' => 'Perempuan',
            'slug' => 'perempuan'
        ]);


        // Role Seeders
        
        Role::create([
            'title_role' => 'User',
            'slug' => 'user'
        ]);
        
        Role::create([
            'title_role' => 'Admin',
            'slug' => 'admin'
        ]);

         // vaksin Seeders
        
        Vaksin::create([
            'jenis_vaksin' => 'Sinovac',
            'slug' => 'sinovac'
        ]);
        
        Vaksin::create([
            'jenis_vaksin' => 'AstraZeneca',
            'slug' => 'astrazeneca'
        ]);

        Vaksin::create([
            'jenis_vaksin' => 'Sinophram',
            'slug' => 'sinophram'
        ]);

        Vaksin::create([
            'jenis_vaksin' => 'Moderna',
            'slug' => 'moderna'
        ]);
        
        Vaksin::create([
            'jenis_vaksin' => 'Novavax',
            'slug' => 'novavax'
        ]);

        Vaksin::create([
            'jenis_vaksin' => 'Sputnik-V',
            'slug' => 'sputnik-v'
        ]);

        Vaksin::create([
            'jenis_vaksin' => 'Janssen',
            'slug' => 'janssen'
        ]);

        Vaksin::create([
            'jenis_vaksin' => 'Convidencia',
            'slug' => 'convidencia'
        ]);

        Vaksin::create([
            'jenis_vaksin' => 'Zifivax',
            'slug' => 'zifivax'
        ]);

        // Category Seeders

        Category::create([
            'title_category' => 'Umum',
            'slug' => 'umum'
        ]);

        Category::create([
            'title_category' => 'Hasil Pengumpulan Berkas',
            'slug' => 'hasil-pengumpulan-berkas'
        ]);

        Category::create([
            'title_category' => 'Hasil SIKOTES',
            'slug' => 'hasil-sikotes'
        ]);

        Category::create([
            'title_category' => 'Hasil Interview',
            'slug' => 'hasil-interview'
        ]);

        Category::create([
            'title_category' => 'Hasil MCU',
            'slug' => 'hasil-MCU'
        ]);

        // perusahaan seeders
        
        Perusahaan::create([
            'nama_perusahaan' => 'PT. Astra Honda Motor',
            'slug' => 'pt-astra-honda-motor',
            'detail_perusahaan' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam quae voluptatem voluptatum rerum eius facilis quis exercitationem asperiores aperiam.'
        ]);
        Perusahaan::create([
            'nama_perusahaan' => 'PT. Toyota',
            'slug' => 'pt-toyota',
            'detail_perusahaan' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam quae voluptatem voluptatum rerum eius facilis quis exercitationem asperiores aperiam.'
        ]);
        Perusahaan::create([
            'nama_perusahaan' => 'PT. Tech Inovation Sejahtera',
            'slug' => 'pt-tech-inovation-sejahtera',
            'detail_perusahaan' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam quae voluptatem voluptatum rerum eius facilis quis exercitationem asperiores aperiam.'
        ]);

        //lowongan seeders

        Lowongan::create([
            'title_lowongan' => 'Senior UX Writer',
            'slug' => 'senior-ux-writer',
            'perusahaan_id' => 3,
            'detail_lowongan' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero in totam, maxime sunt porro assumenda, pariatur iusto dignissimos neque animi vel, cumque officiis? Facere dolores placeat quis natus nihil inventore, ea numquam tempore laudantium, repellendus doloremque autem magni ipsa impedit earum tempora amet vitae ut fuga aperiam voluptates? Possimus accusantium impedit doloremque quisquam id unde temporibus dolorem, quidem esse illo! Natus harum cupiditate aliquid earum dignissimos consequatur excepturi distinctio amet error neque, iusto eligendi porro doloremque recusandae illum ullam, repudiandae labore impedit adipisci? Voluptatem nulla est voluptate dicta saepe, doloremque porro quae labore illo id quisquam? Saepe recusandae eligendi eaque. ',
            'kriteria_lowongan' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo sapiente distinctio, deleniti voluptatibus ab soluta excepturi, voluptate labore numquam at repellendus molestias pariatur. Libero ipsa blanditiis dolore fuga tenetur. Vero, dolorum! Accusantium quia eum corporis, voluptas dolore id dolor aut necessitatibus minus officiis mollitia porro quo perspiciatis rerum nam quidem.',
            'informasi_tambahan' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati vero corrupti vitae magni. Voluptatem a repellat quisquam tempora nostrum dicta quod neque sequi maxime in corrupti reprehenderit impedit exercitationem, ab nobis amet eius, facilis qui tenetur nulla quis molestias ipsam! Voluptatem, nobis impedit odit sequi, expedita quisquam debitis tempore incidunt voluptas non libero sunt eius hic rem officia, architecto amet culpa fugit voluptate? Blanditiis quae nulla consectetur doloremque est soluta accusamus earum maiores, commodi fuga nostrum iusto similique eius consequuntur dignissimos quos in inventore, iste dolorem! In doloribus excepturi tenetur. Error, beatae! Quasi est exercitationem tempore possimus, fuga eligendi consequatur ipsa praesentium sequi iste sunt nulla odio hic dolorum voluptas! Nobis eveniet iusto hic veniam magni eaque exercitationem, illum dolores illo, optio incidunt suscipit maiores aspernatur ratione modi fugiat, libero ullam dignissimos mollitia qui obcaecati maxime! Aperiam veniam laboriosam officia quam illo provident enim eaque iusto consequatur impedit ad accusamus animi sit nisi quibusdam quasi quia delectus hic iure, ipsum, quos tenetur! Fuga tempore fugiat iusto repellendus blanditiis voluptatem laborum. Perferendis vel unde nemo deserunt facilis cupiditate ex ipsam! Distinctio, assumenda illum. Voluptates enim nostrum minus beatae in aliquam ullam, aliquid reprehenderit doloribus dolores illo sequi consequatur possimus? Distinctio, ab!',
            'tgl_buka' => '2020-12-23',
            'tgl_tutup' => '2022-01-23',
           
        ]);

        Lowongan::create([
            'title_lowongan' => 'Senior UI Designer',
            'slug' => 'senior-ui-designer',
            'perusahaan_id' => 2,
            'detail_lowongan' => 'Vero in totam, maxime sunt porro assumenda, pariatur iusto dignissimos neque animi vel, cumque officiis? Facere dolores placeat quis natus nihil inventore, ea numquam tempore laudantium, repellendus doloremque autem magni ipsa impedit earum tempora amet vitae ut fuga aperiam voluptates? Possimus accusantium impedit doloremque quisquam id unde temporibus dolorem, quidem esse illo! Natus harum cupiditate aliquid earum dignissimos consequatur excepturi distinctio amet error neque, iusto eligendi porro doloremque recusandae illum ullam, repudiandae labore impedit adipisci? Voluptatem nulla est voluptate dicta saepe, doloremque porro quae labore illo id quisquam? Saepe recusandae eligendi eaque. ',
            'kriteria_lowongan' => 'Illo sapiente distinctio, deleniti voluptatibus ab soluta excepturi, voluptate labore numquam at repellendus molestias pariatur. Libero ipsa blanditiis dolore fuga tenetur. Vero, dolorum! Accusantium quia eum corporis, voluptas dolore id dolor aut necessitatibus minus officiis mollitia porro quo perspiciatis rerum nam quidem.',
            'informasi_tambahan' => 'Error, beatae! Quasi est exercitationem tempore possimus, fuga eligendi consequatur ipsa praesentium sequi iste sunt nulla odio hic dolorum voluptas! Nobis eveniet iusto hic veniam magni eaque exercitationem, illum dolores illo, optio incidunt suscipit maiores aspernatur ratione modi fugiat, libero ullam dignissimos mollitia qui obcaecati maxime! Aperiam veniam laboriosam officia quam illo provident enim eaque iusto consequatur impedit ad accusamus animi sit nisi quibusdam quasi quia delectus hic iure, ipsum, quos tenetur! Fuga tempore fugiat iusto repellendus blanditiis voluptatem laborum. Perferendis vel unde nemo deserunt facilis cupiditate ex ipsam! Distinctio, assumenda illum. Voluptates enim nostrum minus beatae in aliquam ullam, aliquid reprehenderit doloribus dolores illo sequi consequatur possimus? Distinctio, ab!',
            'tgl_buka' => '2020-10-12',
            'tgl_tutup' => '2021-11-12',
          
        ]);

        Lowongan::create([
            'title_lowongan' => 'Supir Rafatar',
            'slug' => 'supir-rafatar',
            'perusahaan_id' => 1,
            'detail_lowongan' => 'Vero in totam, maxime sunt porro assumenda, pariatur iusto dignissimos neque animi vel, cumque officiis? Facere dolores placeat quis natus nihil inventore, ea numquam tempore laudantium, repellendus doloremque autem magni ipsa impedit earum tempora amet vitae ut fuga aperiam voluptates? Possimus accusantium impedit doloremque quisquam id unde temporibus dolorem, quidem esse illo! Natus harum cupiditate aliquid earum dignissimos consequatur excepturi distinctio amet error neque, iusto eligendi porro doloremque recusandae illum ullam, repudiandae labore impedit adipisci? Voluptatem nulla est voluptate dicta saepe, doloremque porro quae labore illo id quisquam? Saepe recusandae eligendi eaque. ',
            'kriteria_lowongan' => 'Illo sapiente distinctio, deleniti voluptatibus ab soluta excepturi, voluptate labore numquam at repellendus molestias pariatur. Libero ipsa blanditiis dolore fuga tenetur. Vero, dolorum! Accusantium quia eum corporis, voluptas dolore id dolor aut necessitatibus minus officiis mollitia porro quo perspiciatis rerum nam quidem.',
            'informasi_tambahan' => 'Error, beatae! Quasi est exercitationem tempore possimus, fuga eligendi consequatur ipsa praesentium sequi iste sunt nulla odio hic dolorum voluptas! Nobis eveniet iusto hic veniam magni eaque exercitationem, illum dolores illo, optio incidunt suscipit maiores aspernatur ratione modi fugiat, libero ullam dignissimos mollitia qui obcaecati maxime! Aperiam veniam laboriosam officia quam illo provident enim eaque iusto consequatur impedit ad accusamus animi sit nisi quibusdam quasi quia delectus hic iure, ipsum, quos tenetur! Fuga tempore fugiat iusto repellendus blanditiis voluptatem laborum. Perferendis vel unde nemo deserunt facilis cupiditate ex ipsam! Distinctio, assumenda illum. Voluptates enim nostrum minus beatae in aliquam ullam, aliquid reprehenderit doloribus dolores illo sequi consequatur possimus? Distinctio, ab!',
            'tgl_buka' => '2021-12-12',
            'tgl_tutup' => '2022-03-02',
          
        ]);

       //Informasi seeder

        Informasi::create([
           'category_id' => 2,
           'lowongan_id' => 3,
           'title_informasi' => 'Hasil Cek Berkas Lowongan ABC',
           'slug' => 'hasil-cek-berkas-lowongan-abc',
           'excerpt' => 'Pengumuman dari hasil cek berkas lowongan ABC',
           'isi_informasi' => 'Berikut ini adalah nama nama yang lolos cek berkas, dan akan melakukan tes berikutnya...'
        ]);

        Informasi::create([
           'category_id' => 5,
           'lowongan_id' => 2,
           'title_informasi' => 'Hasil MCU Lowongan Dadada',
           'slug' => 'hasil-mcu-lowongan-dadada',
           'excerpt' => 'Pengumuman dari hasil MCU lowongan dadada',
           'isi_informasi' => 'Berikut ini adalah nama nama yang lolos MCU, dan akan melakukan tes berikutnya...'
        ]);

        Informasi::create([
           'category_id' => 1,
           'lowongan_id' => 3,
           'title_informasi' => 'Selamat Natal dan Tahun Baru 2020',
           'slug' => 'selamat-natal-dan-taun-baru-2020',
           'excerpt' => 'Selamat Natal dan Tahun Baru 2020, Bagi yang merayakannya',
           'isi_informasi' => 'Selamat Natal dan Tahun Baru 2020, Bagi yang merayakannya..........'
        ]);

        Informasi::create([
           'category_id' => 4,
           'lowongan_id' => 1,
           'title_informasi' => 'Hasil Interview Lowongan HAHA ',
           'slug' => 'hasil-interview-lowongan-haha',
           'excerpt' => 'Pengumuman dari hasil interview lowongan haha',
           'isi_informasi' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum vero voluptatibus assumenda inventore, similique fugit, repudiandae neque corrupti quibusdam nostrum sapiente ipsam? Ex consequatur veniam exercitationem? Nostrum, qui. Esse, officiis.'
        ]);
    }
}
