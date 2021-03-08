<div class="modal fade" id="filterDialog" tabindex="-1" role="dialog" aria-labelledby="goodsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="filterDialog">ตัวเลือกข้อมูล</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><span class="fa fa-times"></span></span>
          </button>
        </div>
        <div class="modal-body">
            <!-- <div class="row"> -->
                <div class="row">
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label for="s_date_c">รูปแบบที่แสดง</label>
                          <select class="custom-select" name="s_date_c" id="s_date_c">
                              <option  value="month">รายเดือน</option>
                              <option  value="year">รายปี</option>
                              <option  value="custom">กำหนดเอง</option>
                          </select>
                          <div class="invalid-feedback"></div>
                      </div>
                  </div>
                </div>
                <div class="row c_date_option" id="c_month">
                  <div class="col-sm-12">
                      <div class="form-group ">
                          <label for="s_month">ประจำเดือน</label>
                          <select class="custom-select" name="s_month" id="s_month">
                          <?php 
                              for ($i=0; $i < count($m); $i++) { ?>
                               <option value="<?php echo  $i+1 ?>"><?php echo $m[$i]?></option>
                          <?php  }?>
                          </select>
                          <div class="invalid-feedback"></div>
                      </div>
                  </div>
                </div>
                <div class="row hidden c_date_option" id="c_year">
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label for="s_year">ประจำปี</label>
                          <select class="custom-select" name="s_year" id="s_year">
                            <?php 
                              for ($i=0; $i < count($year); $i++) { ?>
                               <option value="<?php echo  $year[$i]["year"]?>"><?php echo $year[$i]["year"]?></option>
                            <?php  }?>
                          </select>
                          <div class="invalid-feedback"></div>
                      </div>
                  </div>
                </div>
                <div class="row between-date hidden c_date_option" id="c_between_date">
                  <div class="col-sm-6">
                      <div class="form-group">
                          <label for="s_date_start">ตั้งแต่</label>
                          <div class="input-group date" id="s_date_start" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" data-target="#s_date_start"/>
                              <div class="input-group-append" data-target="#s_date_start" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group">
                          <label for="s_date_end">จนถึง</label>
                          <div class="input-group date" id="s_date_end" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" data-target="#s_date_end"/>
                              <div class="input-group-append" data-target="#s_date_end" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
            <!-- </div> -->
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="button" id="save_filter">ค้นหา</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">ปิดหน้าต่าง</button>

        </div>
      </div>
    </div>
</div>