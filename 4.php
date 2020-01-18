
<?php 

ini_set('date.timezone','Asia/Jakarta');
/*--  ini_set --*/
define("PHP_DBTYPE","mysqli"); // mysql,oci8(for oracle),mssql,postgres,sybase
define("PHP_DBHOST","localhost");
define("PHP_DBUSER","root");
define("PHP_DBPASS","");
define("PHP_DBNAME","web_pokemon");
                
$mysqli = new mysqli(PHP_DBHOST, PHP_DBUSER, PHP_DBPASS, PHP_DBNAME);



//Query Pokemon

if(isset($_POST["button_pokemon"]))
{
    $sql_inst="
        INSERT INTO pokemon_tb
        SET 
        name = '".addslashes($_POST["name_pokemon"])."',
        str = '".addslashes($_POST["str_pokemon"])."',
        def = '".addslashes($_POST["def_pokemon"])."',
        photo = '".addslashes($_POST["photo_pokemon"])."'

    ";
    $mysqli->query($sql_inst); 
    echo "<script>window.location = '4.php'</script>";
	exit;	
}

if(isset($_POST["button_pokemon_edit"]))
{
    $sql_inst="
        UPDATE pokemon_tb
        SET 
            name = '".addslashes($_POST["name_pokemon"])."',
            str = '".addslashes($_POST["str_pokemon"])."',
            def = '".addslashes($_POST["def_pokemon"])."',
            photo = '".addslashes($_POST["photo_pokemon"])."'
        WHERE 
            id = '".addslashes($_POST["id_pokemon"])."'
    ";
    $mysqli->query($sql_inst); 
    echo "<script>window.location = '4.php'</script>";
	exit;	
}

if(isset($_GET["id_pokemon"]))
{
    $sql_del="
        DELETE FROM pokemon_tb WHERE id = ".$_GET["id_pokemon"]."

    ";
    $mysqli->query($sql_del); 
    echo "<script>window.location = '4.php'</script>";
	exit;	
}

//Query Element

if(isset($_POST["button_element"]))
{
    $sql_inst="
        INSERT INTO element_tb
        SET 
        name = '".addslashes($_POST["name_element"])."'

    ";
    $mysqli->query($sql_inst); 
    echo "<script>window.location = '4.php'</script>";
	exit;	
}

if(isset($_POST["button_element_edit"]))
{
    $sql_inst="
        UPDATE element_tb
        SET 
            name = '".addslashes($_POST["name_element"])."'
        WHERE 
            id = '".addslashes($_POST["id_element"])."'
    ";
    $mysqli->query($sql_inst); 
    echo "<script>window.location = '4.php'</script>";
	exit;	
}


if(isset($_GET["id_element"]))
{
    $sql_del="
        DELETE FROM element_tb WHERE id = ".$_GET["id_element"]."

    ";
    $mysqli->query($sql_del); 
    echo "<script>window.location = '4.php'</script>";
	exit;	
}

// Get data 
$tr_body_pokemon='';
$sql_pokemon = 
"
    SELECT 
        * 
    FROM 
        pokemon_tb
";
//echo '<code>'.$sql_page.'</code><br><br>';
$rslt_pokemon = $mysqli->query($sql_pokemon); 
$i = 0;
while($row_pokemon = $rslt_pokemon->fetch_assoc())
{
    $i++;
    $tr_body_pokemon .='<tr>
                            <th scope="row">'.$i.'</th>
                            <td style="text-align: center;">'.$row_pokemon["name"].'</td>
                            <td style="text-align: center;">'.$row_pokemon["str"].'</td>
                            <td style="text-align: center;">'.$row_pokemon["def"].'</td>
                            <td style="text-align: center;">'.$row_pokemon["photo"].'</td>
                            <td style="text-align: center;"><a class="btn btn btn-primary" href="4.php?edit=p&id='.$row_pokemon["id"].'">Edit</a>&nbsp;<a class="btn btn btn-primary" href="4.php?id_pokemon='.$row_pokemon["id"].'">Delete</a></td>
                        </tr>';
}

$tr_body_element='';
$sql_element = 
"
    SELECT 
        * 
    FROM 
        element_tb
";
//echo '<code>'.$sql_page.'</code><br><br>';
$rslt_element = $mysqli->query($sql_element); 
$i = 0;
while($row_element = $rslt_element->fetch_assoc())
{
    $i++;
    $tr_body_element .='<tr>
                            <th scope="row">'.$i.'</th>
                            <td style="text-align: center;">'.$row_element["name"].'</td>
                            <td style="text-align: center;"><a class="btn btn btn-primary" href="4.php?edit=e&id='.$row_element["id"].'">Edit</a>&nbsp;<a class="btn btn btn-primary" href="4.php?id_element='.$row_element["id"].'">Delete</a></td>
                        </tr>';
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Soal 4</title>
  </head>
  <body style="padding-top: 100px;padding-right: 30px;padding-bottom: 50px;padding-left: 80px;">
    
    <?php if(!isset($_GET["edit"])) { ?>
    <div class="container">
        <div class="row align-items-center h-100">
                <div class="card" >
                    <div class="card-body">
                        <h5 class="card-title">Data Pokemon</h5>
                        <form action="" method="POST">
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Nama</span>
                            </div>
                            <input type="text" class="form-control" id="name_pokemon" name="name_pokemon"  value="" aria-describedby="inputGroup-sizing-lg" required> 
                        </div>
                        <br>
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">str</span>
                            </div>
                            <input type="text" class="form-control" id="str_pokemon" name="str_pokemon"  value="" aria-describedby="inputGroup-sizing-lg" > 
                        </div>
                        <br>
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">def</span>
                            </div>
                            <input type="text" class="form-control" id="def_pokemon" name="def_pokemon"  value="" aria-describedby="inputGroup-sizing-lg" > 
                        </div>
                        <br>
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">photo</span>
                            </div>
                            <input type="text" class="form-control" id="photo_pokemon" name="photo_pokemon"  value="" aria-describedby="inputGroup-sizing-lg" > 
                        </div>
                        <br>
                        
                        <input type="submit" name="button_pokemon" id="button_pokemon" value="Add" class="btn btn btn-success"  />
                        </form>
                    </div>
                </div>
        </div>
    </div>
    <div class="container">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Pokemon Table</label>
        
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col" style="text-align: left;">No</th>
                <th scope="col" style="text-align: center;">Nama</th>
                <th scope="col" style="text-align: center;">str</th>
                <th scope="col" style="text-align: center;">def</th>
                <th scope="col" style="text-align: center;">photo</th>
                <th scope="col" style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $tr_body_pokemon;?>
            </tbody>
        </table>
    </div>

    <br>

    <div class="container">
        <div class="row align-items-center h-100">
                <div class="card" >
                    <div class="card-body">
                        <h5 class="card-title">Data Element</h5>
                        <form action="" method="POST">
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Nama</span>
                            </div>
                            <input type="text" class="form-control" id="name_element" name="name_element"  value="" aria-describedby="inputGroup-sizing-lg" required> 
                        </div>
                        <br>
                       
                        <input type="submit" name="button_element" id="button_element" value="Add" class="btn btn btn-success"  />
                        </form>
                    </div>
                </div>
        </div>
    </div>
    <div class="container">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Element Table</label>
        
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col" style="text-align: left;">No</th>
                <th scope="col" style="text-align: center;">Nama</th>
                <th scope="col" style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $tr_body_element;?>
            </tbody>
        </table>
    </div>
    <?php } else {
        if($_GET["edit"] == 'p')
        {

            $sql_pokemon = 
            "
                SELECT 
                    * 
                FROM 
                    pokemon_tb
                WHERE 
                    id = '".$_GET["id"]."'
            ";
            $rslt_pokemon = $mysqli->query($sql_pokemon); 
            $row_pokemon = $rslt_pokemon->fetch_assoc();

            ?>
            <div class="container">
                <div class="row align-items-center h-100">
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title">Edit data Pokemon</h5>
                                <form action="" method="POST">
                                <div class="input-group input-group-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-lg">Nama</span>
                                    </div>
                                    <input type="hidden" class="form-control" id="id_pokemon" name="id_pokemon"  value="<?php echo $_GET["id"]?>" aria-describedby="inputGroup-sizing-lg" required> 
                                    <input type="text" class="form-control" id="name_pokemon" name="name_pokemon" value="<?php echo $row_pokemon["name"]?>" aria-describedby="inputGroup-sizing-lg" required> 
                                </div>
                                <br>
                                <div class="input-group input-group-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-lg">str</span>
                                    </div>
                                    <input type="text" class="form-control" id="str_pokemon" name="str_pokemon"  value="<?php echo $row_pokemon["str"]?>" aria-describedby="inputGroup-sizing-lg" > 
                                </div>
                                <br>
                                <div class="input-group input-group-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-lg">def</span>
                                    </div>
                                    <input type="text" class="form-control" id="def_pokemon" name="def_pokemon"   value="<?php echo $row_pokemon["def"]?>" aria-describedby="inputGroup-sizing-lg" > 
                                </div>
                                <br>
                                <div class="input-group input-group-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-lg">photo</span>
                                    </div>
                                    <input type="text" class="form-control" id="photo_pokemon" name="photo_pokemon" value="<?php echo $row_pokemon["photo"]?>"  aria-describedby="inputGroup-sizing-lg" > 
                                </div>
                                <br>
                                
                                <input type="submit" name="button_pokemon_edit" id="button_pokemon_edit" value="Edit" class="btn btn btn-success"  />
                                </form>
                            </div>
                        </div>
                </div>
            </div>
            <?php
        }
        else
        {   
            $sql_element = 
            "
                SELECT 
                    * 
                FROM 
                    element_tb
                WHERE 
                    id = '".$_GET["id"]."'
            ";
            $rslt_element = $mysqli->query($sql_element); 
            $row_element = $rslt_element->fetch_assoc();
            ?>
            <div class="container">
                <div class="row align-items-center h-100">
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title">Data Element</h5>
                                <form action="" method="POST">
                                <div class="input-group input-group-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-lg">Nama</span>
                                    </div>
                                    <input type="hidden" class="form-control" id="id_element" name="id_element"  value="<?php echo $_GET["id"]?>" aria-describedby="inputGroup-sizing-lg" required> 
                                    <input type="text" class="form-control" id="name_element" name="name_element"  value="<?php echo $row_element["name"]?>" aria-describedby="inputGroup-sizing-lg" required> 
                                </div>
                                <br>
                            
                                <input type="submit" name="button_element_edit" id="button_element_edit" value="Edit" class="btn btn btn-success"  />
                                </form>
                            </div>
                        </div>
                </div>
            </div>
            <?php 
        }
    }?>

    <br>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>