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
            url: "ajax/sale/get_group.php",
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
            url: "ajax/sale/get_product.php",
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
            url: "ajax/sale/get_size.php",
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
            url: "ajax/sale/fetch_product.php",
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
                url: "ajax/sale/fetch_product.php",
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
    $(document).on("change", ".amount", function(event) {
        var amount = $(this).val()
        var price = $(this).data('price')
        var id = $(this).data('id')
        $('#chk'+id).attr('total',amount*price)

        //$("#btn_con").attr("disabled", true);
    });
    $(document).on("click", "#btn_con", function(event) {
        var product_con = $('#tb_product_list td:nth-child(2)').map(function() {
            return $(this).text();
        }).get();
        var amonut_con = $('#tb_product_list td:nth-child(6)').map(function() {
            return $(this).text();
        }).get();

        var check
        if ($('#p').is(':checked')) {
            check = 1;
        } else if ($('#s').is(':checked')) {
            check = 2;
        }
        var pay_total = $('#tb_product_list td:nth-child(7)').map(function() {
            return $(this).text();
        }).get();
        
         console.log(product_con)
        console.log(amonut_con)
        console.log(check)
        console.log(pay_total)
        
        $.ajax({
            url: "ajax/sale/get_discount.php",
            method: "POST",
            async:false,
            data: {
                product_con: product_con,
                amonut_con: amonut_con,
                check:check,
                pay_total:pay_total
                
            },
            success: function(data) {
                $('#discount').val(data)

                console.log(data)

            }
                

        });

        sum_table()
    })
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
            var total = $(this).attr('total');
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
                    $.ajax({
                        url: "ajax/sale/chankdis.php",
                        method: "POST",
                        async:false,
                        data: {
                            id_pd : md_id ,
                            amuont_pro: amount,
            
                        },
                        success: function(data) {
                            if(data!=0){
                               var to_dis = total-data
                            }else{
                               var to_dis = total
                            } 
                            data = parseInt(data)
                            to_dis= parseInt(to_dis)
                          data =  numberWithCommas(data.toFixed(2))
                          to_dis =  numberWithCommas(to_dis.toFixed(2))
                            table2.row.add([
                                number,
                                md_id,
                                md_name,
                                unit_name,
                                amount,
                                data,
                                to_dis,
                                button,
        
                            ]).draw(false);
            
                        }
                        
                    });
                    
                }
                $(".i").each(function(i) {
                    $(this).text(++i);
                });
               
            }
           
        sum_table()
        });
        
        
    })
    function numberWithCommas(x) {
        var parts = x.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return parts.join(".");
    }
      function sum_table() {
        var table = document.getElementById("tb_product_list")

        sumVal = 0;
        sumdis = 0;
      
            for (var i = 1; i < table.rows.length; i++) {
                sumVal = sumVal + parseFloat(table.rows[i].cells[6].innerHTML.replace(/,/g, ''));
            }
            for (var i = 1; i < table.rows.length; i++) {
                sumdis = sumdis + parseFloat(table.rows[i].cells[5].innerHTML.replace(/,/g, ''));
            }
            sumVal = parseInt(sumVal)
            sumdis= parseInt(sumdis)
            sumVal =  numberWithCommas(sumVal.toFixed(2))
            sumdis =  numberWithCommas(sumdis.toFixed(2))
            $('#discount').val(sumdis)
            var dis = $('#discount').val()
            dis = parseInt(dis)
            $('#price_total').val(sumVal)
            var rowCount= $('#tb_product_list tr').length 
            $('#count').val(rowCount-1)
            
          
        
     
        $(".i").each(function (i) {
            $(this).text(++i);
        });
    }  


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
        sum_table()
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
        var pay_total = $('#tb_product_list td:nth-child(7)').map(function() {
            return $(this).text();
        }).get();
        var amonut = $('#tb_product_list td:nth-child(5)').map(function() {
            return $(this).text();
        }).get();
        var dis2 = $('#tb_product_list td:nth-child(6)').map(function() {
            return $(this).text();
        }).get();
        var check
        var pay_total1 = [],arr_discount=[]
        for (const index of pay_total) {
            var pay_total = parseFloat(index.replace(/,/g, ''));
            pay_total1.push(pay_total)
        }
        for (const index of dis2) {
            var pay_total = parseFloat(index.replace(/,/g, ''));
            arr_discount.push(pay_total)
        }
         var total_price =$('#total_price').val()
        var discount = $('#discount').val()
        if ($('#p').is(':checked')) {
            check = 1;
        } else if ($('#s').is(':checked')) {
            check = 2;
        }
console.log(pay_total)
console.log(amonut)
console.log(l1)
        if (l1.length == 0) {
            swal({
                text: "กรุณากรอกข้อมูลให้ครบถ้วน",
                icon: "warning",
                button: false,
            });
        } else {
            
            $.ajax({
                url: "ajax/sale/insert_sale.php",
                method: "POST",
                data: {
                    pro_id: l1,
                    amonut: amonut,
                    check:check,
                    pay_total:pay_total1,
                    total_price:arr_discount,
                    discount:discount,
                    dis2:dis2


                },
                success: function(data) {
                    console.log(data)
                    swal({
                        text: "บันทึกข้อมูลเรียบร้อย",
                        icon: "success",
                        button: false,
                    });
                       setTimeout(function() {
                        window.open('payment_pay.php', '_blank');
                        location.reload();
                    }, 2000);  
                }
            });
        } 
    })
    $("#money").change(function() {
        var money = $(this).val()
        var elem = $(this).val();
        var total = $('#price_total').val()
        var change =0
        money = parseFloat(money.replace(/,/g, ''));
        total = parseFloat(total.replace(/,/g, ''));
        if (!elem.match(/^([0-9 .])+$/i)) {
            swal({
                text: "กรุณากรอกจำนวนเงิน",
                icon: "warning",
                button: false,
            });
        }else{
            if(money< total){
                swal({
                    text: "กรุณากรอกจำนวนเงินให้พอดี",
                    icon: "warning",
                    button: false,
                });
            }else{
                var ptotal_pay = total;
                var pmoney = parseFloat(money);
                var pchange = parseFloat(change);
                pchange=pmoney-ptotal_pay
                $('#price_re').val(numberWithCommas(pchange.toFixed(2)))
                $('#money').val(numberWithCommas(pmoney.toFixed(2)))
            }
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
                url: "ajax/sale/fetch_stock.php",
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
        var table = $('#tbl_detail_sale').DataTable();
        table.destroy();
        var id = $(this).attr('data-id')
        load_data_detail(id);
    });

    function load_data_detail(id) {
        var t = $('#tbl_detail_sale').DataTable({
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
                url: "ajax/sale/fetch_stock_detail.php",
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
            url: "ajax/sale/remove_detail_stock.php",
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

$(document).on("click", "#btn_cancel_sale", function(event) {
    location.reload();
})

$(document).on("change", ".amount", function(event) {
    var id = $(this).attr("data-id")
    var max = $(this).attr("max")
    var amount = $(this).val()
console.log(amount);
console.log(max);
max=parseInt(max);
amount=parseInt(amount);
    if(amount>max){
        swal({
            text: "จำนวนสินค้าไม่เพียงพอ",
            icon: "warning",
            button: "ปิด",
        });
        $("#num"+id).val(max)
    }

})