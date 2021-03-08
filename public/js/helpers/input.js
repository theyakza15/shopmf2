import {set_feedback , valid_event, validate, generate_json_byele, 
    validate_password,sweet_success} from "../helpers/common.js";
import Employee from '../modules/employee.js';

$(".float-input").on("keypress keyup blur",function (event) {
    //this.value = this.value.replace(/[^0-9\.]/g,'');
$(this).val($(this).val().replace(/[^0-9\.]/g,''));
    if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }
});

$(".int-input").on("keypress keyup blur",function (event) {   
   $(this).val($(this).val().replace(/[^\d].+/, ""));
    if ((event.which < 48 || event.which > 57)) {
         event.preventDefault();
    }
});

$("#changePassword").click(function (){
    $("#firstModal").modal("show")
})

$("#btn_save_password").click(function (){
    let emp = new Employee();
    let password = $("#newPassword");
    let confirmPassword = $("#confirmPassword");
    let ele = $("#firstModal input")
        valid_event(ele)
    if(validate(ele)){
        if (validate_password(password[0])){
            if(password.val() == confirmPassword.val()){
                let obj = generate_json_byele(password)
                    obj.old_password = $("#oldPassword").val()

                let firstLogin = emp.change_password(obj)
                firstLogin.then((res)=> {
                    if(res.success){
                        // window.location = './home';
                        if(res.type == "match"){
                            set_feedback($("#oldPassword"), "<span class='fa fa-times-circle'></span> รหัสผ่านไม่ถูกต้อง")
                        }else{
                            Swal.fire(sweet_success("เปลี่ยนรหัสผ่านสำเร็จ"))
                            $("#firstModal").modal("hide")
                            ele.val('')
                        }
                    }
                })
            }else{
                set_feedback(password, "<span class='fa fa-times-circle'></span> รหัสผ่านไม่ตรงกัน")
            }
            
        }else{
            set_feedback(password, "<span class='fa fa-times-circle'></span> รหัสผ่านไม่ถูกต้องตามรูปแบบ")
        }
    }else{

    }
})