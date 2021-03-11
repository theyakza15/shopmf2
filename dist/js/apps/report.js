$(document).ready(function () {
     $("#sel_report").on("change", function () { 
        /* $(document).on('change', '#sel_report', function () { */
        var id = $(this).val();
        if(id==1){
            $('#report_product').modal('show')
        }else if(id==2){
            $('#report_add_stock').modal('show')
        } else if (id == 3) {
            $('#report_stock').modal('show')
        } else if (id == 4) {
            $('#report_payment').modal('show')
        } else if (id == 5) {
            $('#report_top').modal('show')
        }else if (id == 6){
            $('#report_emp').modal('show')
        }
        else {
            swal({
                text: "กรุณาเลือกประเภทรายงาน",
                icon: "warning",
                button: false,
            });
        }
        $("#sel_report").val(0)
    });
 
    
    //---------------------------print_top
    $("#btn_top").on("click", function () {
        $('#re_top').submit()
    });
    $("#top").on("change", function () {
        var id = $(this).val();
        /* if (id == 1) {//สินค้า
            $("#top_product").attr("readonly", false);
            $("#top_si").attr("readonly", true);
            $("#top_co").attr("readonly", true);
            $("#date_top_pro1").attr("readonly", true);
            $("#date_top_pro2").attr("readonly", true);
            $("#month_top_pro").attr("readonly", true);
            $("#month_year_top_pro").attr("readonly", true);
            $('#top_product').val("0")
            $('#top_si').val("0")
            $('#top_co').val("0")
            $('#date_top_pro1').val("0")
            $('#date_top_pro2').val("0")
            $('#month_top_pro').val("0")
            $('#month_year_top_pro').val("0")
        } else if (id == 2) {//size
            $("#top_product").attr("readonly", true);
            $("#top_si").attr("readonly", false);
            $("#top_co").attr("readonly", true);
            $("#date_top_pro1").attr("readonly", true);
            $("#date_top_pro2").attr("readonly", true);
            $("#month_top_pro").attr("readonly", true);
            $("#month_year_top_pro").attr("readonly", true);
            $('#top_product').val("0")
            $('#top_si').val("0")
            $('#top_co').val("0")
            $('#date_top_pro1').val("0")
            $('#date_top_pro2').val("0")
            $('#month_top_pro').val("0")
            $('#month_year_top_pro').val("0")
        } else if (id == 3) {//color
            $("#top_product").attr("readonly", true);
            $("#top_si").attr("readonly", true);
            $("#top_co").attr("readonly", false);
            $("#date_top_pro1").attr("readonly", true);
            $("#date_top_pro2").attr("readonly", true);
            $("#month_top_pro").attr("readonly", true);
            $("#month_year_top_pro").attr("readonly", true);
            $('#top_product').val("0")
            $('#top_si').val("0")
            $('#top_co').val("0")
            $('#date_top_pro1').val("0")
            $('#date_top_pro2').val("0")
            $('#month_top_pro').val("0")
            $('#month_year_top_pro').val("0") */
        /* }else  */if (id == 4) {//เดือน
            $("#top_product").attr("readonly", true);
            $("#top_si").attr("readonly", true);
            $("#top_co").attr("readonly", true);
            $("#date_top_pro1").attr("readonly", true);
            $("#date_top_pro2").attr("readonly", true);
            $("#month_top_pro").attr("readonly", false);
            $("#month_year_top_pro").attr("readonly", true);
            $('#top_product').val("0")
            $('#top_si').val("0")
            $('#top_co').val("0")
            $('#date_top_pro1').val("0")
            $('#date_top_pro2').val("0")
            $('#month_top_pro').val("0")
            $('#month_year_top_pro').val("0")
        }else if (id == 5) {//ปี
            $("#top_product").attr("readonly", true);
            $("#top_si").attr("readonly", true);
            $("#top_co").attr("readonly", true);
            $("#date_top_pro1").attr("readonly", true);
            $("#date_top_pro2").attr("readonly", true);
            $("#month_top_pro").attr("readonly", true);
            $("#month_year_top_pro").attr("readonly", false);
            $('#top_product').val("0")
            $('#top_si').val("0")
            $('#top_co').val("0")
            $('#date_top_pro1').val("0")
            $('#date_top_pro2').val("0")
            $('#month_top_pro').val("0")
            $('#month_year_top_pro').val("0")
        }else if (id == 6) {//วันที่
            $("#top_product").attr("readonly", true);
            $("#top_si").attr("readonly", true);
            $("#top_co").attr("readonly", true);
            $("#date_top_pro1").attr("readonly", false);
            $("#date_top_pro2").attr("readonly", false);
            $("#month_top_pro").attr("readonly", true);
            $("#month_year_top_pro").attr("readonly", true);
            $('#top_product').val("0")
            $('#top_si').val("0")
            $('#top_co').val("0")
            $('#date_top_pro1').val("0")
            $('#date_top_pro2').val("0")
            $('#month_top_pro').val("0")
            $('#month_year_top_pro').val("0") 
        } 
         else { //all
            $("#top_product").attr("readonly", true);
            $("#top_si").attr("readonly", true);
            $("#top_co").attr("readonly", true);
            $("#date_top_pro1").attr("readonly", true);
            $("#date_top_pro2").attr("readonly", true);
            $("#month_top_pro").attr("readonly", true);
            $("#month_year_top_pro").attr("readonly", true);
            $('#top_product').val("0")
            $('#top_si').val("0")
            $('#top_co').val("0")
            $('#date_top_pro1').val("0")
            $('#date_top_pro2').val("0")
            $('#month_top_pro').val("0")
            $('#month_year_top_pro').val("0") 
        }

    });

    /* พนักงาน */

    $("#btn_emp").on("click", function () {
        $('#re_emp').submit()
    });
    $("#emp").on("change", function () {
        var id = $(this).val();
        if (id == 1) {//สิทธิ์
            $("#type_emp").attr("readonly", false);
            $("#status_emp").attr("readonly", false);
            $("#date_emp_pro1").attr("readonly", true);
            $("#date_emp_pro2").attr("readonly", true);
            $("#month_emp_pro").attr("readonly", true);
            $("#month_year_emp_pro").attr("readonly", true);
            $('#status_emp').val(2)
            $('#date_emp_pro1').val(0)
            $('#date_emp_pro2').val(0)
            $('#month_emp_pro').val(0)
            $('#month_year_emp_pro').val(0)
           
        } else if (id == 2) {//สถานะ
            $("#type_emp").attr("readonly", true);
            $("#status_emp").attr("readonly", false);
            $("#date_emp_pro1").attr("readonly", true);
            $("#date_emp_pro2").attr("readonly", true);
            $("#month_emp_pro").attr("readonly", true);
            $("#month_year_emp_pro").attr("readonly", true);
            $('#status_emp').val(2)
            $('#date_emp_pro1').val(0)
            $('#date_emp_pro2').val(0)
            $('#month_emp_pro').val(0)
            $('#month_year_emp_pro').val(0)
        }else if (id == 4) {//วันที่
            $("#type_emp").attr("readonly", true);
            $("#status_emp").attr("readonly", true);
            $("#date_emp_pro1").attr("readonly", false);
            $("#date_emp_pro2").attr("readonly", false);
            $("#month_emp_pro").attr("readonly", true);
            $("#month_year_emp_pro").attr("readonly", true);
            $('#status_emp').val(2)
            $('#date_emp_pro1').val(0)
            $('#date_emp_pro2').val(0)
            $('#month_emp_pro').val(0)
            $('#month_year_emp_pro').val(0)
        }else if (id == 5) {//เดือน
            $("#type_emp").attr("readonly", true);
            $("#status_emp").attr("readonly", true);
            $("#date_emp_pro1").attr("readonly", true);
            $("#date_emp_pro2").attr("readonly", true);
            $("#month_emp_pro").attr("readonly", false);
            $("#month_year_emp_pro").attr("readonly", false);
            $('#status_emp').val(2)
            $('#date_emp_pro1').val(0)
            $('#date_emp_pro2').val(0)
            $('#month_emp_pro').val(0)
            $('#month_year_emp_pro').val(0)
        }else if (id == 6) {//ปี
            $("#type_emp").attr("readonly", true);
            $("#status_emp").attr("readonly", true);
            $("#date_emp_pro1").attr("readonly", true);
            $("#date_emp_pro2").attr("readonly", true);
            $("#month_emp_pro").attr("readonly", true);
            $("#month_year_emp_pro").attr("readonly", false);
            $('#status_emp').val(2)
            $('#date_emp_pro1').val(0)
            $('#date_emp_pro2').val(0)
            $('#month_emp_pro').val(0)
            $('#month_year_emp_pro').val(0)
        }     
        else { //all
            $("#type_emp").attr("readonly", true);
            $("#status_emp").attr("readonly", true);
            $("#date_emp_pro1").attr("readonly", true);
            $("#date_emp_pro2").attr("readonly", true);
            $("#month_emp_pro").attr("readonly", true);
            $("#month_year_emp_pro").attr("readonly", true);
            $('#status_emp').val(2)
            $('#date_emp_pro1').val(0)
            $('#date_emp_pro2').val(0)
            $('#month_emp_pro').val(0)
            $('#month_year_emp_pro').val(0)
        }
    });

       //ข้อมุลสินค้า
       $("#btn_re_pro").on("click", function () {
        $('#re_product').submit()
    });
    $("#product").on("change", function () {

        var id = $(this).val();
        if (id == 1) {//ประเภท
            $("#type_pro").attr("readonly", false);
            $("#gr_pro").attr("readonly", false);
            $("#si_pro").attr("readonly", false);
            $("#co_pro").attr("readonly", false);
            $('#gr_pro').val(0)
            $('#si_pro').val(0)
            $('#co_pro').val(0)
       /*  } else if (id == 2) {//กลุ่ม
            $("#type_pro").attr("readonly", true);
            $("#gr_pro").attr("readonly", false);
            $("#si_pro").attr("readonly", false);
            $("#co_pro").attr("readonly", false);
            $('#gr_pro').val(0)
            $('#si_pro').val(0)
            $('#co_pro').val(0) */
        /* } else if (id == 3) {//ไซส์
            $("#type_pro").attr("readonly", true);
            $("#gr_pro").attr("readonly", true);
            $("#si_pro").attr("readonly", false);
            $("#co_pro").attr("readonly", true);
            $('#gr_pro').val(0)
            $('#si_pro').val(0)
            $('#co_pro').val(0)
        }else if (id == 4) {//สี
            $("#type_pro").attr("readonly", true);
            $("#gr_pro").attr("readonly", true);
            $("#si_pro").attr("readonly", true);
            $("#co_pro").attr("readonly", false);
            $('#gr_pro').val(0)
            $('#si_pro').val(0)
            $('#co_pro').val(0) */
        } else { //all
            $("#type_pro").attr("readonly", true);
            $("#gr_pro").attr("readonly", true);
            $("#si_pro").attr("readonly", true);
            $("#co_pro").attr("readonly", true);
            $('#gr_pro').val(0)
            $('#si_pro').val(0)
            $('#co_pro').val(0)
        }

    });

    $("#btn_re_pro_stk").on("click", function () {
        $('#re_stock').submit()
    });
    $("#product_stk").on("change", function () {

        var id = $(this).val();
        if (id == 1) {//ประเภท
            $("#type_pro_stk").attr("readonly", false);
            $("#gr_pro_stk").attr("readonly", false);
            $("#si_pro_stk").attr("readonly", false);
            $("#co_pro_stk").attr("readonly", false);
            $('#gr_pro_stk').val(0)
            $('#si_pro_stk').val(0)
            $('#co_pro_stk').val(0)
        /* } else if (id == 2) {//เดือน
            $("#type_pro_stk").attr("readonly", true);
            $("#gr_pro_stk").attr("readonly", false);
            $("#si_pro_stk").attr("readonly", true);
            $("#co_pro_stk").attr("readonly", true);
            $('#gr_pro_stk').val(0)
            $('#si_pro_stk').val(0)
            $('#co_pro_stk').val(0)
        } else if (id == 3) {//ปี
            $("#type_pro_stk").attr("readonly", true);
            $("#gr_pro_stk").attr("readonly", true);
            $("#si_pro_stk").attr("readonly", false);
            $("#co_pro_stk").attr("readonly", true);
            $('#gr_pro_stk').val(0)
            $('#si_pro_stk').val(0)
            $('#co_pro_stk').val(0)
        }else if (id == 4) {//ปี
            $("#type_pro_stk").attr("readonly", true);
            $("#gr_pro_stk").attr("readonly", true);
            $("#si_pro_stk").attr("readonly", true);
            $("#co_pro_stk").attr("readonly", false);
            $('#gr_pro_stk').val(0)
            $('#si_pro_stk').val(0)
            $('#co_pro_stk').val(0) */
        } else { //all
            $("#type_pro_stk").attr("readonly", true);
            $("#gr_pro_stk").attr("readonly", true);
            $("#si_pro_stk").attr("readonly", true);
            $("#co_pro_stk").attr("readonly", true);
            $('#gr_pro_stk').val(0)
            $('#si_pro_stk').val(0)
            $('#co_pro_stk').val(0)
        }

    });
 //รับสินค้า
 $("#btn_print_in_pro").on("click", function () {
    $('#re_product_in').submit()
});
$("#in_pro").on("change", function () {

    var id = $(this).val();
    /* if (id == 1) {//ไซส์
        $("#si_sto").attr("readonly", false);
        $("#co_sto").attr("readonly", true);
        $("#date_in_pro1").attr("readonly", true);
        $("#date_in_pro2").attr("readonly", true);
        $("#month_in_pro").attr("readonly", true);
        $("#month_year_in_pro").attr("readonly", true);
        $("#status_sto").attr("readonly", false);
        $('#si_sto').val(0)
        $('#co_sto').val(0)
        $('#date_in_pro1').val(0)
        $('#date_in_pro2').val(0)
        $('#month_in_pro').val(0)
        $('#month_year_in_pro').val(0)
        $('#status_sto').val(2)
    } else if (id == 2) {//สี
        $("#si_sto").attr("readonly", true);
        $("#co_sto").attr("readonly", false);
        $("#date_in_pro1").attr("readonly", true);
        $("#date_in_pro2").attr("readonly", true);
        $("#month_in_pro").attr("readonly", true);
        $("#month_year_in_pro").attr("readonly", true);
        $("#status_sto").attr("readonly", false);
        $('#si_sto').val(0)
        $('#co_sto').val(0)
        $('#date_in_pro1').val(0)
        $('#date_in_pro2').val(0)
        $('#month_in_pro').val(0)
        $('#month_year_in_pro').val(0)
        $('#status_sto').val(2) */
     if (id==3){//เดือน
        /* $("#si_sto").attr("readonly", true);
        $("#co_sto").attr("readonly", true); */
        $("#date_in_pro1").attr("readonly", true);
        $("#date_in_pro2").attr("readonly", true);
        $("#month_in_pro").attr("readonly", false);
        $("#month_year_in_pro").attr("readonly", false);
        $("#status_sto").attr("readonly", false);
        $('#si_sto').val(0)
        $('#co_sto').val(0)
        $('#date_in_pro1').val(0)
        $('#date_in_pro2').val(0)
        $('#month_in_pro').val(0)
        $('#month_year_in_pro').val(0)
        $('#status_sto').val(2)
    }else if (id==4){//ปี
        /* $("#si_sto").attr("readonly", true);
        $("#co_sto").attr("readonly", true); */
        $("#date_in_pro1").attr("readonly", true);
        $("#date_in_pro2").attr("readonly", true);
        $("#month_in_pro").attr("readonly", true);
        $("#month_year_in_pro").attr("readonly", false);
        $("#status_sto").attr("readonly", false);
        $('#si_sto').val(0)
        $('#co_sto').val(0)
        $('#date_in_pro1').val(0)
        $('#date_in_pro2').val(0)
        $('#month_in_pro').val(0)
        $('#month_year_in_pro').val(0)
        $('#status_sto').val(2)
    }else if (id==5){//กำหนดเอง
        /* $("#si_sto").attr("readonly", true);
        $("#co_sto").attr("readonly", true); */
        $("#date_in_pro1").attr("readonly", false);
        $("#date_in_pro2").attr("readonly", false);
        $("#month_in_pro").attr("readonly", true);
        $("#month_year_in_pro").attr("readonly", true);
        $("#status_sto").attr("readonly", false);
        $('#si_sto').val(0)
        $('#co_sto').val(0)
        $('#date_in_pro1').val(0)
        $('#date_in_pro2').val(0)
        $('#month_in_pro').val(0)
        $('#month_year_in_pro').val(0)
        $('#status_sto').val(2)
    }else if (id==6){//สถานะ
       /*  $("#si_sto").attr("readonly", true);
        $("#co_sto").attr("readonly", true); */
        $("#date_in_pro1").attr("readonly", true);
        $("#date_in_pro2").attr("readonly", true);
        $("#month_in_pro").attr("readonly", true);
        $("#month_year_in_pro").attr("readonly", true);
        $("#status_sto").attr("readonly", false);
        $('#si_sto').val(0)
        $('#co_sto').val(0)
        $('#date_in_pro1').val(0)
        $('#date_in_pro2').val(0)
        $('#month_in_pro').val(0)
        $('#month_year_in_pro').val(0)
        $('#status_sto').val(2)
    }             
    else { //all
       /*  $("#si_sto").attr("readonly", true);
        $("#co_sto").attr("readonly", true); */
        $("#date_in_pro1").attr("readonly", true);
        $("#date_in_pro2").attr("readonly", true);
        $("#month_in_pro").attr("readonly", true);
        $("#month_year_in_pro").attr("readonly", true);
        $("#status_sto").attr("readonly", true);
        $('#si_sto').val(0)
        $('#co_sto').val(0)
        $('#date_in_pro1').val(0)
        $('#date_in_pro2').val(0)
        $('#month_in_pro').val(0)
        $('#month_year_in_pro').val(0)
        $('#status_sto').val(2)
    }

});

   //---------------------------print_payment
   $("#btn_print_pay_pro").on("click", function () {
    $('#re_payment').submit()
});
$("#paym").on("change", function () {
    var id = $(this).val();
     /* if (id == 1) {//ประเภท
        $("#sale_sto").attr("readonly", false);
         $("#si_pay").attr("readonly", true);
        $("#co_pay").attr("readonly", true); 
        $("#date_pay_pro1").attr("readonly", true);
        $("#date_pay_pro2").attr("readonly", true);
        $("#month_pay_pro").attr("readonly", true);
        $("#month_year_pay_pro").attr("readonly", true);
        //$("#status_pay").attr("readonly", false);
        $('#sale_sto').val(0)
        $('#si_pay').val(0)
        $('#co_pay').val(0)
        $('#date_pay_pro1').val(0)
        $('#date_pay_pro2').val(0)
        $('#month_pay_pro').val(0)
        $('#month_year_pay_pro').val(0) 
        //$('#status_pay').val(0) */
    /* }  else if (id == 2) {//สี
        $("#sale_sto").attr("readonly", true);
        $("#si_pay").attr("readonly", false);
        $("#co_pay").attr("readonly", true);
        $("#date_pay_pro1").attr("readonly", true);
        $("#date_pay_pro2").attr("readonly", true);
        $("#month_pay_pro").attr("readonly", true);
        $("#month_year_pay_pro").attr("readonly", true);
        //$("#status_pay").attr("readonly", false);
        $('#sale_sto').val(0)
        $('#si_pay').val(0)
        $('#co_pay').val(0)
        $('#date_pay_pro1').val(0)
        $('#date_pay_pro2').val(0)
        $('#month_pay_pro').val(0)
        $('#month_year_pay_pro').val(0)
       // $('#status_pay').val(0)
    }else if (id == 3) {//สี
        $("#sale_sto").attr("readonly", true);
        $("#si_pay").attr("readonly", true);
        $("#co_pay").attr("readonly", false);
        $("#date_pay_pro1").attr("readonly", true);
        $("#date_pay_pro2").attr("readonly", true);
        $("#month_pay_pro").attr("readonly", true);
        $("#month_year_pay_pro").attr("readonly", true);
//$("#status_pay").attr("readonly", false);
        $('#sale_sto').val(0)
        $('#si_pay').val(0)
        $('#co_pay').val(0)
        $('#date_pay_pro1').val(0)
        $('#date_pay_pro2').val(0)
        $('#month_pay_pro').val(0)
        $('#month_year_pay_pro').val(0)
        $('#status_pay').val(0) */
     if (id==4){//เดือน
        /* $("#sale_sto").attr("readonly", true);
        $("#si_pay").attr("readonly", true);
        $("#co_pay").attr("readonly", true); */
        $("#date_pay_pro1").attr("readonly", true);
        $("#date_pay_pro2").attr("readonly", true);
        $("#month_pay_pro").attr("readonly", false);
        $("#month_year_pay_pro").attr("readonly", true);
        $("#status_sto").attr("readonly", false);
        /* $('#sale_sto').val(0)
        $('#si_pay').val(0)
        $('#co_pay').val(0) */
        $('#date_pay_pro1').val(0)
        $('#date_pay_pro2').val(0)
        $('#month_pay_pro').val(0)
        $('#month_year_pay_pro').val(0)
        $('#status_pay').val(2)
    }else if (id==5){//ปี
        /* $("#sale_sto").attr("readonly", true);
        $("#si_pay").attr("readonly", true);
        $("#co_pay").attr("readonly", true); */
        $("#date_pay_pro1").attr("readonly", true);
        $("#date_pay_pro2").attr("readonly", true);
        $("#month_pay_pro").attr("readonly", true);
        $("#month_year_pay_pro").attr("readonly", false);
        $("#status_pay").attr("readonly", false);
        /* $('#sale_sto').val(0)
        $('#si_pay').val(0)
        $('#co_pay').val(0) */
        $('#date_pay_pro1').val(0)
        $('#date_pay_pro2').val(0)
        $('#month_pay_pro').val(0)
        $('#month_year_pay_pro').val(0)
        $('#status_pay').val(2)
    }else if (id==6){//กำหนดเอง
        /* $("#sale_sto").attr("readonly", true);
        $("#si_pay").attr("readonly", true);
        $("#co_pay").attr("readonly", true); */
        $("#date_pay_pro1").attr("readonly", false);
        $("#date_pay_pro2").attr("readonly", false);
        $("#month_pay_pro").attr("readonly", true);
        $("#month_year_pay_pro").attr("readonly", true);
        $("#status_pay").attr("readonly", false);
        /* $('#sale_sto').val(0)
        $('#si_pay').val(0)
        $('#co_pay').val(0) */
        $('#date_pay_pro1').val(0)
        $('#date_pay_pro2').val(0)
        $('#month_pay_pro').val(0)
        $('#month_year_pay_pro').val(0)
        $('#status_pay').val(2)
    }else if (id==7){//สถานะ
        /* $("#sale_sto").attr("readonly", true);
        $("#si_pay").attr("readonly", true);
        $("#co_pay").attr("readonly", true); */
        $("#date_pay_pro1").attr("readonly", true);
        $("#date_pay_pro2").attr("readonly", true);
        $("#month_pay_pro").attr("readonly", true);
        $("#month_year_pay_pro").attr("readonly", true);
        $("#status_pay").attr("readonly", false);
        /* $('#sale_sto').val(0)
        $('#si_pay').val(0)
        $('#co_pay').val(0) */
        $('#date_pay_pro1').val(0)
        $('#date_pay_pro2').val(0)
        $('#month_pay_pro').val(0)
        $('#month_year_pay_pro').val(0)
        $('#status_pay').val(2)
    }             
    else { //all
        $("#sale_sto").attr("readonly", true);
        $("#si_pay").attr("readonly", true);
        $("#co_pay").attr("readonly", true);
        $("#date_pay_pro1").attr("readonly", true);
        $("#date_pay_pro2").attr("readonly", true);
        $("#month_pay_pro").attr("readonly", true);
        $("#month_year_pay_pro").attr("readonly", true);
        $("#status_pay").attr("readonly", true);
        $('#sale_sto').val(0)
        $('#si_pay').val(0)
        $('#co_pay').val(0)
        $('#date_pay_pro1').val(0)
        $('#date_pay_pro2').val(0)
        $('#month_pay_pro').val(0)
        $('#month_year_pay_pro').val(0)
        $('#status_pay').val(2)
    }


});

})
$(document).on("click", "#cn_emp", function(event) {
    location.reload();
})
$(document).on("click", "#cn_pay", function(event) {
    location.reload();
})
$(document).on("click", "#cn_pro", function(event) {
    location.reload();
})
$(document).on("click", "#cn_stk", function(event) {
    location.reload();
})
$(document).on("click", "#cn_sto", function(event) {
    location.reload();
})
$(document).on("click", "#cn_top", function(event) {
    location.reload();
})