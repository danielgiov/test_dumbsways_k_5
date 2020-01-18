<?php 

function money($amount,$separator=true,$simple=false)
{
    return
        (true===$separator?
            (false===$simple?
                number_format($amount,2,'.',','):
                str_replace('.00'.'',money($amount))
            ):
            (false===$simple?
                number_format($amount,2,',',''):
                str_replace(',00','',money($amount,false))
            )
        );	    	
}

if(isset($_POST["uang"]))
{
    $jumlh_uang = $_POST["uang"];
    $total = 0;
    $tr_body='';
    for($i = 1;$i <= $_POST["bln"]; $i++)
    {

        $val_bunga = $jumlh_uang * 0.025;
        $jumlh_uang += $val_bunga;
        $total +=$jumlh_uang;
        $tr_body .='<tr>
            <th scope="row">'.$i.'</th>
            <td>Bulan Ke '.$i.'</td>
            <td style="text-align: right;">Rp '.money($val_bunga).'</td>
            <td style="text-align: right;">Rp '.money($jumlh_uang).'</td>
        </tr>';

        
    }

    $tr_body .='<tr>
        <td colspan="3" style="text-align: center;">Jumlah</td>
        <td style="text-align: right;">Rp. '.money($total).'</td>
    </tr>';
}



echo '
<html lang="en">
  <head>
    <!-- d meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Soal 1</title>
  </head>
  <body style="padding-top: 100px;padding-right: 30px;padding-bottom: 50px;padding-left: 80px;">
     '; 
if(!isset($_POST["button"])) { 
	echo '
    <div class="container">
        <div class="row align-items-center h-100">
                <div class="card" >
                    <div class="card-body">
                        <h5 class="card-title">Program Cetak Bunga</h5>
                        <form action="" method="POST">
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Masukan Harga</span>
                            </div>
                            <input type="number" class="form-control" id="uang" name="uang"  value="3000000" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" d> 
                        </div>
                        <br>
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Masukan Jumlah Bulan</span>
                            </div>
                            <input type="number" max="12" min="1"  class="form-control" id="bln" name="bln" value="12" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" d >
                        </div>
                        <br>
                        <input type="submit" name="button" id="button" value="Submit" class="btn btn btn-success"  />
                        </form>
                    </div>
                </div>
        </div>
    </div>';
     } else {
	echo '
        <div class="container">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Uang Awal</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext"  value="Rp  '.money($_POST["uang"]).'">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Bunga</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext"  value="2.5 % per Bulan">
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col" style="text-align: center;">No</th>
                    <th scope="col" style="text-align: center;">Bulan</th>
                    <th scope="col" style="text-align: center;">Bunga</th>
                    <th scope="col" style="text-align: center;">Jumlah Uang</th>
                    </tr>
                </thead>';
                     echo $tr_body;
                echo '</tbody>
            </table>
            <br>
            <a href="1.php" class="btn btn-primary">Kembali</a>
            <button type="button" onclick="window.print();" class="btn btn-primary">Cetak</button>
        </div>';

     } 
echo '
     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>';
?>