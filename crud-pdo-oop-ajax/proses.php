<?php
include 'DB.php';
session_start();
$BDobj   = new DB();
$tblName = 'item';


if (isset($_POST['login'])) {
    $user     = "admin";
    $password = "pass";
    
    if ($user ==  filter_var($_POST['username'], FILTER_SANITIZE_STRING) && $password == filter_var($_POST['password'], FILTER_SANITIZE_STRING)) {
        $_SESSION['user_access'] = 'is_loggin';
        header("location:index.php?page=dashboard");
    } else {
        echo '<script language="javascript">alert("Maaf user atau password anda salah!");history.go(-1)</script>';
    }
}

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'loadData') {
        $sql = "";
        $sql .= "SELECT * FROM item ";
        if (isset($_POST['search']['value'])) {
            
            $sql .= 'WHERE product LIKE "%' . $_POST['search']['value'] . '%" ';
            $sql .= ' OR retail_price LIKE "%' . $_POST['search']['value'] . '%" ';
            $sql .= ' OR sold_price LIKE "%' . $_POST['search']['value'] . '%" ';
            $sql .= ' OR discount LIKE "%' . $_POST['search']['value'] . '%" ';
            $sql .= ' OR note LIKE "%' . $_POST['search']['value'] . '%" ';
            
        }
        if (isset($_POST['order'])) {
            $sql .= ' ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $sql .= ' ORDER BY id_product DESC ';
        }
        
        if ($_POST['length'] != -1) {
            $sql .= 'LIMIT ' . $_POST['start'] . ',' . $_POST['length'];
        }
        $data          = $BDobj->select($sql);
        $filtered_rows = $BDobj->table_row_count($sql);
        
        $getData = array();
        $no      = 1;
        foreach ($data as $value) {
            $subArray = array();
            $image    = '';
            if ($value['image'] != '') {
                $image = '<img class="img-responsive" style="height:150px;width: 100%;" src="upload/' . $value['image'] . '">';
            } else {
                $image = '';
            }
            $subArray[] = $no;
            $subArray[] = $image;
            $subArray[] = str_replace('amp;', "",htmlspecialchars_decode($value['product'], ENT_NOQUOTES));
            $subArray[] = '<center>' . $value['retail_price'] . '</center>';
            $subArray[] = '<center>' . $value['sold_price'] . '</center>';
            $subArray[] = '<center>' . $value['discount'] . '</center>';
            $subArray[] = str_replace('amp;', "",htmlspecialchars_decode($value['note'], ENT_NOQUOTES));
            $subArray[] = '<center><button type="button" class="btn btn-success" onclick="edit_data(' . $value['id_product'] . ')">Edit</button>&nbsp;<button type="button" class="btn btn-danger" onclick="delete_data(' . $value['id_product'] . ')">Delete</button></center>';
            
            $getData[] = $subArray;
            $no++;
        }
        $query     = "SELECT * FROM item";
        $total_row = $BDobj->table_row_count($query);
        
        $result = array(
            'draw' => intval($_POST['draw']),
            'recordsTotal' => $filtered_rows,
            'recordsFiltered' => $total_row,
            'data' => $getData
            
        );
        echo json_encode($result);
        
    } elseif ($_POST['action'] == "addData") {
        $image = '';
        if ($_FILES["image"]["name"] != '') {
            $image = $BDobj->upload_image();
        }
            $note = strip_tags($_POST['note']);
            $note = str_replace('‘', "'", htmlspecialchars($note, ENT_QUOTES));
            $note = htmlspecialchars($note, ENT_QUOTES);
            $note = filter_var($note, FILTER_SANITIZE_STRING);

            $product = strip_tags($_POST['product']);
            $product = str_replace('‘', "'", $product);
            $product = htmlspecialchars($product, ENT_QUOTES);
            $product = filter_var($product, FILTER_SANITIZE_STRING);

        $dataProduct = array(
            'id_product'    => null,
            'retail_price'  => $_POST['retail_price'],
            'sold_price'    => $_POST['sold_price'],
            'discount'      => $_POST['discount'],
            'image'         => $image,
            'note'          => $note,
            'product'       => $product
        );
        $insert      = $BDobj->insert($tblName, $dataProduct);
        if ($insert) {
            echo json_encode(array(
                "status" => TRUE,
                "msg" => "Data berhasil disimpan"
            ));
        } else {
            echo json_encode(array(
                "status" => FALSE,
                "msg" => "Data gagal disimpan"
            ));
        }
        
    } elseif ($_POST['action'] == "updateData") {
        $image = '';
        if ($_FILES["image"]["name"] != '') {
            $image   = $BDobj->upload_image();

            $note = strip_tags($_POST['note']);
            $note = str_replace('‘', "'", htmlspecialchars($note, ENT_QUOTES));
            $note = htmlspecialchars($note, ENT_QUOTES);
            $note = filter_var($note, FILTER_SANITIZE_STRING);

            $product = strip_tags($_POST['product']);
            $product = str_replace('‘', "'", $product);
            $product = htmlspecialchars($product, ENT_QUOTES);
            $product = filter_var($product, FILTER_SANITIZE_STRING);

            $dataProduct = array(
                'retail_price'  => $_POST['retail_price'],
                'sold_price'    => $_POST['sold_price'],
                'discount'      => $_POST['discount'],
                'image'         => $image,
                'note'          => $note,
                'product'       => $product
            );
            
            $condition = array(
                'id_product' => $_POST['id_product']
            );
            $update    = $BDobj->update($tblName, $dataProduct, $condition);
            if ($update) {
                if ($_POST['img_disk'] == "") {
                    echo json_encode(array(
                        "status" => TRUE,
                        "msg" => "Data berhasil diupdate"
                    ));
                } else {
                    unlink("./upload/" . $_POST['img_disk']);
                    echo json_encode(array(
                        "status" => TRUE,
                        "msg" => "Data berhasil diupdate"
                    ));
                }
            } else {
                echo json_encode(array(
                    "status" => FALSE,
                    "msg" => "Data gagal diupdate"
                ));
            }
        } else {
            $note = strip_tags($_POST['note']);
            $note = str_replace('‘', "'", htmlspecialchars($note, ENT_QUOTES));
            $note = htmlspecialchars($note, ENT_QUOTES);
            $note = filter_var($note, FILTER_SANITIZE_STRING);
            

            // $product = strip_tags($_POST['product']);
            // $product = stripslashes($product);
            // $product = str_replace('amp;', "", htmlspecialchars($product, ENT_QUOTES));
            // $product = str_replace('‘', "'", htmlspecialchars($product, ENT_QUOTES));
            // $product = filter_var($product, FILTER_SANITIZE_STRING);

            $product = strip_tags($_POST['product']);
            $product = str_replace('‘', "'", $product);
            $product = htmlspecialchars($product, ENT_QUOTES);
            $product = filter_var($product, FILTER_SANITIZE_STRING);
            

            $dataProduct = array(
                'retail_price'  => $_POST['retail_price'],
                'sold_price'    => $_POST['sold_price'],
                'discount'      => $_POST['discount'],
                'note'          => $note,
                'product'       => $product
            );
            $condition   = array(
                'id_product' => $_POST['id_product']
            );
            $update      = $BDobj->update($tblName, $dataProduct, $condition);
            if ($update) {
                echo json_encode(array(
                    "status" => TRUE,
                    "msg" => "Data berhasil diupdate"
                ));
            } else {
                echo json_encode(array(
                    "status" => FALSE,
                    "msg" => "Data gagal diupdate"
                ));
            }
        }
        
        
    } elseif ($_POST['action'] == "showDataById") {
        $output    = array();
        $statement = $connection->prepare("SELECT * FROM item 
          WHERE id_product = '" . $_POST["id_product"] . "' 
          LIMIT 1");
        $statement->execute();
        $result = $statement->fetchAll();
        foreach ($result as $row) {
            $output["retail_price"] = $row["retail_price"];
            $output["sold_price"]   = $row["sold_price"];
            $output["discount"]     = $row["discount"];
            // $output["note"]         = htmlspecialchars_decode($row["note"], ENT_QUOTES);
            $output["note"]         = str_replace("amp;","",filter_var($row["note"], FILTER_SANITIZE_STRING));
            // $output["product"]      = htmlspecialchars_decode($row["product"], ENT_QUOTES);
            $output["product"]      = str_replace("amp;","",filter_var($row["product"], FILTER_SANITIZE_STRING));
            $output["image"]        = $row["image"];
        }
        echo json_encode($output);
        
    } else {
        $image = '';
        $statement = $connection->prepare("SELECT * FROM item 
          WHERE id_product = '" . $_POST["id_product"] . "'");
            $statement->execute();
            $result = $statement->fetchAll();
            foreach ($result as $row) {
                $image        = $row["image"];
            }

        $condition = array(
            'id_product' => $_POST['id_product']
        );
        $delete    = $BDobj->delete($tblName, $condition);
        if ($delete) {

            unlink("./upload/" . $image);
            echo json_encode(array(
                "status" => TRUE,
                "msg" => "Data berhasil dihapus"
            ));
        } else {
            echo json_encode(array(
                "status" => FALSE,
                "msg" => "Data gagal dihapus"
            ));
        }
    }
    
}
?>
