<?php
class MemSession{
	static $mem;
	static $maxtime;
	static function start(Memcache $mem){
		self::$maxtime=ini_get("session.gc_maxlifetime");
		self::$mem=$mem;
		session_set_save_handler(
			array(__CLASS__,"open"), 
			array(__CLASS__,"close"), 
			array(__CLASS__,"read"), 
			array(__CLASS__,"write"), 
			array(__CLASS__,"destroy"), 
			array(__CLASS__,"gc") 
		);
		session_start();	
	}

	static function open($save_path){
	
		return true;
	}

	static function close(){
		return true;
	}

	static function read($sid){
	
		return self::$mem->get($sid);
	}

	static function write($sid, $data){
	
		self::$mem->set($sid, $data, MEMCACHE_COMPRESSED, self::$maxtime);
	}

	static function destroy($sid){

		self::$mem->delete($sid, 0);

	}
	
	static function gc($maxtime){
		return true;

	}

}


// $mem=new Memcache();

// $mem->addServer("localhost",11211);
// $mem->addServer("192.168.140.51", 11211);
// $mem->addServer("192.168.140.43", 11211);
// $mem->addServer("192.168.140.34", 11211);

// MemSession::start($mem);

