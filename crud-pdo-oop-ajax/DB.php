<?php
$connection = new PDO( 'mysql:host=localhost;dbname=db_ming', "root", "");

    class DB {

    public $DBconnect;
    private $hostName = "localhost";
    private $userName = "root";
    private $userPass = "";
    private $DBName   = "db_ming";

    public function __construct(){
      $this->DBConnection();
    }

    public function DBConnection(){
      try{
        $this->DBconnect = new PDO('mysql:host='.$this->hostName.';dbname='.$this->DBName,$this->userName,$this->userPass);
      }catch(PDOException $e){
        echo 'Connection Fail..'.$e->getMessage();
      }
    }

    public function select($sql){
      $stmt = $this->DBconnect->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function table_row_count($sql){
      $stmt = $this->DBconnect->prepare($sql);
      $stmt->execute();
      return $stmt->rowCount();
    }

    function upload_image() {
      if(isset($_FILES["image"])) {
          $new_name = $_FILES['image']['name'];
          $destination = './upload/' . $new_name;
          move_uploaded_file($_FILES['image']['tmp_name'], $destination);
          return $new_name;
      }
  }

    public function insert($table,$data){
        if(!empty($data) && is_array($data)){
            $columns = '';
            $values  = '';
            $columnString = implode(',', array_keys($data));
            $valueString = ":".implode(',:', array_keys($data));
            $sql = "INSERT INTO ".$table." (".$columnString.") VALUES (".$valueString.")";
            $query = $this->DBconnect->prepare($sql);
            foreach($data as $key=>$val){
                 $query->bindValue(':'.$key, $val);
            }
            $insert = $query->execute();
            return $insert?$this->DBconnect->lastInsertId():false;
        }else{
            return false;
        }
    }

    public function update($table,$data,$conditions){
        if(!empty($data) && is_array($data)){
            $colvalSet = '';
            $whereSql = '';
            $i = 0;
            foreach($data as $key=>$val){
                $pre = ($i > 0)?', ':'';
                $colvalSet .= $pre.$key."='".$val."'";
                $i++;
            }
            if(!empty($conditions)&& is_array($conditions)){
                $whereSql .= ' WHERE ';
                $i = 0;
                foreach($conditions as $key => $value){
                    $pre = ($i > 0)?' AND ':'';
                    $whereSql .= $pre.$key." = '".$value."'";
                    $i++;
                }
            }
            $sql = "UPDATE ".$table." SET ".$colvalSet.$whereSql;
            $query = $this->DBconnect->prepare($sql);
            $update = $query->execute();
            return $update?$query->rowCount():false;
        }else{
            return false;
        }
    }

    public function delete($table,$conditions){
      $whereSql = '';
        if(!empty($conditions)&& is_array($conditions)){
            $whereSql .= ' WHERE ';
            $i = 0;
            foreach($conditions as $key => $value){
                $pre = ($i > 0)?' AND ':'';
                $whereSql .= $pre.$key." = '".$value."'";
                $i++;
            }
        }
        $sql = "DELETE FROM ".$table.$whereSql;
        $delete = $this->DBconnect->exec($sql);
        return $delete?$delete:false;
    }

  }

?>