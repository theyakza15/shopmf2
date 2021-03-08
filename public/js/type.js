import Goods from './modules/goods.js';
import {validate, valid_event, sweet_error, 
    preview_image, sweeet_confirm_options,sweet_success,
    set_feedback, get_assets_url, get_api_url} from './helpers/common.js';

var goods = new Goods();
var selected = false;
var typeSelected = {}
var groupSelected = {}
var sizeSelected = {}

var typeBody = $("#typeBody");
var groupBody = $("#groupBody")
var sizeBody = $("#sizeBody")

$(document).ready(function (){
    
    let ele = $("#ipName");
    let idModal;
    valid_event(ele)
    goods.get_type_list({
        ele: typeBody
    })
    typeBody.on("click", ".type-to", function (){
        let index = this.dataset.index;
        let type = goods.type[index]
        typeSelected = type
        selected = true
        goods.get_group_list({
            ele : groupBody,
            id : type.g_type_id
        })
        goods.get_size_list({
            ele : sizeBody,
            id : type.g_type_id
        })
        if(selected) {
            $("#addGroup").removeAttr("disabled", "disabled")
            $("#addSize").removeAttr("disabled", "disabled")
        }
    })

    $("#addType, #addGroup, #addSize").click(function () {
        idModal = this.id;
        $("#addModalLabel").html("เพิ่มข้อมูล")
        $("#addModal").modal("show")
    })

    typeBody.on("click", ".type-edit", function (){
        let index = this.dataset.index;
        let type = goods.type[index]
        idModal = 'editType';
        typeSelected = type
        ele.val(typeSelected.g_type_name)
        $("#addModalLabel").html("แก้ไขข้อมูล")
        $("#addModal").modal("show")
    })

    groupBody.on("click", ".group-edit", function (){
        let index = this.dataset.index;
        let group = goods.group[index]
        idModal = 'editGroup';
        groupSelected = group
        ele.val(groupSelected.g_group_name)
        $("#addModalLabel").html("แก้ไขข้อมูล")
        $("#addModal").modal("show")
    })

    sizeBody.on("click", ".size-edit", function (){
        let index = this.dataset.index;
        let size = goods.size[index]
        idModal = 'editSize';
        sizeSelected = size
        ele.val(sizeSelected.g_size_value)
        $("#addModalLabel").html("แก้ไขข้อมูล")
        $("#addModal").modal("show")
    })

    typeBody.on("click", ".type-delete", async function (){
        let index = this.dataset.index;
        let type = goods.type[index]
        let update = await Swal.fire(sweeet_confirm_options(`คุณต้องการยกเลิกประเภท ${type.g_type_name} ใช่หรือไม่ ?`))
            if(update.value){
               let  result = await goods.delete_type({
                        name : ele.val(),
                        id : type.g_type_id
                });
                if(result.success) {
                    if(result.type == "check"){
                        Swal.fire(sweet_error("ไม่สามารถลบได้ เนื่องจากมีสินค้าอยู่"))
                    }else{
                        goods.get_type_list({
                            ele: typeBody
                        })
                        Swal.fire(sweet_success("ลบประเภทสินค้าสำเร็จ"))
                    }
                }
        }   
    })

    groupBody.on("click", ".group-delete", async function (){
        let index = this.dataset.index;
        let group = goods.group[index]
        let update = await Swal.fire(sweeet_confirm_options(`คุณต้องการยกเลิกกลุ่มสินค้า ${group.g_group_name} ใช่หรือไม่ ?`))
            if(update.value){
               let  result = await goods.delete_group({
                        name : ele.val(),
                        type : group.g_type_id,
                        id : group.g_group_id
                });
                if(result.success) {
                    if(result.type == "check"){
                        Swal.fire(sweet_error("ไม่สามารถลบได้ เนื่องจากมีสินค้าอยู่"))
                    }else{
                        goods.get_group_list({
                            ele : groupBody,
                            id : group.g_type_id
                        })
                        Swal.fire(sweet_success("ลบกลุ่มสินค้าสำเร็จ"))
                    }
                }
        }   
    })

    sizeBody.on("click", ".size-delete", async function (){
        let index = this.dataset.index;
        let size = goods.size[index]
        let update = await Swal.fire(sweeet_confirm_options(`คุณต้องการยกเลิกขนาด ${size.g_size_value} ใช่หรือไม่ ?`))
            if(update.value){
               let  result = await goods.delete_size({
                        name : ele.val(),
                        type : size.g_type_id,
                        id : size.g_size_id
                });
                if(result.success) {
                    if(result.type == "check"){
                        Swal.fire(sweet_error("ไม่สามารถลบได้ เนื่องจากมีสินค้าอยู่"))
                    }else{
                        goods.get_size_list({
                            ele : sizeBody,
                            id : size.g_type_id
                        })
                        Swal.fire(sweet_success("ลบขนาดสินค้าสำเร็จ"))
                    }
                }
        }   
    })
    

    $("#submit").click(async function (){
        let result;
        let msg = "";
        if(validate(ele)){
            if(idModal == "addType"){
                result = await goods.add_type({
                    name : ele.val()
                });
                msg = "เพิ่มข้อมูลประเภทสินค้าสำเร็จ";
            }else if(idModal == "addGroup"){
                result = await goods.add_group({
                    name : ele.val(),
                    id : typeSelected.g_type_id
                });
                msg = "เพิ่มข้อมูลกลุ่มสินค้าสำเร็จ";
            }else if(idModal == "addSize"){
                result = await goods.add_size({
                    name : ele.val(),
                    id : typeSelected.g_type_id
                });
                msg = "เพิ่มข้อมูลขนาดสำเร็จ";
            }else if(idModal == "editType"){
               let update = await Swal.fire(sweeet_confirm_options(`คุณต้องการแก้ไขข้อมูล ${typeSelected.g_type_name} ใช่หรือไม่ ?`))
               if(update.value){
                    result = await goods.update_type({
                        name : ele.val(),
                        id : typeSelected.g_type_id
                    });
                    msg = "แก้ไขข้อมูลประเภทสินค้าสำเเร็จ";
               }
                
            }else if(idModal == "editSize"){
                let update = await Swal.fire(sweeet_confirm_options(`คุณต้องการแก้ไขข้อมูล ${sizeSelected.g_size_value} ใช่หรือไม่ ?`))
                if(update.value){
                     result = await goods.update_size({
                         name : ele.val(),
                         id : sizeSelected.g_size_id,
                         type : typeSelected.g_type_id
                     });
                     msg = "แก้ไขข้อมูลขนาดสินค้าสำเเร็จ";
                }
                 
             }else if(idModal == "editGroup"){
                let update = await Swal.fire(sweeet_confirm_options(`คุณต้องการแก้ไขข้อมูล ${groupSelected.g_group_name} ใช่หรือไม่ ?`))
                if(update.value){
                     result = await goods.update_group({
                         name : ele.val(),
                         id : groupSelected.g_group_id,
                         type : typeSelected.g_type_id
                     });
                     msg = "แก้ไขข้อมูลกลุ่มสินค้าสำเเร็จ";
                }
                 
             }
        }

        if(result.success) {
            if(result.type == "check") {
                set_feedback(ele, "ข้อมูลซ้ำ")
                ele.focus();
            }else{
                if(idModal == "addType" || idModal == "editType") {
                    goods.get_type_list({
                        ele: typeBody
                    })
                }else if(idModal == "addGroup" || idModal == "editGroup") {
                    goods.get_group_list({
                        ele : groupBody,
                        id : typeSelected.g_type_id
                    })
                }else if(idModal == "addSize" || idModal == "editSize") {
                    goods.get_size_list({
                        ele : sizeBody,
                        id : typeSelected.g_type_id
                    })
                }

                Swal.fire(sweet_success(msg))
                ele.val('')
                $("#addModal").modal('hide');
            }
        }
    })

    $("#addModal").on('hidden.bs.modal', function (e) {
        ele.val('')
    })
});