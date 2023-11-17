<script type="text/javascript">
    google.charts.load("current", {
        packages: ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Loại', 'Số Lượng', {
                role: 'style'
            }],
            <?php
            $items = thong_ke_hang_hoa();

            foreach ($items as $item) {
                echo "['$item[ten_loai]',$item[so_luong],'#b87333'],";
            }
            ?>
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            {
                calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"
            },
            2
        ]);

        var options = {
            title: "BIỂU ĐỒ THỐNG KÊ LOẠI HÀNG (theo số lượng)",
            width: 1176,
            height: 500,
            bar: {
                groupWidth: "25%"
            },
            legend: {
                position: "none"
            },
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(view, options);
    }
</script>

<?php include "./dao/navbar.php" ?>

<div id="wrapper">
    <div id="page-wrapper">
        <div class="header">
            <div class="page-header">
                <h1>QUẢN TRỊ WEBSITE</h1>
                <p>Dưới đây là những số liệu thống kê hàng hóa của FengShop hiện tại có trong kho: </p>

                <!-- /. CONTENT  -->
                <div id="columnchart_values" style="width: 100%; height: 300px;"></div><br><br><br><br><br><br><br><br><br><br>

                <p>Số liệu thống kê cụ thể như sau: </p>
                <table class="table table-bordered" style="background-color:#fff">
                    <thead>
                        <tr>
                            <th>LOẠI HÀNG</th>
                            <th>SỐ LƯỢNG HIỆN CÓ</th>
                            <th>GIÁ CAO NHẤT</th>
                            <th>GIÁ THẤP NHẤT</th>
                            <th>TỔNG GIÁ TRỊ HIỆN CÓ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item) {
                            extract($item);
                        ?>
                            <tr>
                                <td><?= $ten_loai ?></td>
                                <td><?= $so_luong ?></td>
                                <td><?= number_format($gia_max) ?> <sup>đ</sup></td>
                                <td><?= number_format($gia_min) ?> <sup>đ</sup></td>
                                <td><?= number_format($gia_sum) ?> <sup>đ</sup></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>