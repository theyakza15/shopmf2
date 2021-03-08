$(document).ready(function() {
    $("#type_product").change(function() {
        var id = $(this).val()
           
        if (id == '0') {
            swal({
                text: "กรุณากรอกข้อมูลให้ถูกต้อง",
                icon: "warning",
                button: false,
            });
        } else {
         $.ajax({
            url: "ajax/stock/get_group.php",
            method: "POST",
            data: {
                id: id

            },
            success: function(data) {
                console.log(data)
                $('#group_product').html(data)

            }
        });   
        }
    })
    $("#group_product").change(function() {
        var id = $(this).val()
        if (id == '0') {
            swal({
                text: "กรุณากรอกข้อมูลให้ถูกต้อง",
                icon: "warning",
                button: false,
            });
        } else{
         $.ajax({
            url: "ajax/stock/get_product.php",
            method: "POST",
            data: {
                id: id

            },
            success: function(data) {
                console.log(data)
                $('#product_name').html(data)

            }
        });   
        }
        


    })
    $("#product_name").change(function() {
        var id = $(this).val()
        if (id == '0') {
            swal({
                text: "กรุณากรอกข้อมูลให้ถูกต้อง",
                icon: "warning",
                button: false,
            });
        } else{
          $.ajax({
            url: "ajax/stock/get_size.php",
            method: "POST",
            data: {
                id: id

            },
            success: function(data) {
                console.log(data)
                $('#size_product').html(data)

            }
        });  
        }
        


    })
    $("#size_product").change(function() {
        var id = $(this).val()
        if (id == '0') {
            swal({
                text: "กรุณากรอกข้อมูลให้ถูกต้อง",
                icon: "warning",
                button: false,
            });
        } else{
         $.ajax({
            url: "ajax/stock/fetch_product.php",
            method: "POST",
            data: {
                extra_search: id

            },
            success: function(data) {
                console.log(data)


            }
        });   
        }
        
        load_mat_select(id)
    })

    function load_mat_select(id) {
        var table = $('#tb_product').DataTable();
        table.destroy();
        var t = $('#tb_product').DataTable({
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
                url: "ajax/stock/fetch_product.php",
                type: "post",
                "data": function(d) {
                    d.extra_search = id
                }

            }
        })

    }
    $(document).on("click", ".checkbox", function(event) {

        var id_type = $(this).val();
        if ($(this).is(':checked')) {
            $('#num' + id_type).attr('disabled', false)
        } else {
            $('#num' + id_type).attr('disabled', true)
            $('#num' + id_type).val('')
        }

        //$("#btn_con").attr("disabled", true);
    });
    $(document).on("click", "#btn_add_list", function(event) {
        var list = []
        var l1 = $('#tb_product_list td:nth-child(2)').map(function() {
            /* '#list_make td:nth-child(2)' จับแถวที่ 2 */
            return $(this).text();
        }).get();
        $('.checkbox:checked').each(function(i) {
            var number = "<span class='i'></span>";
            var md_id = $(this).val()
            var md_name = $(this).data("name");
            var unit_name = $(this).data("color");
            var amount = $('#num' + md_id).val()
            var button = "<button id='re' class='btn btn-danger btn-xs my-xs-btn' type='button'><i class='fas fa-trash-alt'></i></button>"
            if ($.inArray(md_id, l1) >= 0) {
                swal({
                    text: "มีสินค้านี้อยู่แล้ว",
                    icon: "warning",
                    button: false,
                });
                return false
            } else {
                if (amount <= 0) {
                    swal({
                        text: "กรุณากรอกจำนวนมากกว่า 0",
                        icon: "warning",
                        button: false,
                    });
                    return false
                } else {
                    table2.row.add([
                        number,
                        md_id,
                        md_name,
                        unit_name,
                        amount,
                        button,

                    ]).draw(false);
                }
                $(".i").each(function(i) {
                    $(this).text(++i);
                });
            }
        });

    })
    var table2 = $('#tb_product_list').DataTable({
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

        }

    })
    table2.on('order.dt search.dt', function() {
        table2.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
    $(document).on("click", "#re", function(event) {
        table2
            .row($(this).parents('tr'))
            .remove()
            .draw();

        $(".i").each(function(i) {
            $(this).text(++i);
        });
    });
    $(document).on("click", "#btn_save", function(event) {
        var date_stock = $('#date_stock').val()
        var l1 = $('#tb_product_list td:nth-child(2)').map(function() {
            return $(this).text();
        }).get();
        var amonut = $('#tb_product_list td:nth-child(5)').map(function() {
            return $(this).text();
        }).get();
        if (l1.length == 0) {
            swal({
                text: "กรุณากรอกข้อมูลให้ครบถ้วน",
                icon: "warning",
                button: false,
            });
        } else {
            $.ajax({
                url: "ajax/stock/insert_stock.php",
                method: "POST",
                data: {
                    l1: l1,
                    amonut: amonut,
                    date_stock: date_stock
                },
                success: function(data) {
                    console.log(data)
                    swal({
                        text: "บันทึกข้อมูลเรียบร้อย",
                        icon: "success",
                        button: false,
                    });
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                }


            });
        }
    })
    $("#date_stock").change(function() {
        var date = $(this).val()
        var cur_date = new Date()
        var con_date = new Date(date)
        if (con_date > cur_date) {
            swal({
                text: "กรุณาเลือกวันที่ให้ถูกต้อง",
                icon: "warning",
                button: false,
            });
            $('#date_stock').val("")
            return false
        }
    })
    load_main_stock()

    function load_main_stock() {
        var t = $('#tb_stock').DataTable({
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
                url: "ajax/stock/fetch_stock.php",
                type: "post"
            }
        })
        t.on('order.dt search.dt', function() {
            t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    }
    $(document).on("click", "#view", function(event) {
        var table = $('#tbl_detail_payment').DataTable();
        table.destroy();
        var id = $(this).attr('data-id')
        $.ajax({
            url: "ajax/stock/fetch_stock_detail.php",
            method: "POST",
            data: {
                extra_search: id

            },
            success: function(data) {
                console.log(data)


            }
        }); 
        load_data_detail(id);
    });

    function load_data_detail(id) {
        var t = $('#tbl_detail_payment').DataTable({
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
                url: "ajax/stock/fetch_stock_detail.php",
                type: "post",
                "data": function(d) {
                    d.extra_search = id

                }

            }
        })
        t.on('order.dt search.dt', function() {
            t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    }
    $(document).on("click", "#cancel_product", function(event) {
        var id = $(this).attr('data-id')
        var status = $(this).data('status')
        console.log(id)
        $.ajax({
            url: "ajax/stock/remove_stock.php",
            method: "POST",
            data: {
                id: id,
                status: status
            },
            success: function(data) {
                console.log(data)
                if (data == 1) {
                    swal({
                        text: "ยกเลิกข้อมูลเรียบร้อย",
                        icon: "success",
                        button: false,
                    });
                } else {
                    swal({
                        text: "ยกเลิกการระงับข้อมูล",
                        icon: "success",
                        button: false,
                    });
                }
                setTimeout(function() {
                    swal.close()
                    var table2 = $('#tb_stock').DataTable();
                    table2.destroy();

                    load_main_stock()
                }, 1000);



            }
        });

    });
})

$(document).on("click", "#btn_cancel_stock", function(event) {
    location.reload();
})