<?php

class LocationModel extends BaseModel
{
    public static $tableName = 't_koatuu_tree';
    

    public function findRegion() {
        $sql = "SELECT ter_id, ter_name  FROM " . self::$tableName . " WHERE ter_type_id = 0 ORDER BY ter_name";
        $result = $this->pdo->query($sql);
        $regions = $result->fetchAll();
        if (!empty($regions)) {
            return $regions;
        } else {
            return FALSE;
        }
    }

    public function findNextRegion($id) {
    	$sql = "SELECT ter_type_id  FROM " . self::$tableName . " WHERE ter_id = :id ORDER BY ter_name";
    	$arr = array('id' => $id);
        $res = $this->pdo->prepare($sql);
        $res->execute($arr);
        $result = $res->fetch();
        if ($result['ter_type_id'] == 0) {
        	$sql = "SELECT ter_id, ter_name  FROM " . self::$tableName . " WHERE ter_pid = :id ORDER BY ter_name";
        	$list = "<label for=".$id.">Next Area </label>";
        } elseif ($result['ter_type_id'] == 1) {
        	$list = "<label for=".$id.">Next Area </label>";
        	$sql = "SELECT ter_id, ter_name  FROM " . self::$tableName . " WHERE ter_pid = :id and ter_type_id =3 ORDER BY ter_name";
        } else {
        	$list = "<label for=".$id.">Next Area </label>";
        	$sql = "SELECT ter_id, ter_name  FROM " . self::$tableName . " WHERE ter_pid = :id ORDER BY ter_name";
        }
    	$arr = array('id' => $id);
        $res = $this->pdo->prepare($sql);
        $res->execute($arr);
        $result = $res->fetchAll();
        if (!empty($result)) {
        	$list .= "<select name=" . $id . " id=" . $id . " class='chosen'>";
            $list .= "<option value='0' selected>select next area</option>";
            foreach ($result as $region) {
                $list .= "<option value=" . $region['ter_id'] . ">" . $region['ter_name'] . "</option>";
            }
            $list .= "</select>";
            $result = [
                'list' => $list
            ];
            return $result;
        } else {
            return FALSE;
        }
   	}

   	public function findById($id) {
   		$sql = "SELECT ter_address  FROM " . self::$tableName . " WHERE ter_id = :id";
    	$arr = array('id' => $id);
        $res = $this->pdo->prepare($sql);
        $res->execute($arr);
        $result = $res->fetch();
        return $result['ter_address'];
   	}
}
