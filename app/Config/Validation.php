<?php

namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $input_produk = [
		'nomor_suku_cadang' => [
			'rules' => 'required|min_length[5]|max_length[20]',
			'errors' => [
				'required' => 'Seri Suku Cadang Wajib Diisi',
				'min_length' => 'Minimal 5 Karakter',
				'max_length' => 'Maximal 20 Karakter'
			]
		],
		'nama_suku_cadang' => [
			'rules' => 'required|alpha_numeric_space|min_length[5]|max_length[50]',
			'errors' => [
				'required' => 'Seri Suku Cadang Wajib Diisi',
				'alpha_numeric_space' => 'Hanya Diisi dengan karakter huruf, Angka dan Spasi Saja',
				'min_length' => 'Minimal 5 Karakter',
				'max_length' => 'Maximal 20 Karakter'
			]
		],
		'status' => [
			'rules' => 'required|numeric',
			'errors' => [
				'required' => 'Status Wajib Dipilih',
				'numeric' => 'Harus Karakter Angka'
			]
		]
	];

	public $input_produk_masuk = [
		'tanggal' => [
			'rules' => 'required|valid_date',
			'errors' => [
				'required' => 'Tanggal Wajib Diisi',
				'valid_date' => 'Silahkan Isi Dengan Format Tanggal'
			]
		],
		'QTY' => [
			'rules' => 'required|integer',
			'errors' => [
				'required' => 'Quantity Wajib Diisi',
				'integer' => 'Harap Diisi dengan Karakter Angka'
			]
		]
	];

	public $input_produk_keluar = [
		'tanggal' => [
			'rules' => 'required|valid_date',
			'errors' => [
				'required' => 'Tanggal Wajib Diisi',
				'valid_date' => 'Silahkan Isi Dengan Format Tanggal'
			]
		],
		'QTY' => [
			'rules' => 'required|integer',
			'errors' => [
				'required' => 'Quantity Wajib Diisi',
				'integer' => 'Harap Diisi dengan Karakter Angka'
			]
		]
	];

	public $input_alternatif = [
		'nama_alternatif' => [
			'rules' => 'required|string',
			'errors' => [
				'required' => 'Nama Wajib Diisi Wajib Diisi',
				'string' => 'Silahkan Isi Dengan Karakter String'
			]
		]
	];
}
