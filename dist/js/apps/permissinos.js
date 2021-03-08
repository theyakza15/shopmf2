$("#addadmin").click(function () {
    
    var emp_id = $('#pername').val()
    var per_status = $('#perstatus').val()
    if(emp_id == 0){
        swal({
            text: "กรุณาเลือกชื่อ",
            icon: "warning",
            button: false,
        });
    }else{
        $.ajax({
            url: "ajax/permissinos/insert_permissions.php", //ไฟล์ที่ต้องส่งค่าไป
            method: "POST",
            data: {
                emp_id: emp_id,
                per_status: per_status

            },
            success: function (data) {
                console.log(data) 
                swal({
                    text: "บันทึกข้อมูลเรียบร้อย",
                    icon: "success",
                    button: false,
                });
                setTimeout(function () {
                    location.reload();
                }, 2000); 
            }
        });

    }
})



/* ยกเลิก แอดมิน */


$(document).on("click", "#cancel_per", function (event) {
    var emp_id = $(this).attr('data')
    var emp_name = $(this).attr('emp_name')
    var emp_surname = $(this).attr('emp_surname')
    var status = $(this).attr('status')
    if(status==1){
        swal({
            title: "แจ้งเตือน",
            text: "ต้องการยกเลิกข้อมูลสิทธิ์ : " + emp_name +' '+emp_surname, 
            icon: "warning",
            buttons: ['ยกเลิก', 'ยืนยัน'],

        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "ajax/permissinos/remove_permiss.php",
                        method: "POST",
                        async: false,
                        data: {
                            emp_id: emp_id,
                            status:status
                        },
                        success: function (data) {
                            console.log(data)
                             swal({
                                 text: "บันทึกข้อมูลเรียบร้อย",
                                 icon: "success",
                                 button: false,
                             });
                             setTimeout(function () {
                                 location.reload();
                             }, 2000); 
                        }
                    });
                } else {
                    swal.close()
                }
            });
    }else{
        swal({
            title: "แจ้งเตือน",
            text: "ต้องการยกเลิกการระงับข้อมูลสิทธิ์: " + emp_name+' '+emp_surname,
            icon: "warning",
            buttons: ['ยกเลิก', 'ยืนยัน'],

        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "ajax/permissinos/remove_permiss.php",
                        method: "POST",
                        async: false,
                        data: {
                            emp_id: emp_id,
                            status: status
                        },
                        success: function (data) {
                            console.log(data)
                              swal({
                                 text: "บันทึกข้อมูลเรียบร้อย",
                                 icon: "success",
                                 button: false,
                             });
                             setTimeout(function () {
                                 location.reload();
                             }, 2000); 
                        }
                    });
                } else {
                    swal.close()
                }
            });
    }



    
})

/* อัพเดตสิทธิ์ */

$(document).on("click", "#btn_update_per", function (event) {

    var emp_id = $(this).attr('data-id')
    var per_type = $('#per_type'+ emp_id).val()

    if (per_type == '') {
        swal({
            text: "กรุณากรอกชนิดสินค้า",
            icon: "warning",
            button: false,
        });
    }else{
        $.ajax({
            url: "ajax/permissinos/update_per.php",
            method: "POST",
            data: {
                emp_id:emp_id,
                per_type:per_type,
                
                

            },
            success: function (data) {
                console.log(data)
                 swal({
                    text: "บันทึกข้อมูลเรียบร้อย",
                    icon: "success",
                    button: false,
                });
                 setTimeout(function () {
                    location.reload();
                }, 2000);  
            }
        });

    }
})

/* เช็คชื่อสิทธิ์ */

$(document).on("click", "#btn_update_per", function (event) {

    var emp_id = $(this).attr('data-id')
    var per_type = $('#per_type'+ emp_id).val()

    if (per_type == '') {
        swal({
            text: "กรุณากรอกชนิดสินค้า",
            icon: "warning",
            button: false,
        });
    }else{
        $.ajax({
            url: "ajax/permissinos/update_per.php",
            method: "POST",
            data: {
                emp_id:emp_id,
                per_type:per_type,
                
                

            },
            success: function (data) {
                console.log(data)
                 swal({
                    text: "บันทึกข้อมูลเรียบร้อย",
                    icon: "success",
                    button: false,
                });
                 setTimeout(function () {
                    location.reload();
                }, 2000);  
            }
        });

    }
})




var t = $('#customer1').DataTable({
    "responsive": true,
    "lengthChange": false,
    "columnDefs": [
        { responsivePriority: 1, targets: 0 },
        { responsivePriority: 2, targets: 1 }
    ],

    "language": {
        "search": "ค้นหา:",


        "info": "<h4> แสดง  _START_  ถึง _END_ ทั้งหมด จาก <strong style='color:red;'> _TOTAL_ </strong> รายการ </h4>",
        "zeroRecords": "ไม่พบรายการค้นหา",
        "infoEmpty": "แสดงรายการ 0 ถึง 0 ทั้งหมด 0 รายการ",
        "paginate": {
            "first": "หน้าแรก",
            "last": "หน้าสุดท้าย",
            "next": ">>>",
            "previous": "<<<"
        },


        "infoFiltered": "( คำที่ค้นหา จาก _MAX_ รายการ ทั้งหมด ) ",

    }
});

$(document).on("click", "#cna-admin", function(event) {
    location.reload();
})
