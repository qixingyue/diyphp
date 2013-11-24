<?php

/**
 * 封装mysql的db操作
 * @author qixingyue
 */
class db_model {
	
	/**
	 * @var mysqli
	 */
	public static $connection;
	
	/**
	 * 获取数据库连接对象
	 */
	public static function get_db_connection(){
		$mysqli =new mysqli("localhost", "root", "123", "test"); //实例化对象
		/* check connection */
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
		db_model::$connection = $mysqli;
	}
	
	/**
	 * 初始化数据连接
	 */
	public static function db_init(){
		if(!db_model::$connection){
			db_model::$connection = db_model::get_db_connection();
		}
	}
	
	
	public static function db_close(){
		db_model::$connection->close();
	}
	
	public $table_name;
	public $tb_prefiex;
	public $primary_key;
	public $default_order_by;
	
	public function __construct(){
		
	}
	
	public function __destruct(){
		self::db_close();
	}
	
}