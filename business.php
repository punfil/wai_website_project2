<?php
	use MongoDB\BSON\ObjectID;

	//DATABASE FUNCTIONS
	function get_database(){
	$mongo = new MongoDB\Client(
		"mongodb://localhost/wai",
		[
			'username' => 'wai_web',
			'password' => 'w@i_w3b',
		]
	);
	/* FOR TESTING PURPOSES 
	$mongo->wai->zdjecia->drop([]);
	$mongo->wai->users->drop([]);
	 */
	return $mongo->wai;
	}

	function InsertItemToDatabase($item, $where){
		$db = get_database();
		try{
			$db->$where->insertOne($item);
		}
		catch(Exception $e)
		{
			return ERROR;
		}
		return "1";
	}

	function GetFromDatabase($what, $where, $index){
		$db = get_database();
		try{
			$return_object = $db->$where->findOne([$index => $what]);
		}
		catch (Exception $e){
			return ERROR;
		}
		return $return_object;
	}
	
	function GetSimplePhotos($what, $index, $privacy){
		$db = get_database();
		try{
			$return_object = $db->$what->find([$index => $privacy]);
		}
		catch (Exception $e){
			return ERROR;
		}
		return $return_object;
	}

	function GetSimplePhotosWithOptions($what, $index, $privacy, $opts){
		$db = get_database();
		try{
			$return_object = $db->$what->find([$index => $privacy], $opts);
		}
		catch (Exception $e){
			return ERROR;
		}
		return $return_object;	
	}

	function GetAdvancedPhotos($where, $index1, $clue1, $index2, $clue2){
		$database = get_database();
		try{
			$return_object = $database->$where->find(['$or' => [[$index1 => $clue1], [$index2 => $clue2]]]);
		}
		catch (Exception $e){
			return ERROR;
		}
		return $return_object;
	}

	function GetAdvancedPhotosWithOptions($where, $index1, $clue1, $index2, $clue2, $opts){
		$database = get_database();
		try{
			$return_object = $database->$where->find(['$or' => [[$index1 => $clue1], [$index2 => $clue2]]], $opts);
		}
		catch (Exception $e){
			return ERROR;
		}
		return $return_object;
	}

	function GetUltraAdvancedPhotos($where, $index1, $clue1, $index2, $clue2, $index3, $clue3){
		$database = get_database();
		try{
		$return_object = $database->$where->find(['$and' => [['$or' => [[$index1 => $clue1], [$index2 => $clue2]]], [$index3 => $clue3]]]);
		}
		catch (Exception $e){
			return ERROR;
		}
		return $return_object;
	}

	function GetAndAdvancedPhotos($where, $index1, $clue1, $index2, $clue2){
		$database = get_database();
		try{
			$return_object = $database->$where->find(['$and' => [[$index1 => $clue1], [$index2 => $clue2]]]);
		}
		catch (Exception $e){
			return ERROR;
		}
		return $return_object;
	}
?>