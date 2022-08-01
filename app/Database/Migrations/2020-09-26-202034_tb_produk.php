<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbProduk extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'		=> [
				'type' 		=> 'INT',
				'auto_increment' => true,
				'constraint'     => 5,
			],
			'nama_suku_cadang'          => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
			],
			'nomor_suku_cadang'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
			],
			'stok' => [
				'type'           => 'INT',
				'constraint'     => '10',
			],
			'status' => [
				'type'           => 'INT',
				'constraint'     => '1',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('tb_produk');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('tb_produk');
	}
}
