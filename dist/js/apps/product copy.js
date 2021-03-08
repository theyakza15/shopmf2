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
    $(document).on("click", "#cancel", function (event) {
        var status = $(this).attr("status")
        var id = $(this).attr("data_id")
        var st_id = $(this).attr("data_st")
        var name = $(this).attr("data-name")
        if (status == 1) {
            swal({
                title: "แจ้งเตือน",
                text: " ยกเลิกข้อมูลสินค้า : " + name,
                icon: "warning",
                buttons: ["ยกเลิก", "ยืนยัน"],
            })
                .then((willDelete) => {
                    if (willDelete) {
                        //alert(emp_id)
                        $.ajax({
                            url: "ajax/product/remove_product.php",
                            method: "POST",
                            data: {
                                id: id,
                                st_id: st_id,
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
                text: " ยกเลิกการระงับสินค้า " + name,
                icon: "warning",
                buttons: ["ยกเลิก", "ยืนยัน"],
            })
                .then((willDelete) => {
                    if (willDelete) {

                        $.ajax({
                            url: "ajax/product/remove_product.php",
                            method: "POST",
                            data: {
                                id: id,
                                st_id: st_id,
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
    $('.insert').on('submit', function (event) {
        event.preventDefault();
        var pro_name = $('#pro_name').val()
        var price = $('#price').val()
        var sel_group = $('#sel_group').val()
        var sel_dealer = $('#sel_dealer').val()
        var file = $('#in_fileUpload').val()
        if(pro_name ==""){
            swal({
                text: "กรุณากรอกชื่อสินค้า",
                icon: "warning",
                button: false,
            });
        } else if (price <=0 || price==""){
            swal({
                text: "กรุณากรอกราคาสินค้า",
                icon: "warning",
                button: false,
            });
        } else if (sel_group ==0) {
            swal({
                text: "กรุณาเลือกชนิดสินค้า",
                icon: "warning",
                button: false,
            });
        } else if (sel_dealer == 0) {
            swal({
                text: "กรุณาเลือกผู้จัดจำหน่าย",
                icon: "warning",
                button: false,
            });
        } else if (file == "") {
            swal({
                text: "กรุณาเลือกไฟล์รูปภาพ",
                icon: "warning",
                button: false,
            });
        }else{
            $.ajax({
                url: "insert_product.php",
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
                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                }
            })
        }
            
        

    });
    var id_img
    $(document).on("click", "#btn_edit", function (event) {
        id_img = $(this).attr('data')
        //console.log(id_img)
    })
    function readURL2(input) {
       
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#edit_img' + id_img).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $(function () {
        $('.edit_file').checkFileType({
            allowedExtensions: ['png', 'jpg', 'jpeg', 'gif'],
            success: function () {
               
                var filePath = $("#showspan" + id_img);
                var fileName = $('#fileUpload' + id_img).val().split('\\')[$('#fileUpload' + id_img).val().split('\\').length - 1];
                readURL2(this);
            },
            error: function () {
                swal({
                    text: "กรุณาเลือกไฟล์รูปภาพ",
                    icon: "warning",
                    button: false,
                });
            }
        });

    });
    
    $(function () {

        var filePath = $("#showspan" + id_img);
        var image = $(".edit_img");
        image.click(function () {
            $("#fileUpload" + id_img).click();

        });

    });
     $('.Update').on('submit', function (event) {
       
        event.preventDefault();
                   $.ajax({
                url: "update_product.php",
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
                    setTimeout(function () {
                        location.reload();
                    }, 2000); 
                   
                   
                }
            })
        
    }); 
    ///---------------add picture
    (function ($) {
        $.fn.checkFileType = function (options) {
            var defaults = {
                allowedExtensions: [],
                success: function () { },
                error: function () { }
            };
            options = $.extend(defaults, options);

            return this.each(function () {

                $(this).on('change', function () {
                    var value = $(this).val(),
                        file = value.toLowerCase(),
                        extension = file.substring(file.lastIndexOf('.') + 1);

                    if ($.inArray(extension, options.allowedExtensions) == -1) {
                        options.error();
                        $(this).focus();
                    } else {
                        options.success();

                    }

                });

            });
        };

    })(jQuery);
    $(function () {
        $('#in_fileUpload').checkFileType({
            allowedExtensions: ['png', 'jpg', 'jpeg', 'gif'],
            success: function () {
                $(".show_pic").html("");
                $('#spnFilePath').show()
            },
            error: function () {
                swal({
                    text: "กรุณาเลือกไฟล์รูปภาพ",
                    icon: "warning",
                    button: false,
                });
               
            }
        });

    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img_fileupload').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $(function () {
        var fileupload = $("#in_fileUpload");
        var filePath = $("#spnFilePath");
        var image = $("#img_fileupload");
        image.click(function () {
            fileupload.click();
        });
        fileupload.change(function () {
            var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
            readURL(this);

        });
    });
    $(document).on("click", "#btn_update_product", function (event) {

        var id = $(this).attr('data-id')
        var type =$('#sel_type'+id).val()
        var group =$('#sel_gr'+id).val()

   
         if (type== "") {
            swal({
                text: "กรุณาเลือกประเภทสินค้า",
                icon: "warning",
                button: false,
            });
        } else if(group==0){
             swal({
                 text: "กรุณาเลือกชนิดสินค้า",
                 icon: "warning",
                 button: false,
             });
        }else {
            $.ajax({
                url: "ajax/product/update_product.php",
                method: "POST",
                data: {
                    id: id,
                    type :type,
                    group : group
                },
                success: function (data) {
                    //console.log(data) 
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
    $("#pro_name").on("change", function () {
        var elem = $(this).val();
        var sel_dealer = $('#sel_dealer').val()
        var sel_group = $('#sel_group').val()
        if (elem == "") {
            swal({
                text: "กรุณากรอกชื่อสินค้า",
                icon: "warning",
                button: false,
            });
        } else if (sel_dealer==0){
            swal({
                text: "กรุณาเลือกผู้จัดจำหน่าย",
                icon: "warning",
                button: false,
            });
        } else if (sel_group==0){
            swal({
                text: "กรุณาเลือกชนิดสินค้า",
                icon: "warning",
                button: false,
            });
        }else {
            $.ajax({
                url: "ajax/product/check_name_pro.php",
                method: "POST",
                data: {
                    elem: elem,
                    sel_dealer: sel_dealer,
                    sel_group: sel_group
                },
                success: function (data) {
                    console.log(data) 
                    if(data==1){
                        swal({
                            text: "สินค้านี้มีอยู่แล้วกรุณากรอกใหม่อีกครั้ง",
                            icon: "warning",
                            button: false,
                        });
                    }
                  
                    
                }
            });
        }
    });
    $(document).on("change", ".edit_pro_name", function (event) {
        var elem = $(this).val();
        var id = $(this).attr('data-id')
        var sel_dealer = $('#del'+id).val()
        //var sel_group = $('#price'+id).val()
        if (sel_dealer == 0) {
            swal({
                text: "กรุณาเลือกผู้จัดจำหน่าย",
                icon: "warning",
                button: false,
            });
        } else if (sel_group == 0) {
            swal({
                text: "กรุณาเลือกชนิดสินค้า",
                icon: "warning",
                button: false,
            });
        } else {
            $.ajax({
                url: "ajax/product/check_name_pro_edit.php",
                method: "POST",
                data: {
                    elem: elem,
                    sel_dealer: sel_dealer,
                   // sel_group: sel_group
                },
                success: function (data) {
                    console.log(data)
                    if (data == 1) {
                        swal({
                            text: "สินค้านี้มีอยู่แล้วกรุณากรอกใหม่อีกครั้ง",
                            icon: "warning",
                            button: false,
                        });
                    }


                }
            });
        }
    });
    $(".edit_amount").on("change", function () {
        var elem = $(this).val();
        if (!elem.match(/^([0-9 ])+$/i)) {
            swal({
                text: "กรุณากรอกตัวเลข 0-9",
                icon: "warning",
                button: false,
            });
          
        } else if (elem <= 0 ) {
            swal({
                text: "กรุณากรอกจำนวนมากกว่า 0",
                icon: "warning",
                button: false,
            });
          
        }
    });
    $(".ge").on("change", function () {
        var elem = $(this).val();
        if(elem==0){
            swal({
                text: "กรุณาเลือกผู้จัดจำหน่าย",
                icon: "warning",
                button: false,
            });
        }
    });
})
//--------------------------
$(document).on("click", "#btn_show", function (event) {
    var id=$(this).attr('data-id')
    var table = $('#tbl_detail_product').DataTable();
    table.on('order.dt search.dt', function () {
        table.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
    table.destroy();
    var id = $(this).attr('data-id')
    //console.log(id)
    $('#tbl_detail_product').DataTable({
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
            url: "ajax/product/fetch_product.php",
            data: { id: id },
            method: "post",
        }
    })
});

$(document).on("click", "#btn_re", function (event) {
    var id = $(this).attr('data')
    var status = $(this).attr('data-status')
    var name = $(this).attr("data-name")
    if (status == 1) {
        swal({
            title: "แจ้งเตือน",
            text: " ยกเลิกข้อมูลสินค้า : " + name,
            icon: "warning",
            buttons: ["ยกเลิก", "ยืนยัน"],
        })
            .then((willDelete) => {
                if (willDelete) {
                    //alert(emp_id)
                    $.ajax({
                        url: "ajax/product/remove_product.php",
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
            text: " ยกเลิกการระงับสินค้า " + name,
            icon: "warning",
            buttons: ["ยกเลิก", "ยืนยัน"],
        })
            .then((willDelete) => {
                if (willDelete) {

                    $.ajax({
                        url: "ajax/product/remove_product.php",
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

$(document).on("change", "#sel_group", function (event) {
    var id = $(this).val()
    if (id == 0) {
        swal({

            text: "กรุณาเลือกชนิดสินค้า",
            icon: "warning",
            button: false,
        });
    }
})
$(document).on("change", "#sel_dealer", function (event) {
    var id = $(this).val()
    if (id == 0) {
        swal({

            text: "กรุณาเลือกผู้จัดจำหน่าย",
            icon: "warning",
            button: false,
        });
    }
})