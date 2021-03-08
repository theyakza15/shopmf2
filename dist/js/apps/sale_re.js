

    $(document).on("click", "#btn_print", function (event) {
    var id = $(this).data('id')
    var url_string = "report_sale.php"; //window.location.href
    var URL = url_string +'?id='+id;
    var win = window.open(URL, "_blank");

});
$(document).on("click", "#remove", function (event) {
    var id = $(this).data('id')
    swal({
        title: "แจ้งเตือน",
        text: "ยกเลิกการชำระเงินเลขที่ใบเสร็จ : " + id,
        icon: "warning",
        buttons: ['ยกเลิก', 'ยืนยัน'],

    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "ajax/sale_re/remove.php",
                    method: "POST",
                    data: {
                        id: id
            
                    },
                    success: function(data) {
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
            } else {
                swal.close()
            }
        });


});
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