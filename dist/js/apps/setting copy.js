$("#type_name").change(function () {
    var type_name = $(this).val()
    
        $.ajax({
            url: "ajax/setting/check_name_type.php",
            method: "POST",
            data: {
                type_name: type_name

            },
            success: function (data) {
                if(data==1){
                    swal({
                        text: "ประเภทสินค้านี้มีอยุ่แล้วกรุณากรอกใหม่อีกครั้ง",
                        icon: "warning",
                        button: false,
                    });
                    $('#type_name').val("")
                    $('#type_name').focus()
                }
               
            }
        });

    
})
///------------------ check_type_name_edit
$(".check-type-name").change(function () {
    var type_name = $(this).val()
    
    $.ajax({
        url: "ajax/setting/check_name_type.php",
        method: "POST",
        data: {
            type_name: type_name

        },
        success: function (data) {
            if (data == 1) {
                swal({
                    text: "ประเภทสินค้านี้มีอยุ่แล้วกรุณากรอกใหม่อีกครั้ง",
                    icon: "warning",
                    button: false,
                });
                
            }

        }
    });


})
///------------------------------ 
$("#add_type").click(function () {
    var type_id = $('#type_id').val()
    var type_name = $('#type_name').val()
    console.log (type_name)
    if (type_name == '') {
        swal({
            text: "กรุณากรอกข้อมูลให้ถูกต้อง",
            icon: "warning",
            button: false,
        });
    } else {
        $.ajax({
            url: "ajax/setting/insert_type.php", //ไฟล์ที่ต้องส่งค่าไป
            method: "POST",
            data: {
                type_id: type_id,
                type_name: type_name

            },
            success: function (data) {
                console.log(data) 
               /*  swal({
                    text: "บันทึกข้อมูลเรียบร้อย",
                    icon: "success",
                    button: false,
                });
                setTimeout(function () {
                    location.reload();
                }, 2000); */
            }
        });

    }
})
$(document).on("click", "#cancel_type", function (event) {
    var status = $(this).attr("status")
    var id = $(this).attr("data")
    var name = $(this).attr("data-name")
    if (status == 1) {
        swal({
            title: "แจ้งเตือน",
            text: " ยกเลิกประเภทสินค้า : " + name,
            icon: "warning",
            buttons: ["ยกเลิก", "ยืนยัน"],
        })
            .then((willDelete) => {
                if (willDelete) {
                    //alert(emp_id)
                    $.ajax({
                        url: "ajax/setting/remove_type.php",
                        method: "POST",
                        data: {
                            id: id,
                            status: status
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
    } else {
        swal({
            title: "แจ้งเตือน",
            text: " ยกเลิกการระงับประเภทสินค้า : " + name,
            icon: "warning",
            buttons: ["ยกเลิก", "ยืนยัน"],
        })
            .then((willDelete) => {
                if (willDelete) {

                    $.ajax({
                        url: "ajax/setting/remove_type.php",
                        method: "POST",
                        data: {
                            id: id,
                            status: status
                        },
                        success: function (data) {
                            swal({

                                text: "ยกเลิกการระงับข้อมูลเรียบร้อย",
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

});


$(document).on("click", "#btn_update_type", function (event) {

    var id = $(this).attr('data-id')
    var name = $('#pro_name' + id).val()


    if (name == '') {
        swal({
            text: "กรุณากรอกข้อมูลให้ถูกต้อง",
            icon: "warning",
            button: false,
        });
    } else {
        $.ajax({
            url: "ajax/setting/update_type.php",
            method: "POST",
            data: {
                id: id,
                name: name

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
var t = $('#customer').DataTable({
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
t.on('order.dt search.dt', function () {
    t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
        cell.innerHTML = i + 1;
    });
}).draw();

var tbl_pro = $('#promotion').DataTable({
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
var i = 0;
$(document).on("click", "#btn_addlist", function (event) {
    //----------------------
    var pm_name = $('#pm_name').val()
    var pm_price = $('#pm_price').val()
    var product = $('#sel_product').val()
    var txt_pro = $("#sel_product option:selected").text();
    var pm_amount = $('#pm_amount').val()
    var l1 = $('#list_pm td:nth-child(2)').map(function () {
        return $(this).text();
    }).get();
    //l1.shift()
    if ($.inArray(product, l1) >= 0) {
        swal({
            title: "แจ้งเตือน",
            text: "คุณได้เพิ่มสินค้านี้ไปแล้ว กรุณาเลือกใหม่อีกครั้ง",
            icon: "warning",
            buttons: false,
        })
    } else if (product == 0 || pm_amount <= 0) {
        swal({
            title: "แจ้งเตือน",
            text: "กรุณากรอกข้อมูลให้ถูกต้อง",
            icon: "warning",
            buttons: false,
        })
    } else {
        var newRow = list_pm.insertRow(list_pm.length),
            cell0 = newRow.insertCell(0)
        cell1 = newRow.insertCell(1)
        cell2 = newRow.insertCell(2),
            cell3 = newRow.insertCell(3),
            cell4 = newRow.insertCell(4)
        cell0.innerHTML = "<span class='i'></span>";
        cell1.innerHTML = product;
        cell2.innerHTML = txt_pro;
        cell3.innerHTML = pm_amount;
        cell4.innerHTML = "<button id='re' class='btn btn-danger btn-xs my-xs-btn' type='button'data-type='" + i + "'data-dir='" + i + "'><i class='fas fa-trash-alt'></i></button>"
        $(".i").each(function (i) {
            $(this).text(++i);
        });
        $("#sel_product option[value='0']").prop('selected', true);
        $('#pm_amount').val("")
    }



})
tbl_pro.on('order.dt search.dt', function () {
    tbl_pro.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
        cell.innerHTML = i + 1;
    });
}).draw();

//-------------
///------------------ check_gr_name
$("#gr_name").change(function () {
    var gr_name = $(this).val()
    var type = $('#sel_type').val()
    $.ajax({
        url: "ajax/setting/check_gr_name.php",
        method: "POST",
        data: {
            gr_name: gr_name,
            type:type

        },
        success: function (data) {
            if (data == 1) {
                swal({
                    text: "ชนิดนี้มีอยุ่แล้วกรุณากรอกใหม่อีกครั้ง",
                    icon: "warning",
                    button: false,
                });
                $('#gr_name').val("")
                $('#gr_name').focus()
            }

        }
    });


})
///------------------------------
$("#btn_con").click(function () {
    var type = $('#sel_type').val()
    var name = $('#gr_name').val()
    var id  =$('#gr_id').val()
    if (type ==0) {
        swal({
            title: "แจ้งเตือน",
            text: "กรุณาเลือกประเภทสินค้า",
            icon: "warning",
            buttons: false,
        })
    } else if(name==""){
        swal({
            title: "แจ้งเตือน",
            text: "กรุณากรอกชื่อชนิดสินค้า",
            icon: "warning",
            buttons: false,
        })
    }
    else {
        $.ajax({
            url: "ajax/setting/insert_group.php",
            method: "POST",
            async: false,
            data: {
                id: id,
                name: name,
                type: type
            },
            success: function (data) {
              //  console.log(data)
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
//-----------------------edit_gr-----------------------
$(document).on("click", "#bnt_update_gr", function (event) {

    var id = $(this).attr('data')
    var name = $('#gr_name' + id).val()
    var sel_type_pro = $('#sel_type_pro' + id).val()

    if (name == '') {
        swal({
            text: "กรุณากรอกชนิดสินค้า",
            icon: "warning",
            button: false,
        });
    } else if (sel_type_pro==0){
        swal({
            text: "กรุณาเลือกประเภทสินค้า",
            icon: "warning",
            button: false,
        });
    }else {
        $.ajax({
            url: "ajax/setting/update_group.php",
            method: "POST",
            data: {
                id: id,
                name: name,
                sel_type_pro: sel_type_pro

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
//--------------------------------------------------------
//-----------------------check_name edit
$(document).on("change", ".check-name", function (event) {
    var id=$(this).attr('data-id')
    var gr_name = $(this).val()
    var type = $('#sel_type_pro'+id).val()
    $.ajax({
        url: "ajax/setting/check_gr_name.php",
        method: "POST",
        data: {
            gr_name: gr_name,
            type: type

        },
        success: function (data) {
            if (data == 1) {
                swal({
                    text: "ชนิดนี้มีอยุ่แล้วกรุณากรอกใหม่อีกครั้ง",
                    icon: "warning",
                    button: false,
                });
            }

        }
    });

    
})
//--------------------------------------------------------
$('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
    localStorage.setItem('activeTab', $(e.target).attr('href'));
});
var activeTab = localStorage.getItem('activeTab');
if (activeTab) {
    $('#tabs-icons-text a[href="' + activeTab + '"]').tab('show');
}

$(document).on("click", "#view", function (event) {
    var table = $('#tbl_detail_equ').DataTable();
    table.on('order.dt search.dt', function () {
        table.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
    table.destroy();
    var id = $(this).attr('data-id')
    //console.log(id)
    $('#tbl_detail_equ').DataTable({
        retrieve: true,
        paging: true,
        "responsive": true,
        "lengthChange": false,
        "responsive": true,
        "columnDefs": [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: 1 }
        ],

        "language": {
            "search": "ค้นหา:",


            "info": "<h4> แสดง  _START_  ถึง _END_ จาก <strong style='color:red;'> _TOTAL_ </strong> รายการ </h4>",
            "zeroRecords": "ไม่พบรายการค้นหา",
            "infoEmpty": "แสดงรายการ 0 ถึง 0 จาก 0 รายการ",
            "paginate": {
                "first": "หน้าแรก",
                "last": "หน้าสุดท้าย",
                "next": ">>>",
                "previous": "<<<"
            },


            "infoFiltered": "( คำที่ค้นหา _TOTAL_ จาก _MAX_ รายการ  ) ",

        },
        "ajax": {
            url: "ajax/setting/fetch_promotion.php",
            type: "post",
            "data": function (d) {
                d.extra_search = id
            }
        }
    })
});
$(document).on("click", "#btn_re_pd", function (event) {

    var pm_id = $(this).attr('data')
    var pro_id = $(this).attr('data-pro')
    $.ajax({
        url: "ajax/setting/remove_pd.php",
        method: "POST",
        data: {
            pm_id: pm_id,
            pro_id: pro_id

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

})
$(document).on("change", "#sel_product_pro", function (event) {

    var pm_id = $('#sel_promotion').val()
    var pro_id = $('#sel_product_pro').val()
    $.ajax({
        url: "ajax/setting/check_product.php",
        method: "POST",
        data: {
            pm_id: pm_id,
            pro_id: pro_id

        },
        success: function (data) {
            console.log(data)
            if (data == 1) {
                swal({
                    text: "มีสินค้านี้อยุ่ในโปรโมชั่นแล้ว กรุณาเลือกสินค้าอีกครั้ง",
                    icon: "warning",
                    button: false,
                });
                $("#sel_product_pro option[value='0']").prop('selected', true);
            }


        }
    });

})
$(document).on("click", "#btn_addlist_pro", function (event) {
    //----------------------
    var pm_id = $("#sel_promotion").val()
    var product = $('#sel_product_pro').val()
    var txt_pro = $("#sel_product_pro option:selected").text();
    var pm_amount = $('#pm_amount_pro').val()
    var l1 = $('#list_pm_pro td:nth-child(2)').map(function () {
        return $(this).text();
    }).get();
    //l1.shift()
    if ($.inArray(product, l1) >= 0) {
        swal({
            title: "แจ้งเตือน",
            text: "คุณได้เพิ่มสินค้านี้ไปแล้ว กรุณาเลือกใหม่อีกครั้ง",
            icon: "warning",
            buttons: false,
        })
    } else if (product == 0 || pm_amount <= 0 || pm_id == 0) {
        swal({
            title: "แจ้งเตือน",
            text: "กรุณากรอกข้อมูลให้ถูกต้อง",
            icon: "warning",
            buttons: false,
        })
    } else {
        var newRow = list_pm_pro.insertRow(list_pm_pro.length),
            cell0 = newRow.insertCell(0)
        cell1 = newRow.insertCell(1)
        cell2 = newRow.insertCell(2),
            cell3 = newRow.insertCell(3),
            cell4 = newRow.insertCell(4)
        cell0.innerHTML = "<span class='i'></span>";
        cell1.innerHTML = product;
        cell2.innerHTML = txt_pro;
        cell3.innerHTML = pm_amount;
        cell4.innerHTML = "<button id='re' class='btn btn-danger btn-xs my-xs-btn' type='button'data-type='" + i + "'data-dir='" + i + "'><i class='fas fa-trash-alt'></i></button>"
        $(".i").each(function (i) {
            $(this).text(++i);
        });
        $("#sel_product_pro option[value='0']").prop('selected', true);
        $('#pm_amount_pro').val("")
    }



})
$(document).on("click", "#btn_con_pro", function (event) {
    
    var rowCount = $('#list_pm_pro tr').length;
    var pro_id = $('#list_pm_pro td:nth-child(2)').map(function () {
        return $(this).text();
    }).get();
    var amount = $('#list_pm_pro td:nth-child(4)').map(function () {
        return $(this).text();
    }).get();
    var id = $('#sel_promotion').val()
    if (rowCount < 2) {
        swal({
            title: "แจ้งเตือน",
            text: "กรุณาเลือกสินค้าอย่างน้อย 1 อย่าง",
            icon: "warning",
            buttons: false,
        })
    } else {
        $.ajax({
            url: "ajax/setting/insert_pro_dt.php",
            method: "POST",
            async: false,
            data: {
                id: id,
                pro_id: pro_id,
                amount: amount
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
$(document).on("click", "#cancel_all", function (event) {
    var pm_id = $(this).attr('data')
    var pm_name = $(this).attr('pm_name')
    var status = $(this).attr('status')
    if(status==1){
        swal({
            title: "แจ้งเตือน",
            text: "ต้องการยกเลิกชนิดสินค้า : " + pm_name,
            icon: "warning",
            buttons: ['ยกเลิก', 'ยืนยัน'],

        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "ajax/setting/remove_gr.php",
                        method: "POST",
                        async: false,
                        data: {
                            pm_id: pm_id,
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
            text: "ต้องการยกเลิกการระงับชนิดสินค้า : " + pm_name,
            icon: "warning",
            buttons: ['ยกเลิก', 'ยืนยัน'],

        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "ajax/setting/remove_gr.php",
                        method: "POST",
                        async: false,
                        data: {
                            pm_id: pm_id,
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
$(".type_name").change(function () {
    var type_name = $(this).val()

    if (type_name == 0) {
        swal({
            text: "กรุณาเลือกประเภทสินค้า",
            icon: "warning",
            button: false,
        });
    }

})
$("#sel_type").change(function () {
    var type_name = $(this).val()

    if (type_name == 0) {
        swal({
            text: "กรุณาเลือกประเภทสินค้า",
            icon: "warning",
            button: false,
        });
    }

})
