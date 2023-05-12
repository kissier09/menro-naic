<?php

include("connection.php");
$garbagetype = "SELECT * FROM tbl_garbage_type";
$garbagerun = mysqli_query($con, $garbagetype);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Waste-Management-System</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="asset/css/adminlte.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css"
        intergrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style type="text/css">
        table tr td {
            padding: 0.3rem !important;
        }

        table tr td p {
            margin-top: -0.8rem !important;
            margin-bottom: -0.8rem !important;
            font-size: 0.9rem;
        }

        td a.btn {
            font-size: 0.7rem;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-info">
                        <br>
                        <div class="col-md-12">
                            <table class="table table-bordered mytable">
                                <thead>
                                    <th><strong>Garbage Type</strong></th>
                                    <th>January</th>
                                    <th>February</th>
                                    <th>March</th>
                                    <th>April</th>
                                    <th>May</th>
                                    <th>June</th>
                                    <th>July</th>
                                    <th>August</th>
                                    <th>September</th>
                                    <th>October</th>
                                    <th>November</th>
                                    <th>December</th>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($garbagerun) {
                                        while ($garbagename = mysqli_fetch_array($garbagerun)) {
                                            $name = $garbagename['type_id'];
                                            $january = 0;
                                            $february = 0;
                                            $march = 0;
                                            $april = 0;
                                            $may = 0;
                                            $june = 0;
                                            $july = 0;
                                            $august = 0;
                                            $september = 0;
                                            $october = 0;
                                            $november = 0;
                                            $december = 0;
                                            ?>
                                            <tr>
                                                <td><strong>
                                                        <?php echo $garbagename['name'] ?>
                                                    </strong></td>
                                                <?php
                                                $january1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '2023-01%'";
                                                $jan01 = mysqli_query($con, $january1);
                                                while ($jan1 = mysqli_fetch_array($jan01)) {
                                                    if ($jan1 === null) {

                                                    }
                                                    $january += $jan1['quantity'];


                                                }
                                                ?>

                                                <?php
                                                $february1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '2023-02%'";
                                                $feb01 = mysqli_query($con, $february1);
                                                while ($feb1 = mysqli_fetch_array($feb01)) {
                                                    if ($feb1 === null) {

                                                    }
                                                    $february += $feb1['quantity'];


                                                }
                                                ?>
                                                <?php
                                                $march1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '2023-03%'";
                                                $mar01 = mysqli_query($con, $march1);
                                                while ($mar1 = mysqli_fetch_array($mar01)) {
                                                    if ($mar1 === null) {

                                                    }
                                                    $march += $mar1['quantity'];


                                                }
                                                ?>
                                                <?php
                                                $april1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '2023-04%'";
                                                $apr01 = mysqli_query($con, $april1);
                                                while ($apr1 = mysqli_fetch_array($apr01)) {
                                                    if ($apr1 === null) {

                                                    }
                                                    $april += $apr1['quantity'];


                                                }
                                                ?>
                                                <?php
                                                $may1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '2023-05%'";
                                                $may01 = mysqli_query($con, $may1);
                                                while ($mayy = mysqli_fetch_array($may01)) {
                                                    if ($mayy === null) {

                                                    }
                                                    $may += $mayy['quantity'];


                                                }
                                                ?>
                                                <?php
                                                $june1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '2023-06%'";
                                                $jun01 = mysqli_query($con, $june1);
                                                while ($jun1 = mysqli_fetch_array($jun01)) {
                                                    if ($jun1 === null) {

                                                    }
                                                    $june += $jun1['quantity'];


                                                }
                                                ?>
                                                <?php
                                                $july1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '2023-07%'";
                                                $jul01 = mysqli_query($con, $july1);
                                                while ($jul1 = mysqli_fetch_array($jul01)) {
                                                    if ($jul1 === null) {

                                                    }
                                                    $july += $jul1['quantity'];


                                                }
                                                ?>
                                                <?php
                                                $august1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '2023-08%'";
                                                $aug01 = mysqli_query($con, $august1);
                                                while ($aug1 = mysqli_fetch_array($aug01)) {
                                                    if ($aug1 === null) {

                                                    }
                                                    $augutst += $aug1['quantity'];


                                                }
                                                ?>
                                                <?php
                                                $september1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '2023-09%'";
                                                $sept01 = mysqli_query($con, $september1);
                                                while ($sept1 = mysqli_fetch_array($sept01)) {
                                                    if ($sept1 === null) {

                                                    }
                                                    $september += $sept1['quantity'];


                                                }
                                                ?>
                                                <?php
                                                $october1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '2023-010%'";
                                                $oct01 = mysqli_query($con, $october1);
                                                while ($oct1 = mysqli_fetch_array($oct01)) {
                                                    if ($oct1 === null) {

                                                    }
                                                    $october += $oct1['quantity'];


                                                }
                                                ?>
                                                <?php
                                                $november1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '2023-11%'";
                                                $nov01 = mysqli_query($con, $november1);
                                                while ($nov1 = mysqli_fetch_array($nov01)) {
                                                    if ($nov1 === null) {

                                                    }
                                                    $november += $nov1['quantity'];


                                                }
                                                ?>
                                                <?php
                                                $december1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '2023-12%'";
                                                $dec01 = mysqli_query($con, $december1);
                                                while ($dec1 = mysqli_fetch_array($dec01)) {
                                                    if ($dec1 === null) {

                                                    }
                                                    $december += $dec1['quantity'];


                                                }
                                                ?>

                                                <td>
                                                    <?php echo $january ?>
                                                </td>
                                                <td>
                                                    <?php echo $february ?>
                                                </td>
                                                <td>
                                                    <?php echo $march ?>
                                                </td>
                                                <td>
                                                    <?php echo $april ?>
                                                </td>
                                                <td>
                                                    <?php echo $may ?>
                                                </td>
                                                <td>
                                                    <?php echo $june ?>
                                                </td>
                                                <td>
                                                    <?php echo $july ?>
                                                </td>
                                                <td>
                                                    <?php echo $august ?>
                                                </td>
                                                <td>
                                                    <?php echo $september ?>
                                                </td>
                                                <td>
                                                    <?php echo $october ?>
                                                </td>
                                                <td>
                                                    <?php echo $november ?>
                                                </td>
                                                <td>
                                                    <?php echo $december ?>
                                                </td>

                                                <?php
                                                ?>

                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12">
                            <canvas id="bargraph"></canvas>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="asset/jquery/jquery.min.js"></script>
    <script src="asset/js/bootstrap.bundle.min.js"></script>
    <script src="asset/js/adminlte.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="asset/tables/datatables/jquery.dataTables.min.js"></script>
    <script src="asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="asset/tables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

    <script src="asset/js/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            <?php if ($garbagerun) {
                while ($garbagename = mysqli_fetch_array($garbagerun)) {
                    $name = $garbagename['type_id'];
                    $january = 0;
                    $february = 0;
                    $march = 0;
                    $april = 0;
                    $may = 0;
                    $june = 0;
                    $july = 0;
                    $august = 0;
                    $september = 0;
                    $october = 0;
                    $november = 0;
                    $december = 0;
                    ?>
                    <?php
                    $january1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '2023-01%'";
                    $jan01 = mysqli_query($con, $january1);
                    while ($jan1 = mysqli_fetch_array($jan01)) {
                        if ($jan1 === null) {

                        }
                        $january += $jan1['quantity'];


                    }
                    ?>

                    <?php
                    $february1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '2023-02%'";
                    $feb01 = mysqli_query($con, $february1);
                    while ($feb1 = mysqli_fetch_array($feb01)) {
                        if ($feb1 === null) {

                        }
                        $february += $feb1['quantity'];


                    }
                    ?>
                    <?php
                    $march1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '2023-03%'";
                    $mar01 = mysqli_query($con, $march1);
                    while ($mar1 = mysqli_fetch_array($mar01)) {
                        if ($mar1 === null) {

                        }
                        $march += $mar1['quantity'];


                    }
                    ?>
                    <?php
                    $april1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '2023-04%'";
                    $apr01 = mysqli_query($con, $april1);
                    while ($apr1 = mysqli_fetch_array($apr01)) {
                        if ($apr1 === null) {

                        }
                        $april += $apr1['quantity'];


                    }
                    ?>
                    <?php
                    $may1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '2023-05%'";
                    $may01 = mysqli_query($con, $may1);
                    while ($mayy = mysqli_fetch_array($may01)) {
                        if ($mayy === null) {

                        }
                        $may += $mayy['quantity'];


                    }
                    ?>
                    <?php
                    $june1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '2023-06%'";
                    $jun01 = mysqli_query($con, $june1);
                    while ($jun1 = mysqli_fetch_array($jun01)) {
                        if ($jun1 === null) {

                        }
                        $june += $jun1['quantity'];


                    }
                    ?>
                    <?php
                    $july1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '2023-07%'";
                    $jul01 = mysqli_query($con, $july1);
                    while ($jul1 = mysqli_fetch_array($jul01)) {
                        if ($jul1 === null) {

                        }
                        $july += $jul1['quantity'];


                    }
                    ?>
                    <?php
                    $august1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '2023-08%'";
                    $aug01 = mysqli_query($con, $august1);
                    while ($aug1 = mysqli_fetch_array($aug01)) {
                        if ($aug1 === null) {

                        }
                        $augutst += $aug1['quantity'];


                    }
                    ?>
                    <?php
                    $september1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '2023-09%'";
                    $sept01 = mysqli_query($con, $september1);
                    while ($sept1 = mysqli_fetch_array($sept01)) {
                        if ($sept1 === null) {

                        }
                        $september += $sept1['quantity'];


                    }
                    ?>
                    <?php
                    $october1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '2023-010%'";
                    $oct01 = mysqli_query($con, $october1);
                    while ($oct1 = mysqli_fetch_array($oct01)) {
                        if ($oct1 === null) {

                        }
                        $october += $oct1['quantity'];


                    }
                    ?>
                    <?php
                    $november1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '2023-11%'";
                    $nov01 = mysqli_query($con, $november1);
                    while ($nov1 = mysqli_fetch_array($nov01)) {
                        if ($nov1 === null) {

                        }
                        $november += $nov1['quantity'];


                    }
                    ?>
                    <?php
                    $december1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '2023-12%'";
                    $dec01 = mysqli_query($con, $december1);
                    while ($dec1 = mysqli_fetch_array($dec01)) {
                        if ($dec1 === null) {

                        }
                        $december += $dec1['quantity'];


                    }
                    ?>
                    var barChartData = {

                        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "Novermber", "December"],
                        datasets: [{

                            label: '<?php echo $garbagename['name']?>',
                            backgroundColor: 'rgb(79,129,189)',
                            borderWidth: 1,
                            data: [$january, $february, $march, $april, $may, $june, $july, $august, $september, $october, $november, $december]
                        },
                        {
                            label: 'Metals',
                            backgroundColor: 'rgb(192,80,77)',
                            borderWidth: 1,
                            data: [800, 65, 75, 85, 95, 105, 115, 125, 135, 145, 155, 165]
                        },
                        {
                            label: 'Papers',
                            backgroundColor: 'rgb(46,231,126)',
                            borderWidth: 1,
                            data: [60, 70, 80, 90, 100, 110, 120, 130, 140, 150, 160, 170]
                        }]
                    };
                <?php

                }
                ;
            }
            ;
            ?>

            var ctx = document.getElementById('bargraph').getContext('2d');
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    legend: {
                        display: true,
                    }
                }
            });

        });
    </script>
</body>

</html>