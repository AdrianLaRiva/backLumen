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
        $this->call(RegionesSeeder::class);
        $this->call(ComunasSeeder::class);
        $this->call(ModulosSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(TipoEmpresaSeeder::class);
        $this->call(TipoClienteProveedorSeeder::class);
        $this->call(EstadoSeeder::class);
        $this->call(ImpuestoSeeder::class);
        $this->call(TipoPagoSeeder::class);
        $this->call(FormaPagoSeeder::class);
        $this->call(MetodoPagoSeeder::class);
        $this->call(ConfiguracionSeeder::class);
        $this->call(AccionesSeeder::class);
        $this->call(ModuloAccionesSeeder::class);
        $this->call(UnidadesSeeder::class);
        $this->call(DocumentosSeeder::class);
        $this->call(TipoIngresoEgresoSeeder::class);
        $this->call(EmpresaSeeder::class);

    }
}
