 <?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EncargadoEmpresasPendientes extends Model
{
     protected $table = 'EncargadoEmpresasPendientes';
	  protected $fillable =[//aqui va el nombre de la tabla
       'idEmpresa', 'Nombre','Direccion', 'Telefono'
      ];
}
