<?php
/**
 * Point Fixture
 */
class PointFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'blank_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'number' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 127, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'portion' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 32, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'portnumb' => array('type' => 'float', 'null' => false, 'default' => '0', 'unsigned' => false),
		'frequency' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 1, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'blank_id' => array('column' => 'blank_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'blank_id' => 1,
			'number' => 1,
			'title' => 'Lorem ipsum dolor sit amet',
			'portion' => 'Lorem ipsum dolor sit amet',
			'portnumb' => 1,
			'frequency' => 1
		),
	);

}
