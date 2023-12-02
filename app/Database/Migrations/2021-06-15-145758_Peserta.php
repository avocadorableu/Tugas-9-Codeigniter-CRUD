<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Peserta extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'peserta_id'          => [
					'type'           => 'INT',
					'constraint'     => 11,
					'unsigned'       => TRUE,
					'auto_increment' => TRUE
			],
			'peserta_name'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '100',
			],
			'peserta_alamat' => [
				'type'           => 'TEXT',
			],
			'peserta_email' => [
					'type'           => 'VARCHAR',
					'constraint'     => '100',
			],
			'peserta_telp'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '30',
			],
		]);
		$this->forge->addKey('peserta_id', TRUE);
		$this->forge->createTable('peserta');
	}

	public function down()
	{
		//
	}
}
