<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'cheque-list',
           'cheque-create',
           'cheque-edit',
           'cheque-delete',
           'users-list',
           'users-create',
           'users-edit',
           'users-delete',
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'adherant-list',
           'adherant-create',
           'adherant-edit',
           'adherant-delete',
           'societe-list',
           'societe-create',
           'societe-edit',
           'societe-delete',
           'statistiques-list',
           'statistiques-create',
           'statistiques-edit',
           'statistiques-delete',
           'amical-list',
           'amical-create',
           'amical-edit',
           'amical-delete',
           'facture-list',
           'facture-create',
           'facture-edit',
           'facture-delete',
           'tranche-list',
           'tranche-create',
           'tranche-edit',
           'tranche-delete',
           'employees-list',
           'employees-create',
           'employees-edit',
           'employees-delete',
           'agenda-list',
           'agenda-create',
           'agenda-edit',
           'agenda-delete',
           'certificat-list',
           'certificat-create',
           'certificat-edit',
           'certificat-delete',
           'scannerPDF-list',
           'scannerPDF-create',
           'scannerPDF-edit',
           'scannerPDF-delete',
           'contractPDF-list',
           'contractPDF-create',
           'contractPDF-edit',
           'contractPDF-delete',
        ];
   
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
