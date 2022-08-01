<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbUser extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'		=> [
				'type' 		=> 'INT',
				'auto_increment' => true,
				'constraint'     => 5,
			],
			'username'          => [
				'type'           => 'VARCHAR',
				'constraint'     => 20,
			],
			'password'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '30',
			],
			'name' => [
				'type'           => 'VARCHAR',
				'constraint'     => '30',
			],
			'role' => [
				'type'           => 'INT',
				'constraint'     => '1',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('tb_user');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('tb_user');
	}
}
