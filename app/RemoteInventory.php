<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RemoteInventory extends Model
{ 
	protected $connection = 'sqlsrv';

	protected $table ='inventories';

	protected $fillable = ['partno','vendor_partno','mpn','description','brand','model','location_code','available_qty','price','drop_shipper','ds_vendor_code','location_name','backupflag'];
	
}
