<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
	protected $table = 'barang';
	protected $primaryKey = 'kode_barang';
	
	protected $returnType = 'array';
	protected $useSoftDeletes = false;
	
	protected $allowedFields = ['kategory_barang','nama_barang', 'harga_beli', 'harga_jual','stok_barang',
	'image'	];
	
	protected $useTimestamps = false;
	
	// protected $validationRules    = [
    //     'company_name' => 'required|min_length[5]',
    //     'company_address' => 'required|min_length[5]',
    // ];
	
	// protected $validationMessages = [
    //     'customername' => [
    //         'required' => 'Bagian Name Harus diisi',
    //         'min_length' => 'Minimal 5 Karakter'
    //     ],
    //     'customeraddr' => [
    //         'required' => 'Bagian Addr Harus diisi',
    //         'min_length' => 'Minimal 5 Karakter'
    //     ]
    // ];
    protected $skipValidation  = false;
	
	public function selectall()
	{	$db = db_connect();
		$sql = "SELECT * FROM barang";
		$data = $db->query($sql)->getResultArray();;
		return $data;
	}
	public function selectwhere($id)
	{	$db = db_connect();
		$sql = "SELECT * FROM barang where kode_barang = ?";
		$data = $db->query($sql,$id)->getResultArray();;
		return $data;
	}
	public function insertData($data)
	{
		$db = db_connect();
		$sql = "INSERT INTO barang (kategory_barang,nama_barang,harga_beli,harga_jual,stok_barang,image) VALUES 
		(" . $db->escape($data['kategory']) . "," . $db->escape($data['nama']) .
                "," . $db->escape($data['hargabeli']) . "," . $db->escape($data['hargajual']) .
				"," . $db->escape($data['stok']) ."," . $db->escape($data['image']) .")";
		$insert =  $db->query($sql);
		if ($insert) {
			return ([
			    'status'=> 0,
                'message'=>'new transaction created'
			    ]);
		} else {
			return ([
			    'status'=> 2,
                    'message' => 'failed to create new data']);
		}
	}
	
	public function updateData($id,$data)
	{
		$db = db_connect();
		$sql = "UPDATE barang SET kategory_barang = " . $db->escape($data['kategory']) . "
		, nama_barang= " . $db->escape($data['nama']) .", harga_beli = " . $db->escape($data['hargabeli']) . "
		, harga_jual=" . $db->escape($data['hargajual']) .",stok_barang=" . $db->escape($data['stok']) ."
		,image=" . $db->escape($data['image']) ." WHERE kode_barang = " . $db->escape($id) ."";
		$update =  $db->query($sql);
		if ($update) {
			return ([
			    'status'=> 0,
                'message'=>'update  done'
			    ]);
		} else {
			return ([
			    'status'=> 2,
                    'message' => 'failed to update data']);
		}
	}
	
	public function deleteData($id)
	{
		$db = db_connect();
		$sql = "DELETE FROM barang WHERE kode_barang = " . $db->escape($id) ." ";
		$delete= $db->query($sql);
			if ($delete) {
			return ([
			    'status'=> 0,
                'message'=>'delete trans done'
			    ]);
		} else {
			return ([
			    'status'=> 2,
                    'message' => 'failed to delete trans']);
		}
	}
	
	
}