
$(document).ready(function () {
    var table = $('#tbl_product').DataTable({
        retrieve: true,
        paging: true,
        "responsive": true,
        "lengthChange": false,
        "columnDefs": [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: 1 }
        ],

        "language": {
            "search": "ค้นหา:",


            "info": "",
            "zeroRecords": "ไม่มีรายการสินค้า",
            "infoEmpty": "",
            "paginate": {
                "first": "หน้าแรก",
                "last": "หน้าสุดท้าย",
                "next": ">>>",
                "previous": "<<<"
            },

            "lengthMenu": 'แสดง <select>' +
                '<option value="5" >5</option>' +
                '<option value="10">10</option>' +
                '<option value="20">20</option>' +
                '<option value="40">40</option>' +
                '<option value="50">50</option>' +
                '<option value="-1">ทั้งหมด</option>' +
                '</select> รายการ',
            "infoFiltered": "( คำที่ค้นหา _TOTAL_ จาก _MAX_ รายการ  ) ",

        },
    })

        $(document).on("click", "#edit", function (event) {
        var id_type = $(this).attr('data')
        console.log(id_type)
        if (id_type != 0) {
            if (id_type) {
                //  $('#in_ge_one').html(html);
                var table = $('#tbl_detail_product').DataTable();
                table.destroy();
                $('#tbl_detail_product').DataTable({
                    retrieve: true,
                    paging: true,
                    "responsive": true,
                    "columnDefs": [
                        { responsivePriority: 1, targets: 0 },
                        { responsivePriority: 2, targets: 1 }
                    ],

                    "language": {
                        "search": "ค้นหา:",


                        "info": "<h4> แสดง  _START_  ถึง _END_ จาก <strong style='color:red;'> _TOTAL_ </strong> รายการ </h4>",
                        "zeroRecords": "ไม่พบรายการค้นหา",
                        "infoEmpty": "แสดงรายการ 0 ถึง 0 0 รายการ",
                        "paginate": {
                            "first": "หน้าแรก",
                            "last": "หน้าสุดท้าย",
                            "next": ">>>",
                            "previous": "<<<"
                        },

                        "lengthMenu": 'แสดง <select>' +
                            '<option value="5" >5</option>' +
                            '<option value="10">10</option>' +
                            '<option value="20">20</option>' +
                            '<option value="40">40</option>' +
                            '<option value="50">50</option>' +
                            '<option value="-1">ทั้งหมด</option>' +
                            '</select> รายการ',
                        "infoFiltered": "( คำที่ค้นหา _TOTAL_ จาก _MAX_ รายการ  ) ",

                    },
                    "ajax": {
                        url: "ajax/payment/fetch_dialog.php",
                        data: { id: id_type },
                        method: "post",
                    }

                })

                $('#fetch_equ').modal('show');
                $('#in_ge_one').val(0);
            }



        } else {
            swal({
                text: "กรุณาเลือกชนิดสินค้า",
                icon: "warning",
                button: false,
            });

        }
    });
    $(document).on("click", "#cancel", function (event) {
       
        var id = $(this).attr("data_id")
        
    
            swal({
                title: "แจ้งเตือน",
                text: " ยกเลิกใบเสร็จเลขที่ : " + id,
                icon: "warning",
                buttons: ["ยกเลิก", "ยืนยัน"],
            })
                .then((willDelete) => {
                    if (willDelete) {
                        //alert(emp_id)
                        $.ajax({
                            url: "ajax/payment/remove_payment.php",
                            method: "POST",
                            data: {
                                id: id,
                            },
                            success: function (data) {
                                 swal({

                                    text: "ยกเลิกข้อมูลเรียบร้อย",
                                    icon: "success",
                                    button: false,
                                });
                                setTimeout(function () {
                                    location.reload();
                                }, 2000); 
                                console.log(data)
                            }
                        });
                    } else {
                        swal.close()
                    }
                });
        

    });
})