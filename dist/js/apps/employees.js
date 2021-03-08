$('.insert').on('submit', function (event) {
    event.preventDefault();
        var emp_name  = $('#name_emp').val()
        var emp_surname = $('#surname_emp').val()
        var emp_czid = $('#cz_id').val()
        var emp_hbd = $('#hbd_emp').val()
        var emp_number = $('#number_emp').val()
        var emp_email = $('#email_emp').val()
        var emp_numhome = $('#num_home').val()
        var emp_county  = $('#countyt').val()
        var emp_district = $('#district').val()
        var emp_province = $('#province').val()
        var emp_postal_number = $('#postal_number').val()
        var emp_alley = $('#empalley').val()
        var emp_muu = $('#muu').val()
        var emp_road = $('#emproad').val()
        var file = $('#upload_emp').val()
        
        if(emp_name ==""){
            swal({
                text: "กรุณากรอกชื่อ",
                icon: "warning",
                button: false,
            });
        }else if (emp_surname==""){
            swal({
                text: "กรุณากรอกนามสกุล",
                icon: "warning",
                button: false,
            });
        }else if (emp_czid==""){
            swal({
                text: "กรุณากรอกบัตรประชาชน",
                icon: "warning",
                button: false,
            });
        }else if (emp_hbd ==""){
            swal({
                text: "กรุณาเลือกวันเข้าทำงาน",
                icon: "warning",
                button: false,
            });
        }else if (emp_number==""){
            swal({
                text: "กรุณากรอกเบอร์โทร",
                icon: "warning",
                button: false,
            });
        }else if (emp_email==""){
            swal({
                text: "กรุณากรอกอีเมล์",
                icon: "warning",
                button: false,
            });
        }else if (emp_numhome==""){
            swal({
                text: "กรุณากรอกบ้านเลขที่",
                icon: "warning",
                button: false,
            });
        }else if (emp_county==""){
            swal({
                text: "กรุณากรอกตำบล",
                icon: "warning",
                button: false,
            });
        }else if (emp_district==""){
            swal({
                text: "กรุณากรอกอำเภอ",
                icon: "warning",
                button: false,
            });
        }else if (emp_province==""){
            swal({
                text: "กรุณากรอกจังหวัด",
                icon: "warning",
                button: false,
            });
        }else if (emp_postal_number==""){
            swal({
                text: "กรุณากรอกรหัสไปรษณีย์",
                icon: "warning",
                button: false,
            });
        }else if (file==""){
            swal({
                text: "กรุณาเลือกรูปภาพ",
                icon: "warning",
                button: false,
            });
        }else if (emp_alley==""){
            swal({
                text: "กรุณากรอกซอย",
                icon: "warning",
                button: false,
            });
        }else if (emp_muu==""){
            swal({
                text: "กรุณากรอกหมู่",
                icon: "warning",
                button: false,
            });
        }else if (emp_road==""){
            swal({
                text: "กรุณากรอกถนน",
                icon: "warning",
                button: false,
            });
        }else{
           $.ajax({
            url: "insert_employees.php",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (data) {
                swal({
                    text: "บันทึกข้อมูลเรียบร้อย",
                    icon: "success",
                    button: false,
                });
                console.log(data);
                setTimeout(function () {
                    location.reload();
                }, 2000);
            }
        })
    }
        
    
}
);



/* ยกเลิกพนักงาน */


$(document).on("click", "#cancel_emp", function (event) {
    var emp_id = $(this).attr('data')
    var emp_name = $(this).attr('emp_name')
    var emp_surname = $(this).attr('emp_surname')
    var status = $(this).attr('status')
    if(status==1){
        swal({
            title: "แจ้งเตือน",
            text: "ต้องการยกเลิกพนักงาน : " + emp_name +' '+emp_surname,
            icon: "warning",
            buttons: ['ยกเลิก', 'ยืนยัน'],

        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "ajax/employees/remove_emp.php",
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
            text: "ต้องการยกเลิกการระงับพนักงาน : " + emp_name +' '+emp_surname,
            icon: "warning",
            buttons: ['ยกเลิก', 'ยืนยัน'],

        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "ajax/employees/remove_emp.php",
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


/* อัพเดต พนักงาน  */

$('.Update').on('submit', function (event) {
    event.preventDefault();
        var emp_id = $(this).attr('data-id')
        var emp_name  = $('#name_emp'+ emp_id).val()
        var emp_surname = $('#surname_emp'+ emp_id).val()
        var emp_czid = $('#cz_id'+ emp_id).val()
        var emp_hbd = $('#hbd_emp'+ emp_id).val()
        var emp_number = $('#number_emp'+ emp_id).val()
        var emp_email = $('#email_emp'+ emp_id).val()
        var emp_numhome = $('#num_home'+ emp_id).val()
        var emp_county  = $('#countyt'+ emp_id).val()
        var emp_district = $('#district'+ emp_id).val()
        var emp_province = $('#province'+ emp_id).val()
        var emp_postal_number = $('#postal_number'+ emp_id).val()
        var emp_alley = $('#empalley'+ emp_id).val()
        var emp_muu = $('#muu'+ emp_id).val()
        var emp_road = $('#emproad'+ emp_id).val()
        var file = $('#edit_pload_emp'+ emp_id).val()
        
        if(emp_name ==""){
            swal({
                text: "กรุณากรอกชื่อ",
                icon: "warning",
                button: false,
            });
        }else if (emp_surname==""){
            swal({
                text: "กรุณากรอกนามสกุล",
                icon: "warning",
                button: false,
            });
        }else if (emp_czid==""){
            swal({
                text: "กรุณากรอกบัตรประชาชน",
                icon: "warning",
                button: false,
            });
        }else if (emp_hbd ==""){
            swal({
                text: "กรุณาเลือกวันเกิด",
                icon: "warning",
                button: false,
            });
        }else if (emp_number==""){
            swal({
                text: "กรุณากรอกเบอร์โทร",
                icon: "warning",
                button: false,
            });
        }else if (emp_email==""){
            swal({
                text: "กรุณากรอกอีเมล์",
                icon: "warning",
                button: false,
            });
        }else if (emp_numhome==""){
            swal({
                text: "กรุณากรอกบ้านเลขที่",
                icon: "warning",
                button: false,
            });
        }else if (emp_county==""){
            swal({
                text: "กรุณากรอกตำบล",
                icon: "warning",
                button: false,
            });
        }else if (emp_district==""){
            swal({
                text: "กรุณากรอกอำเภอ",
                icon: "warning",
                button: false,
            });
        }else if (emp_province==""){
            swal({
                text: "กรุณากรอกจังหวัด",
                icon: "warning",
                button: false,
            });
        }else if (emp_postal_number==""){
            swal({
                text: "กรุณากรอกรหัสไปรษณีย์",
                icon: "warning",
                button: false,
            });
        }else if (file==""){
            swal({
                text: "กรุณาเลือกรูปภาพ",
                icon: "warning",
                button: false,
            });
        }else if (emp_alley==""){
            swal({
                text: "กรุณากรอกซอย",
                icon: "warning",
                button: false,
            });
        }else if (emp_muu==""){
            swal({
                text: "กรุณากรอกหมู่",
                icon: "warning",
                button: false,
            });
        }else if (emp_road==""){
            swal({
                text: "กรุณากรอกถนน",
                icon: "warning",
                button: false,
            });
        }else{
           $.ajax({
            url: "ajax/employees/update_emp.php",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (data) {
                swal({
                    text: "บันทึกข้อมูลเรียบร้อย",
                    icon: "success",
                    button: false,
                });
                console.log(data);
                  setTimeout(function () {
                    location.reload();
                }, 2000); 
            }
        })
    }
        
    
}
);






$("#number_emp").change(function () {
    var number_emp = $(this).val()
    
    $.ajax({
        url: "ajax/employees/check_number_emp.php",
        method: "POST",
        data: {
            number_emp: number_emp,
            

        },
        success: function (data) {
            if (data == 1) {
                swal({
                    text: "เบอร์โทรนี้มีอยุ่แล้วกรุณากรอกใหม่อีกครั้ง",
                    icon: "warning",
                    button: false,
                });
                $('#number_emp').val("")
                $('#number_emp').focus()
            }

        }
    });


})


 /* เช็คemp */
///------------------ check_gr_name_edit
$(document).on("change", ".check-number-emp", function (event) {
    var number_emp = $(this).val()
    $.ajax({
        url: "ajax/employees/check_number_emp.php",
        method: "POST",
        data: {
            number_emp: number_emp,
        },
        success: function (data) {
            console.log(data)
            if (data == 1) {
                swal({
                    text: "เบอร์โทรนี้มีอยุ่แล้วกรุณากรอกใหม่อีกครั้ง",
                    icon: "warning",
                    button: false,
                });
            }

        }
    });

    
})


/* เช็คอีเมล์ */


$("#email_emp").change(function () {
    var email_emp = $(this).val()
    
    $.ajax({
        url: "ajax/employees/check_email_emp.php",
        method: "POST",
        data: {
            email_emp: email_emp,
            

        },
        success: function (data) {
            if (data == 1) {
                swal({
                    text: "อีเมล์นี้มีอยุ่แล้วกรุณากรอกใหม่อีกครั้ง",
                    icon: "warning",
                    button: false,
                });
                $('#email_emp').val("")
                $('#email_emp').focus()
            }

        }
    });


})


 

$(document).on("change", ".check-email-emp", function (event) {
    var email_emp = $(this).val()
    $.ajax({
        url: "ajax/employees/check_email_emp.php",
        method: "POST",
        data: {
            email_emp: email_emp,
        },
        success: function (data) {
            console.log(data)
            if (data == 1) {
                swal({
                    text: "อีเมล์นี้มีอยุ่แล้วกรุณากรอกใหม่อีกครั้ง",
                    icon: "warning",
                    button: false,
                });
            }

        }
    });

    
})


/* เช็คบัตรประชาชน */
 
* function checkID(id) {
    if (id.length != 13) return false;
    for (i = 0, sum = 0; i < 12; i++)
        sum += parseFloat(id.charAt(i)) * (13 - i); if ((11 - sum % 11) % 10 != parseFloat(id.charAt(12)))
        return false; return true;
}

$("#cz_id").on("change", function () {
    var id_card = $(this).val();
    id_card = id_card.replace(/ /g, '');
    id_card = id_card.replace(/-/g, '');

    if (id_card.length < 13) {
        swal({
            text: "กรุณากรอกเลขบัตรประชาชน 13 หลัก",
            icon: "warning",
            button: "ปิด",
        });

        $(this).val("")
    } else if (!checkID(id_card)) {
        swal({
            text: "เลขบัตรประชาชนไม่ถูกต้อง",
            icon: "warning",
            button: "ปิด",
        });
        $(this).val("")
    } else {
        $.ajax({
            url: "ajax/employees/check_idcard_emp.php",
            method: "POST",
            data: {
                id_card: id_card
            },
            success: function (data) {
                console.log(data)
                if (data == 0) {
                    swal({
                        text: "เลขบัตรประชาชนถูกใช้ไปแล้ว",
                        icon: "warning",
                        button: "ปิด",
                    });
                    $("#cz_id").val("")
                } else {
                    $('#in_tel').focus();
                }
            }
        });
    }
}); 

 




$.Thailand({
    $district: $('#county'), // input ของตำบล
    $amphoe: $('#district'), // input ของอำเภอ
    $province: $('#province'), // input ของจังหวัด
    $zipcode: $('#postal_number'), // input ของรหัสไปรษณีย์
});
var t = $('#emptable').DataTable({
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


$(document).on("click", "#can-emp", function(event) {
    location.reload();
})
