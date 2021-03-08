$('.insert_product').on('submit', function (event) {
        var pro_name = $('#pro_name').val()
        var file = $('#upload_product').val()
        
    event.preventDefault();
     if (pro_name == "") {
        swal({
            text: "กรุณากรอกชื่อสินค้า",
            icon: "warning",
            button: false,
        });
    } else if (file == "") {
        swal({
            text: "กรุณาเลือกไฟล์รูปภาพ",
            icon: "warning",
            button: false,
        });
    } else{
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
     } );


    /* addsize */ 
    $("#add_pro_size").click(function () {
        var size_id = $('#hd_size_id').val()
        var size_name = $('#size_product').val()
        var price = $('#price_pro').val()
        if (size_name == '') {
            swal({
                text: "กรุณากรอกข้อมูลให้ถูกต้อง",
                icon: "warning",
                button: false,
            });
        } else {
            $.ajax({
                url: "ajax/product/insert_product_size.php", //ไฟล์ที่ต้องส่งค่าไป
                method: "POST",
                data: {
                    size_id: size_id,
                    size_name: size_name,
                    price : price,
                    runpdidsize : runpdidsize
                },
                success: function (data) {
                    console.log(data) 
                    swal({
                        text: "บันทึกข้อมูลเรียบร้อย",
                        icon: "success",
                        button: false,
                    });
                    /* setTimeout(function () {
                        location.reload();
                    }, 2000); */  
                }
            });
    
        }
    })
 
    $("#add_pro_color").click(function () {
        var color_id = $('#hd_color_id').val()
        var color_name = $('#color_product').val()
        
        if (color_name == '') {
            swal({
                text: "กรุณากรอกข้อมูลให้ถูกต้อง",
                icon: "warning",
                button: false,
            });
        } else {
            $.ajax({
                url: "ajax/product/insert_product_color.php", //ไฟล์ที่ต้องส่งค่าไป
                method: "POST",
                data: {
                    color_id: color_id,
                    color_name: color_name,
                    run_colordet : run_colordet
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

/* แก้ไขสินค้า */
$('.edit_product').on('submit', function (event) {
    event.preventDefault();
    /* var id_edit = $(this).attr('data') */
    var editpro_name  = $('#edit_pro_name').val()
    var edit_gr = $('#edit_group_product').val()
   
    
    if(edit_gr ==""){
        swal({
            text: "กรุณาเลือกกลุ่มสินค้า",
            icon: "warning",
            button: false,
        });
    }else if (editpro_name==""){
        swal({
            text: "กรุณากรอกชื่อสินค้า",
            icon: "warning",
            button: false,
        });
    }
    else{
       $.ajax({
        url: "ajax/product/update_product.php",
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


var editsize_id
/* แก้ไขSIza */
$(document).on("click", "#edit_pro_size", function (event) {

    var editsize_name = $('#edit_size_product' ).val()
    var editprice = $('#edit_price_pro').val()

    if (editsize_name == '') {
        swal({
            text: "กรุณากรอกประเภทสินค้า",
            icon: "warning",
            button: false,
        });
     
    } else if (editprice == "") {
        swal({
            text: "กรุณากรอกราคา",
            icon: "warning",
            button: false,
        });
    }
    else {
        $.ajax({
            url: "ajax/product/update_size.php",
            method: "POST",
            data: {
                editsize_id:editsize_id,
                editsize_name:editsize_name,
                editprice:editprice

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

/* แก้ไขสี */
var editcolor_id
$(document).on("click", "#edit_pro_color", function (event) {

    var editcolor_name = $('#edit_color_product' ).val()
    

    if (editcolor_name == '') {
        swal({
            text: "กรุณาเลือกสี",
            icon: "warning",
            button: false,
        }); 
    }
    else {
        $.ajax({
            url: "ajax/product/update_color.php",
            method: "POST",
            data: {
                editcolor_name:editcolor_name,
                editcolor_id:editcolor_id
               
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

//เช็คสินค้า
$("#add_pro").click(function () {
    $("#pro_name").val()
})


var group_id
$("#pro_name").change(function () {
    var pro_name = $(this).val()

    $.ajax({
        url: "ajax/product/check_namepro.php",
        method: "POST",
        data: {
            pro_name:pro_name,
            group:group_id

        },
        success: function (data) {
            console.log(data)
            if (data == 1) {
                swal({
                    text: "สินค้านี้มีอยุ่แล้วกรุณากรอกใหม่อีกครั้ง",
                    icon: "warning",
                    button: false,
                });
                $('#pro_name').val("")
                $('#pro_name').focus()
            }

        }
    });


})
///------------------ check_gr_name_edit
$(document).on("change", ".edit_check", function (event) {
    var pro_name = $(this).val()
    var group = $('#edit_group_product').val()
    $.ajax({
        url: "ajax/product/check_namepro.php",
        method: "POST",
        data: {
            pro_name: pro_name,
            group: group

        },
        success: function (data) {
            console.log(data)
            if (data == 1) {
                swal({
                    text: "สินค้านี้มีอยุ่แล้วกรุณากรอกใหม่อีกครั้ง",
                    icon: "warning",
                    button: false,
                });
            }

        }
    });

    
})

//เช็ค SIze
var idpd
$("#size_product").change(function () {
    var size_name = $(this).val()
    
    $.ajax({
        url: "ajax/product/check_size.php",
        method: "POST",
        data: {
            size_name: size_name,
            idpd:idpd

        },
        success: function (data) {
            console.log(data)
            if (data == 1) {

                swal({
                    text: "ขนาดสินค้านี้มีอยุ่แล้วกรุณากรอกใหม่อีกครั้ง",
                    icon: "warning",
                    button: false,
                });
                
                $('#size_name').val("")
                $('#size_name').focus()
            }

        }
    });


})

$(document).on("change", ".checksize", function (event) {
    var size_name = $(this).val()
    
    $.ajax({
        url: "ajax/product/check_size.php",
        method: "POST",
        data: {
            size_name: size_name,
             idpd:idpd 

        },
        success: function (data) {
            console.log(data)
            if (data == 1) {
                swal({
                    text: "ขนาดสินค้านี้มีอยุ่แล้วกรุณากรอกใหม่อีกครั้ง",
                    icon: "warning",
                    button: false,
                });
            }

        }
    });

    
})

//เช็คสี
var id_colorcheck
$("#color_product").change(function () {
    var color_name = $(this).val()
    
    $.ajax({
        url: "ajax/product/check_color.php",
        method: "POST",
        data: {
            color_name: color_name,
            id_colorcheck:id_colorcheck

        },
        success: function (data) {
            console.log(data)
            if (data == 1) {

                swal({
                    text: "สีนี้มีอยุ่แล้วกรุณากรอกใหม่อีกครั้ง",
                    icon: "warning",
                    button: false,
                });
                
                $('#color_name').val("")
                $('#color_name').focus()
            }

        }
    });


})
 
$(document).on("change", ".checkcolor", function (event) {
    var color_name = $(this).val()
    
    $.ajax({
        url: "ajax/product/check_color.php",
        method: "POST",
        data: {
            color_name: color_name,
            id_colorcheck:id_colorcheck

        },
        success: function (data) {
            console.log(data)
            if (data == 1) {
                swal({
                    text: "สีนี้มีอยุ่แล้วกรุณากรอกใหม่อีกครั้ง",
                    icon: "warning",
                    button: false,
                });
            }

        }
    });

    
})


     /* ยกเลิกสินค้า */

     $(document).on("click", "#cancel_pro", function (event) {
        var pd_id = $(this).attr('data-id')
        var pd_name = $(this).attr('data-name')
        var status = $(this).attr('data-status')
        
        if(status==1){
            swal({
                title: "แจ้งเตือน",
                text: "ต้องการยกเลิกชนิดสินค้า : " + pd_name,
                icon: "warning",
                buttons: ['ยกเลิก', 'ยืนยัน'],
    
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "ajax/product/remove_product.php",
                            method: "POST",
                            async: false,
                            data: {
                                pd_id: pd_id,
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
                text: "ต้องการยกเลิกการระงับชนิดสินค้า : " + pd_name,
                icon: "warning",
                buttons: ['ยกเลิก', 'ยืนยัน'],
    
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "ajax/product/remove_product.php",
                            method: "POST",
                            async: false,
                            data: {
                                pd_id: pd_id,
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

    /* ยกเลิกsize */
    $(document).on("click", "#cancel_size", function (event) {
        var pd_id_det = $(this).attr('data-id')
        var si_name = $(this).attr('data-name')
        var status = $(this).attr('data-status')
        
        if(status==1){
            swal({
                title: "แจ้งเตือน",
                text: "ต้องการยกเลิกชนิดสินค้า : " + si_name,
                icon: "warning",
                buttons: ['ยกเลิก', 'ยืนยัน'],
    
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "ajax/product/remove_product_detail.php",
                            method: "POST",
                            async: false,
                            data: {
                                pd_id_det: pd_id_det,
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
                text: "ต้องการยกเลิกการระงับชนิดสินค้า : " + si_name,
                icon: "warning",
                buttons: ['ยกเลิก', 'ยืนยัน'],
    
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "ajax/product/remove_product_detail.php",
                            method: "POST",
                            async: false,
                            data: {
                                pd_id_det: pd_id_det,
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
/* ยกเลิกสี */

    $(document).on("click", "#cancel_color", function (event) {
        var co_id_det = $(this).attr('data-id')
        var co_name = $(this).attr('data-name')
        var status = $(this).attr('data-status')
        
        if(status==1){
            swal({
                title: "แจ้งเตือน",
                text: "ต้องการยกเลิกชนิดสินค้า : " + co_name,
                icon: "warning",
                buttons: ['ยกเลิก', 'ยืนยัน'],
    
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "ajax/product/remove_color_detail.php",
                            method: "POST",
                            async: false,
                            data: {
                                co_id_det: co_id_det,
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
                text: "ต้องการยกเลิกการระงับชนิดสินค้า : " + co_name,
                icon: "warning",
                buttons: ['ยกเลิก', 'ยืนยัน'],
    
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "ajax/product/remove_color_detail.php",
                            method: "POST",
                            async: false,
                            data: {
                                co_id_det: co_id_det,
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





      
    /* viewpro */
var group_id
    $(document).on("click", "#pro_view", function (event) {
        var pd_id = $(this).attr('data')
        var table = $('#tb_pro_view').DataTable();   
        table.destroy();
        load_data_detail(pd_id)
        group_id=pd_id
        console.log(pd_id)
        $('#hd_group_name').val(pd_id)
        $.ajax({
            url: "ajax/product/get_product_id.php",
            method: "POST",
            async: false,
            data: {
                pd_id: pd_id
            },
            success: function (data) {
                console.log(data)
                $('#product_id').val(data)
            }
        });
    })
    //edit_prodcut
     $(document).on("click", "#btn_edit_product", function (event) {
        var pd_id = $(this).attr('data')
        console.log(pd_id)
         $.ajax({
            url: "ajax/product/get_edit_product.php",
            method: "POST",
            async: false,
            data: {
                pd_id: pd_id
            },
            success: function (data) {
                console.log(data)
               var  obj = JSON.parse(data);
               console.log(obj)
               var pd_id =obj.pd_id
               var pd_name=obj.pd_name
               var pd_group=obj.pd_group
               console.log(pd_id)
               $('#edit_img_fileupload').attr("src", 'images/'+obj.pd_pic);
               $('#edit_product_id').val(pd_id)
               $('#edit_pro_name').val(pd_name)
               $("select option[value='"+pd_group+"']").attr("selected","selected");
               
            }
        }); 
    }) 

    function load_data_detail(id){
        var t = $('#tb_pro_view').DataTable({
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


                "infoFiltered": "( คำที่ค้นหา _TOTAL_จาก _MAX_ รายการ  ) ",

            },
            "ajax": {
                url: "ajax/product/dataproduct.php",
                type: "post",
                "data": function (d) {
                    d.extra_search = id 
                    

                }

            }
        })
        t.on('order.dt search.dt', function () {
            t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    }

    /* viewsize */
var runpdidsize 
var idpd
     $(document).on("click", "#size_view", function (event) {
        var pd_id = $(this).attr('data')
        var table = $('#tb_size_view').DataTable();
        
        idpd=pd_id
        table.destroy();
        load_data_size(pd_id)
        runpdidsize = pd_id
         $('#hd_pd_id').val(pd_id) 
        $.ajax({
            url: "ajax/product/get_size_id.php",
            method: "POST",
            async: false,
            data: {
                size_id: pd_id
            },
            success: function (data) {
                console.log(data)
                 $('#hd_size_id').val(data)

            }
        });
    })

  var editsize_id  
    $(document).on("click", "#btn_edit_size", function (event) {
        var pd_id = $(this).attr('data')
        var size = $(this).attr('data_size')
        
        editsize_id = pd_id
        
        console.log(pd_id)
         $.ajax({
            url: "ajax/product/get_edit_product_size.php",
            method: "POST",
            async: false,
            data: {
                pd_id: pd_id,
                size:size
            },
            success: function (data) {
                console.log(data)
               var  obj = JSON.parse(data);
               console.log(obj)
               var pd_id =obj.pd_id
               var det_size=obj.det_size
               var price=obj.price
                
               console.log(pd_id)
               $('#edit_hd_pd_id').val(pd_id)
               $('#edit_price_pro').val(price)
               $("#edit_size_product option[value='" + det_size + "']").prop("selected", true);
            }
        }); 
    }) 

    function load_data_size(id){
        var t = $('#tb_size_view').DataTable({
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


                "infoFiltered": "( คำที่ค้นหา _TOTAL_จาก _MAX_ รายการ  ) ",

            },
            "ajax": {
                url: "ajax/product/data_size.php",
                type: "post",
                "data": function (d) {
                    d.extra_search = id 
                    

                }

            }
        })
        t.on('order.dt search.dt', function () {
            t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    }
 
/* viewcolor */
var run_colordet
var id_colorcheck

$(document).on("click", "#color_view", function (event) {
    var id_pd_det = $(this).attr('data')
    var table = $('#tb_color_view').DataTable();
    
    table.destroy();
    load_data_color(id_pd_det)
    run_colordet = id_pd_det
    id_colorcheck=id_pd_det
    
    $('#hd_pd_iddet').val(id_pd_det) 
        $.ajax({
            url: "ajax/product/get_color_id.php",
            method: "POST",
            async: false,
            data: {
                id_pd_det: id_pd_det
                
            },
            success: function (data) {
                console.log(data)
                $('#hd_color_id').val(data)
            }
        });
})


var editcolor_id

$(document).on("click", "#btn_edit_color", function (event) {
    var pd_id = $(this).attr('data')
    var color = $(this).attr('data_color')
    console.log(pd_id)
    editcolor_id =pd_id
     $.ajax({
        url: "ajax/product/get_edit_product_color.php",
        method: "POST",
        async: false,
        data: {
            pd_id: pd_id,
            color:color
        },
        success: function (data) {
            console.log(data)
           var  obj = JSON.parse(data);
           console.log(obj)
           var pd_id =obj.pd_id
           var id_color=obj.id_color
           console.log(pd_id)
           $('#edit_hd_pd_iddet').val(pd_id)
           $("#edit_color_product option[value='" + id_color + "']").prop("selected", true);
        }
    }); 
}) 

function load_data_color(id){
    var t = $('#tb_color_view').DataTable({
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


            "infoFiltered": "( คำที่ค้นหา _TOTAL_จาก _MAX_ รายการ  ) ",

        },
        "ajax": {
            url: "ajax/product/data_color.php",
            type: "post",
            "data": function (d) {
                d.extra_search = id 
                

            }

        }
    })
    t.on('order.dt search.dt', function () {
        t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
}





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

    var t = $('#tb_product_mg').DataTable({
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