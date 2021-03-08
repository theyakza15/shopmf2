<?php
include("sidebar.php");
?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-lg-6">
            <div class="col-sm-12 mt-3">
                <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">สินค้าคงเหลือ</h6>
                        
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                        <div class=" pt-4 pb-2">
                        <canvas id="myChart" width="400px" height="400px"></canvas>
                        </div>
                        </div>
                </div>
            </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">อันดับสินค้าขายดี <span class="fa fa-sort-up text-success"></span></h6>

                            </div>
                            <div class="card-body">
    <table class="table" border="0" width="50%">
    <thead>
        <tr>
          <th width="5%">
            <center>ชื่อสินค้า</center>
          </th>
          <th width="5%">
            <center>ไซส์</center>
          </th>
          <th width="5%">
            <center>จำนวนที่ขายได้</center>
          </th>
         

        </tr>
      </thead>
      <tbody>
        <?php
        $sql_pay = "SELECT  pay_pd_id,SUM(pay_total) AS pay_total,SUM(amount_pay)AS amount_pay,status_pay_det
        ,tb_size.si_name AS si_name
        ,tb_product.pd_name AS pd_name
        ,tb_color.co_name AS co_name
        FROM paymant_detail
        INNER JOIN tb_color_detail ON tb_color_detail.id_color_det =paymant_detail.pay_pd_id
        INNER JOIN tb_color ON tb_color.co_id = tb_color_detail.id_color
        INNER JOIN tb_produnt_detail ON tb_produnt_detail.id_pd_det =tb_color_detail.pd_id
        INNER JOIN tb_size ON tb_size.si_id =tb_produnt_detail.det_size
        INNER JOIN tb_product ON tb_product.pd_id =tb_produnt_detail.pd_id
        
        GROUP BY det_size
        ORDER BY SUM(amount_pay) DESC
        LIMIT 5";

        $result = mysqli_query($conn, $sql_pay);
        if ($result->num_rows > 0) {
          $i = 0;
          while ($row = $result->fetch_assoc()) {
            $top_name = $row['pd_name'];
            $top_si = $row['si_name'];
            $top_to = $row['pay_total'];
            $top_am = $row['amount_pay'];

            $i++;



        ?>
            <tr>

              
              <td class="text-center border-bottom">
                <?php echo $top_name; ?>
              </td>
              <td class="text-center border-bottom">
                <?php echo $top_si; ?>
              </td>
              <td class="text-center border-bottom">
                <?php echo $top_am; ?>
              </td>
              

            </tr>

      </tbody>
  <?php
          }
        }

  ?>

    </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 mt-2">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary"><span class="fa fa-plus text-success"></span> สินค้าที่ต้องรับเพิ่ม</h6>

                            </div>
                            <div class="card-body">
        <table class="table" border="0" width="100%">
        <thead>
        <tr>
          <th width="1%">
            <center>ประเภท</center>
          </th>
          <th width="10%">
            <center>กลุ่มสินค้า</center>
          </th>
          <th width="5%">
            <center>ชื่อสินค้า</center>
          </th>
          <th width="5%">
            <center>ไซส์</center>
          </th>
          <th width="5%">
            <center>สี</center>
          </th>
          <th width="5%">
            <center>จำนวน</center>
          </th>


        </tr>
      </thead>
      <tbody>
        <?php
      $sql_emp_re = "SELECT tb_product.pd_id AS pd_id,pd_name,pd_group,tb_product.status AS status
      ,tb_produnt_detail.price AS price
      ,tb_size.si_name AS si_name
      ,tb_color.co_name AS co_name
      ,tb_color_detail.amount AS amount
      ,tb_group.gr_name AS gr_name
      ,tb_type.ty_name AS ty_name
      FROM tb_product 
      INNER JOIN tb_group ON tb_group.gr_id = tb_product.pd_group
      INNER JOIN tb_type ON tb_type.ty_id =tb_group.ty_id
      INNER JOIN tb_produnt_detail ON tb_produnt_detail.pd_id=tb_product.pd_id
      INNER JOIN tb_size ON tb_size.si_id =tb_produnt_detail.det_size
      INNER JOIN tb_color_detail ON tb_color_detail.pd_id =tb_produnt_detail.id_pd_det
      INNER JOIN tb_color ON tb_color.co_id =tb_color_detail.id_color
      WHERE tb_color_detail.amount <= '50'  
      ORDER BY amount ASC";

        $result = mysqli_query($conn, $sql_emp_re);
        if ($result->num_rows > 0) {
          $i = 0;
          while ($row = $result->fetch_assoc()) {
            $proid = $row['pd_id'];
            $ty_name = $row['ty_name'];
            $proname = $row['pd_name'];
            $grname = $row['gr_name'];
            $siname = $row['si_name'];
            $coname = $row['co_name'];
            $am_ount = $row['amount'];
            $price_pro = $row['price'];

            $i++;



        ?>
            <tr>

              <td class="text-center border-bottom">
                <?php echo $ty_name; ?>
              </td>
              <td class="text-center border-bottom">
                <?php echo $grname; ?>
              </td>
              <td class="text-center border-bottom">
                <?php echo $proname; ?>
              </td>
              <td class="text-center border-bottom">
                <?php echo $siname; ?>
              </td>
              <td class="text-center border-bottom">
                <?php echo $coname; ?>
              </td>
              <td class="text-center border-bottom">
                <?php echo $am_ount; ?>
              </td>
            </tr>

      </tbody>
  <?php
          }
        }


  ?>
    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var obj = []
  $.ajax({
    url: "get_data.php",
    method: "POST",
    async: false,
    data:{

    },
    success: function (data) {
      console.log(data)
      obj = JSON.parse(data);
      console.log(obj)
      new_chart(obj)
    }
  });
  function new_chart(obj) {
    let pd_name = [];
    let amount = [];

    try {
      obj.map((item) => {
        pd_name.push(item.pd_name);
        amount.push(item.am);
      });
      console.log(pd_name)
      console.log(amount)
      var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: [...pd_name],
          datasets: [{
            label: 'Regions',
            data: [...amount],
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)',
            ],
            borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)',
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)',
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)',
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)',
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)',
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)',
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)',
            ],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });

    } catch (error) {
      console.log(error);
    }
  }
/* let data = [{
    "REGION": "Poland",
    "REV_VALUE": "2263"
  }, {
    "REGION": "United States",
    "REV_VALUE": "1961"
  }, {
    "REGION": "Spain",
    "REV_VALUE": "555"
  }, {
    "REGION": "United Kingdom",
    "REV_VALUE": "380"
  }, {
    "REGION": "Germany",
    "REV_VALUE": "314"
  }]; */


</script>