<div class="container-fluid">
  <div class="row">
    <!-- <div class="col-md-auto"> -->
    <div class="col form-group">
      <div class='input-group date'>
        <div class="row">
          <div class="col">
            Từ ngày
            <input type='date' class="form-control" placeholder='Select Date' id="startDate" style='width: 200px;'>
          </div>
          <div class="col">
            Đến ngày
            <input type='date' class="form-control" placeholder='Select Date' id="endDate" style='width: 200px;'>
          </div>

          <div class="col">

            <button type="button" class="btn btn-primary searchListError">Search</button>
          </div>

        </div>
        <div class="row ml-auto">
          <div class="col ml-auto">
            <button type="button" class="btn btn-info exportExcel">Export</button>
          </div>
        </div>
        <!-- <input type='text' class="form-control" id='datepicker' placeholder='Select Date' style='width: 300px;'> -->
      </div>

      <!-- </div> -->
    </div>
    <!-- <div class="col-md-auto">

    </div> -->
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title ">Danh sách Lỗi</h4>
          <p class="card-category"> Hiển thị danh sách lỗi theo loại lỗi</p>
        </div>
        <div class="card-body">
          <div class="table-responsive tableError">
            <div class="table-bordered">
              <table class="listError" id="tableListError">

              </table>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <iframe id="txtArea1" style="display:none"></iframe>
</div>
<script>
  $(document).ready(function() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!

    var yyyy = today.getFullYear();
    if (dd < 10) {
      dd = '0' + dd
    }
    if (mm < 10) {
      mm = '0' + mm
    }
    today = yyyy + '-' + mm + '-' + dd;
    admin.showListError(startDate + " 00:00:00", endDate + " 23:59:59", error);
    $('#startDate').val(today);
    $('#endDate').val(today);
    $('.searchListError').click(function(e) {
      e.preventDefault();
      let startDate = $('#startDate').val();
      let endDate = $('#endDate').val();
      if (startDate == '' || endDate == '') {
        alert('Vui lòng xem lại ngày giờ tìm kiếm!');
        return;
      } else {
        var from = startDate.split("-")

        var fromDate = new Date(from[0], from[1] - 1, from[2])
        var to = endDate.split("-")

        var toDate = new Date(to[0], to[1] - 1, to[2])
        if (fromDate.getTime() > toDate.getTime()) {
          alert("Ngày bắt đầu phải nhỏ hơn ngày kết thúc!");
          return;
        } else {
          admin.showListError(startDate + " 00:00:00", endDate + " 23:59:59", error);
        }
      }
    })
    $('.exportExcel').click(function(){
      var idTable=$('#tableListError');
      admin.export(idTable);
    })
  })
</script>