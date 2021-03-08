
///------------------------------ 
$("#add_type").click(function () {
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
            url: "ajax/setting/insert_type.php", //ไฟล์ที่ต้องส่งค่าไป
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


$("#add_group").click(function () {
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

$("#addsize").click(function () {
    var size_id = $('#si_id').val()
    var size_name = $('#si_name').val()
    
    if (size_name == '') {
        swal({
            text: "กรุณากรอกข้อมูลให้ถูกต้อง",
            icon: "warning",
            button: false,
        });
    } else {
        $.ajax({
            url: "ajax/setting/insert_size.php", //ไฟล์ที่ต้องส่งค่าไป
            method: "POST",
            data: {
                size_id: size_id,
                size_name: size_name

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


$("#addcolor").click(function () {
    var color_id = $('#co_id').val()
    var color_name = $('#co_name').val()
    
    if (color_name == '') {
        swal({
            text: "กรุณากรอกข้อมูลให้ถูกต้อง",
            icon: "warning",
            button: false,
        });
    } else {
        $.ajax({
            url: "ajax/setting/insert_color.php", //ไฟล์ที่ต้องส่งค่าไป
            method: "POST",
            data: {
                color_id: color_id,
                color_name: color_name

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

/* adddis */


$("#adddis").click(function () {
    var dis_id = $('#dis_id').val()
    var dis_name = $('#dis_name').val()
    var dis_proname = $('#add_prodis').val()
    var dis_am = $('#am_dispro').val()
    
    if (dis_name == '') {
        swal({
            text: "กรุณากรอกข้อมูลให้ถูกต้อง",
            icon: "warning",
            button: false,
        });
    } else {
        $.ajax({
            url: "ajax/setting/insert_dis.php", //ไฟล์ที่ต้องส่งค่าไป
            method: "POST",
            data: {
                dis_id: dis_id,
                dis_name: dis_name,
                dis_proname: dis_proname,
                dis_am:dis_am

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








$(document).on("click", "#cancel_type", function (event) {
    var ty_id = $(this).attr('data')
    var ty_name = $(this).attr('ty_name')
    var status = $(this).attr('status')
    if(status==1){
        swal({
            title: "แจ้งเตือน",
            text: "ต้องการยกเลิกประเภทสินค้า : " + ty_name,
            icon: "warning",
            buttons: ['ยกเลิก', 'ยืนยัน'],

        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "ajax/setting/remove_type.php",
                        method: "POST",
                        async: false,
                        data: {
                            ty_id: ty_id,
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
            text: "ต้องการยกเลิกการระงับประเภทสินค้า : " + ty_name,
            icon: "warning",
            buttons: ['ยกเลิก', 'ยืนยัน'],

        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "ajax/setting/remove_type.php",
                        method: "POST",
                        async: false,
                        data: {
                            ty_id: ty_id,
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


/* ยกเลิก group */

$(document).on("click", "#cancel_gr", function (event) {
    var gr_id = $(this).attr('data')
    var gr_name = $(this).attr('gr_name')
    var status = $(this).attr('status')
    
    if(status==1){
        swal({
            title: "แจ้งเตือน",
            text: "ต้องการยกเลิกชนิดสินค้า : " + gr_name,
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
                            gr_id: gr_id,
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
            text: "ต้องการยกเลิกการระงับชนิดสินค้า : " + gr_name,
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
                            gr_id: gr_id,
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


/* ยกเลิก Size */


$(document).on("click", "#cancel_si", function (event) {
    var si_id = $(this).attr('data')
    var si_name = $(this).attr('si_name')
    var status = $(this).attr('status')
    
    if(status==1){
        swal({
            title: "แจ้งเตือน",
            text: "ต้องการยกเลิกข้อมูล Size : " + si_name,
            icon: "warning",
            buttons: ['ยกเลิก', 'ยืนยัน'],

        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "ajax/setting/remove_size.php",
                        method: "POST",
                        async: false,
                        data: {
                            si_id: si_id,
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
            text: "ต้องการยกเลิกการระงับข้อมูล Size : " + si_name,
            icon: "warning",
            buttons: ['ยกเลิก', 'ยืนยัน'],

        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "ajax/setting/remove_size.php",
                        method: "POST",
                        async: false,
                        data: {
                            si_id: si_id,
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





/* ยกเลิกcolor */


$(document).on("click", "#cancel_color", function (event) {
    var co_id = $(this).attr('data')
    var co_name = $(this).attr('co_name')
    var status = $(this).attr('status')
    
    if(status==1){
        swal({
            title: "แจ้งเตือน",
            text: "ต้องการยกเลิกข้อมูลสี : " + co_name,
            icon: "warning",
            buttons: ['ยกเลิก', 'ยืนยัน'],

        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "ajax/setting/remove_color.php",
                        method: "POST",
                        async: false,
                        data: {
                            co_id: co_id,
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
            text: "ต้องการยกเลิกการระงับข้อมูลสี : " + co_name,
            icon: "warning",
            buttons: ['ยกเลิก', 'ยืนยัน'],

        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "ajax/setting/remove_color.php",
                        method: "POST",
                        async: false,
                        data: {
                            co_id: co_id,
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


/* update type */


$(document).on("click", "#btn_update_type", function (event) {

    var ty_id = $(this).attr('data-id')
    var ty_name = $('#ty_name' + ty_id).val()
    

    if (ty_name == '') {
        swal({
            text: "กรุณากรอกประเภทสินค้า",
            icon: "warning",
            button: false,
        });
     
    }else {
        $.ajax({
            url: "ajax/setting/update_type.php",
            method: "POST",
            data: {
                ty_id:ty_id,
                ty_name:ty_name,
                

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



/* อัพเดต group */

$(document).on("click", "#btn_update_gr", function (event) {

    var gr_id = $(this).attr('data-id')
    var gr_name = $('#gr_name' + gr_id).val()
    var gr_type = $('#gr_type'+ gr_id).val()

    if (gr_name == '') {
        swal({
            text: "กรุณากรอกชนิดสินค้า",
            icon: "warning",
            button: false,
        });
    }else if(gr_type == ''){
        swal({
            text: "กรุณากรอกประเภทสินค้า",
            icon: "warning",
            button: false,
        });
    }else{
        $.ajax({
            url: "ajax/setting/update_group.php",
            method: "POST",
            data: {
                gr_id:gr_id,
                gr_name:gr_name,
                gr_type:gr_type,
                

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


/* update size */

$(document).on("click", "#btn_update_size", function (event) {

    var si_id = $(this).attr('data-id')
    var si_name = $('#si_name' + si_id).val()
    

    if (si_name == '') {
        swal({
            text: "กรุณากรอก Size",
            icon: "warning",
            button: false,
        });
     
    }else {
        $.ajax({
            url: "ajax/setting/update_size.php",
            method: "POST",
            data: {
                si_id:si_id,
                si_name:si_name,
                

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

/* update color */ 

$(document).on("click", "#btn_update_color", function (event) {

    var co_id = $(this).attr('data-id')
    var co_name = $('#co_name' + co_id).val()
    

    if (co_name == '') {
        swal({
            text: "กรุณากรอกชื่อสี",
            icon: "warning",
            button: false,
        });
     
    }else {
        $.ajax({
            url: "ajax/setting/update_color.php",
            method: "POST",
            data: {
                co_id:co_id,
                co_name:co_name,
                

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


/* เช็ค type  */


$("#type_name").change(function () {
    var type_name = $(this).val()
    
        $.ajax({
            url: "ajax/setting/check_name_type.php",
            method: "POST",
            data: {
                type_name : type_name

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



/* เช็คกลุ่มสินค้า */


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
            console.log(data)
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
///------------------ check_gr_name_edit
$(document).on("change", ".check-gr-name", function (event) {
    var id=$(this).attr('data-id')
    var gr_name = $(this).val()
    var type = $('#gr_type'+id).val()
    $.ajax({
        url: "ajax/setting/check_gr_name.php",
        method: "POST",
        data: {
            gr_name: gr_name,
            type: type

        },
        success: function (data) {
            console.log(data)
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


/* เช็คsize */


$("#si_name").change(function () {
    var si_name = $(this).val()
    
        $.ajax({
            url: "ajax/setting/check_size_name.php",
            method: "POST",
            data: {
                si_name : si_name

            },
            success: function (data) {
                if(data==1){
                    swal({
                        text: "ข้อมูลนี้มีอยุ่แล้วกรุณากรอกใหม่อีกครั้ง",
                        icon: "warning",
                        button: false,
                    });
                    $('#si_name').val("")
                    $('#si_name').focus()
                }
               
            }
        });

    
})
///------------------ check_type_name_edit
$(".check-size-name").change(function () {
    var si_name = $(this).val()
    
    $.ajax({
        url: "ajax/setting/check_size_name.php",
        method: "POST",
        data: {
            si_name: si_name

        },
        success: function (data) {
            if (data == 1) {
                swal({
                    text: "ข้อมูลนี้มีอยุ่แล้วกรุณากรอกใหม่อีกครั้ง",
                    icon: "warning",
                    button: false,
                });
                
            }

        }
    });


})

/* เช็ค color */
$("#co_name").change(function () {
    var co_name = $(this).val()
    
        $.ajax({
            url: "ajax/setting/check_color_name.php",
            method: "POST",
            data: {
                co_name : co_name

            },
            success: function (data) {
                if(data==1){
                    swal({
                        text: "ข้อมูลสีนี้มีอยุ่แล้วกรุณากรอกใหม่อีกครั้ง",
                        icon: "warning",
                        button: false,
                    });
                    $('#co_name').val("")
                    $('#co_name').focus()
                }
               
            }
        });

    
})
///------------------ check_type_name_edit
$(".check-color-name").change(function () {
    var co_name = $(this).val()
    
    $.ajax({
        url: "ajax/setting/check_color_name.php",
        method: "POST",
        data: {
            co_name: co_name

        },
        success: function (data) {
            if (data == 1) {
                swal({
                    text: "ข้อมูลสีนี้มีอยุ่แล้วกรุณากรอกใหม่อีกครั้ง",
                    icon: "warning",
                    button: false,
                });
                
            }

        }
    });


})

/* แก้ไขส่วนลด */ 
$(document).on("click", "#btn_update_dis", function (event) {

    var dis_id = $(this).attr('data-id')
    var dis_name = $('#edit_dis_name' + dis_id).val()
    var dis_pro_dis = $('#dispro_edit' + dis_id).val()
    var dis_am_dis = $('#edit_dis_am' + dis_id).val()


    if (dis_name == '') {
        swal({
            text: "กรุณากรอกประเภทสินค้า",
            icon: "warning",
            button: false,
        });
     
    }else {
        $.ajax({
            url: "ajax/setting/update_dis.php",
            method: "POST",
            data: {
                dis_id:dis_id,
                dis_name:dis_name,
                dis_pro_dis:dis_pro_dis,
                dis_am_dis :dis_am_dis
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

/* ลบส่วนลด */
$(document).on("click", "#cancel_dis", function (event) {
    var dis_id = $(this).attr('data')
    var dis_name = $(this).attr('dis_name')
    var status = $(this).attr('status')
    if(status==1){
        swal({
            title: "แจ้งเตือน",
            text: "ต้องการยกเลิกประเภทสินค้า : " + dis_name,
            icon: "warning",
            buttons: ['ยกเลิก', 'ยืนยัน'],

        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "ajax/setting/remove_dis.php",
                        method: "POST",
                        async: false,
                        data: {
                            dis_id: dis_id,
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
            text: "ต้องการยกเลิกการระงับประเภทสินค้า : " + dis_name,
            icon: "warning",
            buttons: ['ยกเลิก', 'ยืนยัน'],

        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "ajax/setting/remove_dis.php",
                        method: "POST",
                        async: false,
                        data: {
                            dis_id: dis_id,
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


/* เช็คส่วนลด */

$("#dis_name").change(function () {
    var dis_ckname = $(this).val()
    var dis_ck_pd = $('#add_prodis').val()
    var dis_ck_am = $('#am_dispro').val()
    
        $.ajax({
            url: "ajax/setting/check_name_dis.php",
            method: "POST",
            data: {
                dis_ckname : dis_ckname,
                dis_ck_pd :dis_ck_pd,
                dis_ck_am :dis_ck_am
            },
            success: function (data) {
                console.log(data)
                if(data==1){
                    swal({
                        text: "ส่วนนี้มีอยุ่แล้วกรุณากรอกใหม่อีกครั้ง",
                        icon: "warning",
                        button: false,
                    });
                    $('#dis_name').val("")
                    $('#dis_name').focus()
                }
               
            }
        });

    
})

$(".check-dis-name").change(function () {
    var id=$(this).attr('data-id')
    var dis_ckname = $(this).val()
    var dis_ck_pd = $('#dispro_edit'+id).val()
    var dis_ck_am = $('#edit_dis_am'+id).val()
    
    $.ajax({
        url: "ajax/setting/check_name_dis.php",
        method: "POST",
        data: {
            dis_ckname: dis_ckname,
            dis_ck_pd:dis_ck_pd,
            dis_ck_am:dis_ck_am
        },
        success: function (data) {
            console.log(data)
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









/* ตารางค้นหา */
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

var tbl_pro = $('#promotion1').DataTable({
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

var tbl_pro = $('#promotion2').DataTable({
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

var tbl_pro = $('#dis23').DataTable({
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