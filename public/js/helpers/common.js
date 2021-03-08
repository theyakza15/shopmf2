
let get_api_url = (path)=> {
    return `http://localhost/shop/api/v1/${path}`
}

let get_assets_url = (path) => {
    return `http://localhost/shop/assets/goods/${path}`
}

let get_profiles_url = (path) => {
    return `http://localhost/shop/assets/profiles/${path}`
}

let base_url = (path) => {
    return `http://localhost/shop/${path}`
}

let ajax_options = (url, methods, options, upload = false) => {
    let json = {
        type: methods,
        url: url,
        data: options,
        dataType: "json"
    }
    if(upload) {
        json = {...json, processData: false,  // Important!
            contentType: false,
            cache: false,}
    }
    return json;
}

let dataTables = (ele) => {
    if ($.fn.dataTable.isDataTable(ele)) {
        $(ele).DataTable(table_default_options);
    }else {
         $(ele).DataTable(table_default_options);
    }
}

let validate = (ele) => {
    for (let i = 0; i < ele.length; i++) {
        const e = ele[i];
        let fieldBlank = (e.tagName == 'SELECT') ? 'กรุณเลือกฟิลด์นี้' : 'กรุณากรอกฟิลด์นี้'
        let msg = '';
        if (e.value == '' && ! 
        $(e).hasClass('input-upload')){
            msg = `<span class="fa fa-times-circle"></span> ${fieldBlank}`
            set_feedback(e,msg);
            return false;
        }else{
            if(typeof e.dataset.event !== "undefined"){
                if(e.dataset.event == "email"){
                    if(!validate_email(e.value)){
                        msg = `<span class="fa fa-times-circle"></span> อีเมลของคุณไม่ถูกต้องตามรูปแบบ`
                        set_feedback(e,msg);
                        return false;
                    }
                }else  if(e.dataset.event == "czid"){
                    if(!validate_czid(e.value)){
                        msg = `<span class="fa fa-times-circle"></span> รหัสไม่ถูกต้องตามรูปแบบ`
                        set_feedback(e,msg);
                        return false;
                    }
                }else if(e.dataset.event == "reqire-number"){
                    if(e.value < 1){
                        msg = `<span class="fa fa-times-circle"></span> กรอกตัวเลขมากกว่า 0`
                        set_feedback(e,msg);
                        return false;
                    }
                }else if(e.dataset.event == "phone"){
                    if(e.value.length < 9){
                        msg = `<span class="fa fa-times-circle"></span> เบอร์โทรศัพท์ไม่ถูกต้อง`
                        set_feedback(e,msg);
                        return false;
                    }
                }
            }
        }
    }
    return true;
}
let set_feedback = (ele,msg) => {
    $(ele).addClass('is-invalid')
    $(ele).parent('.form-group').find('.invalid-feedback').html(msg)    
    $(ele).focus();        
}
let valid_event = (ele) => {
    ele.on('change click',function (){
       $(this).removeClass('is-invalid')
    })
}
let generate_json_byele = (ele) => {
    let json = {}
    for (let i = 0; i < ele.length; i++) {
        const el = ele[i];
        json[el.id] = el.value;
    }
    return json;
}
let generate_formdata_byele =  (ele, file) => {
    let formData= new FormData();
    for (let i = 0; i < ele.length; i++) {
        const el = ele[i];
        formData.append(`${el.id}`, el.value)
    }
    formData.append(`files`, file[0])
    return formData;
}
let validate_email = (email) => {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
let preview_image = (input, ele) =>  {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
            ele.attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
}
let validate_czid = (id) =>
{   
    var sum = 0;
    if(id.length != 13) return false;
    for(var i=0, sum=0; i < 12; i++)
        sum += parseFloat(id.charAt(i))*(13-i); 
    if((11-sum%11)%10!=parseFloat(id.charAt(12)))
        return false; 
    return true;
}

let validate_password = (input) => {
    if(input.value.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/)) {
        return true;
    }else{
        return false;
    }
}
let sweeet_confirm_options = (msg) =>{
    return {
        title: 'คำเตือน',
        text: msg,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ยืนยัน',
        cancelButtonText: 'ยกเลิก'
      }
}
let sweet_success = (msg) => {
    return {
        type: 'success',
        title: 'สำเร็จ!',
        text: msg,
      }
}
let sweet_error = (msg) => {
    return {
        type: 'error',
        title: 'ผิดพลาด!',
        text: msg,
      }
}
let date_format = (date_in) => {
    return date_in.split('-').reverse().join('/')
}  
let decimal_format = (x) => {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
} 
let table_default_options =  {
    "language": {
        "sEmptyTable":     "ไม่มีข้อมูลในตาราง",
        "sInfo":           "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
        "sInfoEmpty":      "แสดง 0 ถึง 0 จาก 0 แถว",
        "sInfoFiltered":   "(กรองข้อมูล _MAX_ ทุกแถว)",
        "sInfoPostFix":    "",
        "sInfoThousands":  ",",
        "sLengthMenu":     "แสดง _MENU_ แถว",
        "sLoadingRecords": "กำลังโหลดข้อมูล...",
        "sProcessing":     "กำลังดำเนินการ...",
        "sSearch":         "ค้นหา: ",
        "sZeroRecords":    "ไม่พบข้อมูล",
        "oPaginate": {
            "sFirst":    "หน้าแรก",
        "sPrevious": "ก่อนหน้า",
            "sNext":     "ถัดไป",
        "sLast":     "หน้าสุดท้าย"
        },
        "oAria": {
            "sSortAscending":  ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
        "sSortDescending": ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย"
        }
    }
}
export {get_api_url, ajax_options, set_feedback,decimal_format,
        get_assets_url,get_profiles_url,validate,validate_password ,valid_event,
        generate_json_byele,generate_formdata_byele, 
        validate_email, validate_czid, preview_image, dataTables,
        sweeet_confirm_options, sweet_success,sweet_error,date_format,base_url};