$(document).ready(function () {
    var t = $('#tbl_product').DataTable({
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
    $(document).on("change", "#type_name", function (event) {
        var name = $(this).val()
        $.ajax({
            url: "ajax/dealer/check_del_name.php",
            method: "POST",
            data: {
                name: name
            },
            success: function (data) {
                if (data == 1) {
                    swal({
                        text: "ชื่อผู้จัดจำหน่ายนี้มีอยู่แล้วกรุณากรอกใหม่อีกครั้ง",
                        icon: "warning",
                        button: false,
                    });
                    $('#type_name').val("")
                    $('#type_name').focus()
                }
                
            }
        });
    })
    $(document).on("change", ".edit-name", function (event) {
        var name = $(this).val()
        $.ajax({
            url: "ajax/dealer/check_del_name.php",
            method: "POST",
            data: {
                name: name
            },
            success: function (data) {
                if (data == 1) {
                    swal({
                        text: "ชื่อผู้จัดจำหน่ายนี้มีอยู่แล้วกรุณากรอกใหม่อีกครั้ง",
                        icon: "warning",
                        button: false,
                    });
                   
                }

            }
        });
    })
    $("#btn_add").click(function () {
        var type_id = $('#type_id').val()
        var type_name = $('#type_name').val()
        if (type_name == '') {
            swal({
                text: "กรุณากรอกข้อมูลให้ถูกต้อง",
                icon: "warning",
                button: false,
            });
        } else {
            $.ajax({
                url: "ajax/dealer/insert_del.php",
                method: "POST",
                data: {
                    type_id: type_id,
                    type_name: type_name

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
    //----------------------------------------------
    $(document).on("click", "#btn_update_product", function (event) {

        var id = $(this).attr('data-id')
        var name = $('#del_name' + id).val()


        if (name == '') {
            swal({
                text: "กรุณากรอกข้อมูลให้ถูกต้อง",
                icon: "warning",
                button: false,
            });
        } else {
            $.ajax({
                url: "ajax/dealer/update_del.php",
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
    //----------------------------------------------
    //-----------------remove-----------------------
    $(document).on("click", "#cancel", function (event) {
        var status = $(this).attr("status")
        var id = $(this).attr("data_id")
        var name = $(this).attr("data-name")
        if (status == 1) {
            swal({
                title: "แจ้งเตือน",
                text: " ยกเลิกผู้จัดจำหน่าย : " + name,
                icon: "warning",
                buttons: ["ยกเลิก", "ยืนยัน"],
            })
                .then((willDelete) => {
                    if (willDelete) {
                        //alert(emp_id)
                        $.ajax({
                            url: "ajax/dealer/remove_del.php",
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
                text: " ยกเลิกการระงับผู้จัดจำหน่าย : " + name,
                icon: "warning",
                buttons: ["ยกเลิก", "ยืนยัน"],
            })
                .then((willDelete) => {
                    if (willDelete) {

                        $.ajax({
                            url: "ajax/dealer/remove_del.php",
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
    //----------------------------------------------
})