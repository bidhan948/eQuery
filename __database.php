<?php
class database{
    private $host;
    private $user;
    private $password;
    private $db_name;
    
    protected function connection()
    {
        $this->host = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->db_name = 'crud';

        $conn = new mysqli($this->host, $this->username, $this->password,$this->db_name);

        return $conn;
    }
}

class query extends database{
    public function getData($field='*', $table='', $conditionArr='', $likeColumn='', $likeWord='' ,$orderByField='', $orderBy_Type='desc',$limit='')
    {
        $sql = "SELECT $field FROM $table";

        if ($conditionArr !=0) {
            if(count($conditionArr) > 0){
                $sql .=" WHERE";
                $i = 1;
                foreach ($conditionArr as $key => $value) {
                    if($i == count($conditionArr) ){
                        $sql .= " $key = '$value' ";
                    }else{
                        $sql .= " $key = '$value' AND ";
                    }
                    $i++;
                }
            }
        }

        if ($likeWord != '' && $likeColumn != '') {
            $sql .=" WHERE $likeColumn LIKE '%$likeWord%' ";
        }
        if($orderByField !=''){
            $sql .= " order by $orderByField $orderBy_Type";
        }

        if($limit !=''){
            $sql .= " LIMIT $limit";
        }

        $result = $this->connection()->query($sql);
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                $data[] = $row;  
            }
            return $data;
        }else{
            return 0;
        }
    }
    public function insertData($table , $conditionArr)
    {
      $sql = "INSERT INTO $table";
      
      if(count($conditionArr) > 0){
        foreach ($conditionArr as $key => $value) {
            $fieldArr[] = $key;
            $valueArr[] = $value;
        }
        $field = implode(",",$fieldArr);
        $values = implode("','",$valueArr);
        
        $sql .="($field) VALUES('$values')";

        echo $sql;
        $result = $this->connection()->query($sql);
        return $result;
    }
    }

    public function editData($table='',$setArr='',$conditionArr='') 
    {
        $sql ="UPDATE $table SET";

        $j = 1;
        foreach ($setArr as $key => $value) {
            if($j == count($setArr)){
                $sql .=" $key = '$value' ";                
            }else{
                $sql .=" $key = '$value', ";
            }
            $j++;
        }

        $i = 1;
        foreach ($conditionArr as $key => $value) {
            if($i == count($conditionArr) ){
                $sql .= " $key = '$value' ";
            }else{
                $sql .= "  WHERE $key = '$value' AND ";
            }
            $i++;
        }

        $result = $this->connection()->query($sql);
    }

    public function deleteData($table='',$conditionArr='')
    {
        $sql =" DELETE FROM $table WHERE ";
        $i =1;
        foreach ($conditionArr as $key => $value) {
            if($i == count($conditionArr) ){
                $sql .= " $key = '$value' ";
            }else{
                $sql .= "  WHERE $key = '$value' AND ";
            }
            $i++;
        }
        $result = $this->connection()->query($sql);
    }

}