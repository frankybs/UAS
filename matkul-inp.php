<?php
    include 'db.php';
    include 'check.php';
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <?php
        include 'navbar.php';
        ?>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <?php
                include 'header.php';
            ?>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Admin Menu</a></li>
                            <li class="active">Mata Kuliah</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <?php
                if(isset($_GET['input'])){
                ?>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <?php
                                    if ($_GET['input'] == "i") {
                                       echo "<strong class='card-title'>Input Data Mata Kuliah</strong>";
                                       $nama = "";
                                       $id = "";
                                       $sks = "";
                                       $smt = "";
                                       $sub = "in";
                                    }
                                    elseif (($_GET['input'] == "e") and (isset($_GET['id']))) {
                                        echo "<strong class='card-title'>Edit Data Mata Kuliah</strong>";
                                        $query = "select*from matkul where idMatkul = '".$_GET['id']."'";
                                        $hasil = mysqli_query($conn, $query);
                                        $d = mysqli_fetch_array($hasil);

                                        $id = $d['idMatkul'];
                                        $nama = $d['NamaMatkul'];
                                        $sks = $d['sks'];
                                        $smt = $d['smt'];
                                        $sub = "ed";
                                    }else{
                                        $nama = "";
                                        $id = "";
                                        $sks = "";
                                        $smt = "";
                                        $sub ="";
                                    }
                                
                                ?>
                        </div>
                      <div class="col-lg-12">
                      <div class="card-body card-block">
                        <form action="matkul-prosess.php?input=<?php echo "$sub";?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                          <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="disabled-input" class=" form-control-label">ID Mata Kuliah</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="inpidnew" placeholder="ID Dosen" class="form-control"<?php if ($id != "") { echo "disabled"; } ?> value='<?php echo $id ?>'>
                                <small class="form-text text-muted">Masukkan ID Mata Kuliah</small>
                                <input type="hidden" name="inpId" value="<?php echo $id; ?>"></input>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nama Mata Kuliah</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="inpNama" placeholder="Nama" class="form-control" value='<?php echo "$nama"?>'>
                                <small class="form-text text-muted">Masukkan Nama Mata Kuliah</small></div>
                            </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">SKS Mata Kuliah</label></div>
                            <div class="col-12 col-md-9"><select name="inpsks" class="form-control">
                                <option value="1" <?php if($sks == 1){echo "selected";}?> >1</option>
                                <option value="2" <?php if($sks == 2){echo "selected";}?> >2</option>
                                <option value="3" <?php if($sks == 3){echo "selected";}?> >3</option>
                                <option value="4" <?php if($sks == 4){echo "selected";}?> >4</option>
                               </select>
                            <small class="help-block form-text">SKS Mata Kuliah</small></div>
                          </div>

                            <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Semester</label></div>
                            <div class="col-12 col-md-9">
                              <select name="inpsmt" class="form-control">

                                <option value="1" <?php if($smt == 1){echo "selected";}?> >Semester 1</option>
                                <option value="2" <?php if($smt == 2){echo "selected";}?> >Semester 2</option>
                                <option value="3" <?php if($smt == 3){echo "selected";}?> >Semester 3</option>
                                <option value="4" <?php if($smt == 4){echo "selected";}?> >Semester 4</option>
                                <option value="5" <?php if($smt == 5){echo "selected";}?> >Semester 5</option>
                                <option value="6" <?php if($smt == 6){echo "selected";}?> >Semester 6</option>
                                <option value="7" <?php if($smt == 7){echo "selected";}?> >Semester 7</option>
                                <option value="8" <?php if($smt == 8){echo "selected";}?> >Semester 8</option>
                              </select>
                              <small class="help-block form-text">Semester Mata Kuliah</small>
                            </div>
                          </div>                            </div>
                          </div>
    
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                              <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                              <i class="fa fa-ban"></i> Reset
                            </button>
                          </div>
                        </form>
                    </div>
                </div>
                <?php
                  }
                ?>

                
                            
                        </div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>


</body>
</html>
