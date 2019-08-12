<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('curso')->insert([
            'nome_curso' => 'Sistemas de Informação',
        ]);
        DB::table('curso')->insert([
            'nome_curso' => 'Design',
        ]);
        DB::table('curso')->insert([
            'nome_curso' => 'Urbanismo',
        ]);
        DB::table('curso')->insert([
            'nome_curso' => 'Química',
        ]);

        DB::table('tcc_materia')->insert([
            'nome_materia' => 'TCC I',
        ]);
        DB::table('tcc_materia')->insert([
            'nome_materia' => 'TCC II',
        ]);

        DB::table('tipo_entrega')->insert([
            'nome_entrega' => 'PRE-BANCA',
        ]);
        DB::table('tipo_entrega')->insert([
            'nome_entrega' => 'MONOGRAFIA',
        ]);
        DB::table('tipo_entrega')->insert([
            'nome_entrega' => 'BANCA',
        ]);
        DB::table('tipo_entrega')->insert([
            'nome_entrega' => 'AJUSTES NA MONOGRAFIA',
        ]);
        DB::table('tipo_entrega')->insert([
            'nome_entrega' => 'MONOGRAFIA FINAL',
        ]);

        DB::table('atuacao')->insert([
            'atuacao_nome' => 'ADMINISTRADOR',
        ]);
        DB::table('atuacao')->insert([
            'atuacao_nome' => 'PROFESSOR ORIENTADOR',
        ]);
        DB::table('atuacao')->insert([
            'atuacao_nome' => 'PROFESSOR DE TCC',
        ]);
        DB::table('atuacao')->insert([
            'atuacao_nome' => 'SECRETARIA',
        ]);
        DB::table('atuacao')->insert([
            'atuacao_nome' => 'COORDENACAO',
        ]);
        DB::table('atuacao')->insert([
            'atuacao_nome' => 'ALUNO',
        ]);

        DB::table('users')->insert([
            'nome' => 'ADMINISTRADOR',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('sgtcc==gnus'),
            'matricula' =>'071858965',
            'telefone'=>'32189208',
            'curso_id'=>1,
            'atuacao_id'=>1,
        ]);

        DB::table('users')->insert([
            'nome' => 'Admin_ana',
            'email' => 'admin_ana@gmail.com',
            'password' => bcrypt('sgtcc==ana'),
            'matricula' =>'071125954',
            'telefone'=>'32185874',
            'curso_id'=>1,
            'atuacao_id'=>1,
        ]);

        DB::table('users')->insert([
            'nome' => 'ProfOri_ana',
            'email' => 'profOri_ana@gmail.com',
            'password' => bcrypt('sgtcc==ana'),
            'matricula' =>'071198741',
            'telefone'=>'32189687',
            'curso_id'=>1,
            'atuacao_id'=>2,
        ]);
        DB::table('users')->insert([
            'nome' => 'ProfTcc_ana',
            'email' => 'profTcc_ana@gmail.com',
            'password' => bcrypt('sgtcc==ana'),
            'matricula' =>'071101235',
            'telefone'=>'32189871',
            'curso_id'=>1,
            'atuacao_id'=>3,
        ]);
        DB::table('users')->insert([
            'nome' => 'Coord_ana',
            'email' => 'coord_ana@gmail.com',
            'password' => bcrypt('sgtcc==ana'),
            'matricula' =>'071182214',
            'telefone'=>'32189647',
            'curso_id'=>1,
            'atuacao_id'=>4,
        ]);
        DB::table('users')->insert([
            'nome' => 'Secretaria_ana',
            'email' => 'secretaria_ana@gmail.com',
            'password' => bcrypt('sgtcc==ana'),
            'matricula' =>'071199674',
            'telefone'=>'32180141',
            'curso_id'=>1,
            'atuacao_id'=>5,
        ]);
        DB::table('users')->insert([
            'nome' => 'Aluno_ana',
            'email' => 'aluno_ana@gmail.com',
            'password' => bcrypt('sgtcc==ana'),
            'matricula' =>'071129866',
            'telefone'=>'32189871',
            'curso_id'=>1,
            'atuacao_id'=>6,
        ]);


    }
}
