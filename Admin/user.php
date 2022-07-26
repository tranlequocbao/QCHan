<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Tạo Tài Khoản</h4>
          <p class="card-category">Hoàn thiện tại khoản của bạn</p>
        </div>
        <div class="card-body">
          <form>
            <div class="row">
              <div class="col-md-2">
                <div class="form-group">
                  <label class="bmd-label-floating">ID</label>
                  <input type="text" class="form-control" id="IDuser">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">Tên</label>
                  <input type="text" class="form-control" id="Fullname">
                </div>
              </div>
              <div class="col-md-3">
                <div class="btn-group">

                  <a class="btn btn-group btn" id="btn_dept" href="#">Bộ phận</a>

                  <div class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                  </div>

                  <div class="dropdown-menu" id="IDdept">
                    <a class="dropdown-item" href="#">Admin</a>
                    <a class="dropdown-item" href="#">QC</a>
                    <a class="dropdown-item" href="#">Repair</a>
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="btn-group">

                  <a class="btn btn-group btn" id="btn_type" href="#">Trạm</a>

                  <div class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                  </div>

                  <div class="dropdown-menu" id="IDtype">
                    <a class="dropdown-item" href="#">All</a>
                    <a class="dropdown-item" href="#">Trạm 1</a>
                    <a class="dropdown-item" href="#">Trạm 2</a>
                    <a class="dropdown-item" href="#">Trạm 3</a>
                    <a class="dropdown-item" href="#">Trạm 4</a>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="btn-group">

                  <a class="btn btn-group btn" id="btn_shop" href="#">Xưởng</a>

                  <div class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                  </div>

                  <div class="dropdown-menu" id="IDshop">
                    <a class="dropdown-item" href="#">All</a>
                    <a class="dropdown-item" href="#">Body</a>

                    <a class="dropdown-item" href="#">TCF</a>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="btn-group">

                  <a class="btn btn-group btn" id="btn_position" href="#">Vị trí</a>

                  <div class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                  </div>

                  <div class="dropdown-menu" id="Position">
                    <a class="dropdown-item" href="#">LH</a>
                    <a class="dropdown-item" href="#">RH</a>

                    <a class="dropdown-item" href="#">ALL</a>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="btn-group">

                  <a class="btn btn-group btn" id="btn_station" href="#">Tạo lỗi</a>

                  <div class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                  </div>

                  <div class="dropdown-menu" id="Station">
                    <a class="dropdown-item" href="#">Có</a>
                    <a class="dropdown-item" href="#">Không</a>

                  </div>
                </div>
              </div>

            </div>

            <button type="submit" class="btn btn-primary pull-right" id="Save">LƯU</button>
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Danh sách Tài Khoản</h4>
          <p class="card-category">Xưởng Kiểm định</p>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">z
                <th>
                  ID User
                </th>
                <th>
                  Full Name
                </th>
                <th>
                  Trạm
                </th>
                <th>
                  Quyền truy cập
                </th>
                <th>
                  Vị Trí
                </th>
                <th>
                  Tạo lỗi
                </th>

              </thead>
              <tbody id="table_han">

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Danh sách Tài Khoản</h4>
          <p class="card-category">Xưởng Láp ráp</p>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>
                  ID User
                </th>
                <th>
                  Full Name
                </th>
                <th>
                  Trạm
                </th>
                <th>
                  Quyền truy cập
                </th>
                <th>
                  Vị trí
                </th>
                <th>
                  Tạo lỗi
                </th>

              </thead>
              <tbody id="table_tcf">

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Danh sách Tài Khoản</h4>
          <p class="card-category">Admin</p>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>
                  ID User
                </th>
                <th>
                  Full Name
                </th>
                <th>
                  Trạm
                </th>
                <th>
                  Quyền truy cập
                </th>

              </thead>
              <tbody id="table_admin">

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    function reloadPage(e) {
      
      admin.loadPage('user'); 
      }
      $('#date').val(Date('Y-m-d'));
      $().ready(function() {
        // $sidebar = $('.sidebar');

        // $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        // $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
      $.ajax({
        url: './connectdatabase/viewdata_body.php',
        type: 'POST',
        cache: false,
        success: function(data) {
          //console.log(data.responseText);
          $('#table_han').html(data);
        },
        error: function(error) {
          console.log(error.responseText);
        },

      });
      $.ajax({
        url: './connectdatabase/viewdata_tcf.php',
        type: 'POST',
        cache: false,
        success: function(data) {
          //console.log(data.responseText);
          $('#table_tcf').html(data);
        },
        error: function(error) {
          console.log(error.responseText);
        },

      });
      $.ajax({
        url: './connectdatabase/viewdata_admin.php',
        type: 'POST',
        cache: false,
        success: function(data) {
          //console.log(data.responseText);
          $('#table_admin').html(data);


          //$('td'[value='Trần Lê Quốc Bảo']).find('.btn').attr("disabled", true);
          //  if($('#table_admin').find('td'[value='Trần Lê Quốc Bảo'])){
          //   $(this).find('.btn').attr("disabled", true);
          //  }
        },
        error: function(error) {
          console.log(error.responseText);
        },

      });

      $('#IDdept a').on('click', function() {
        // $('#btn_dept').text($(this).text());
        //alert($(this).text());
        $('#btn_dept').text($(this).text());

      });
      $('#IDtype a').on('click', function() {

        $('#btn_type').text($(this).text());
      });
      $('#IDshop a').on('click', function() {
        $('#btn_shop').text($(this).text());
      })
      $('#Position a').on('click', function() {
        $('#btn_position').text($(this).text());
      })
      $('#Station a').on('click', function() {
        $('#btn_station').text($(this).text());
      })
      $('#Save').on('click', function() {


        $("#Save").attr("disbaled", "disbaled");
        var IDuser = $('#IDuser').val();
        var Fullname = $('#Fullname').val();
        var Dept = $('#btn_dept').text();
        var Type = $('#btn_type').text();
        var Shop = $('#btn_shop').text();
        var Position = $('#btn_position').text();
        var Station = $('#btn_station').text();


        if (IDuser != "" && Fullname != "" && Dept != "" && Type != "") {
          if($('#btn_dept').text()==='Bộ phận'){
            alert("Vui lòng chọn đúng bộ phận cho NS!");
            return false;
          }
          if($('#btn_type').text()==='Trạm'){
            alert("Vui lòng chọn đúng trạm cho NS!");
            return false;
          }
          if($('#btn_shop').text()==='Xưởng'){
            alert("Vui lòng chọn đúng xưởng cho NS!");
            return false;
          }
          if($('#btn_position').text()==='Vị trí'){
            alert("Vui lòng chọn đúng Vị trí làm việc cho NS!");
            return false;
          }
          if($('#btn_station').text()==='Tạo lỗi'){
            alert("Vui lòng chọn chức năng cho NS!");
            return false;
          }
          $.ajax({
            url: "./connectdatabase/savedata.php",
            type: "POST",

            data: {
              IDuser: IDuser,
              Fullname: Fullname,
              Dept: Dept,
              Type: Type,
              Shop: Shop,
              Position: Position,
              Station: Station,
            },
            dataType: 'json',
            success: function(dataResult) {
              // alert(IDuser + Fullname + Dept + Type + Shop);
              //console.log(dataResult);
              alert("Da insert data thanh cong");

              admin.loadPage('user'); 
              // reloadPage();

            },
            error: function(error) {
              console.log(error.responseText);
            },
            complete: function() {}
          });
        } else {
          alert("Vui long nhap day du thong tin");
        }

      });
      $("body").on('click', '.delButton', function() {

        let _parent = $(this).closest('tr');
        let id = _parent.data('id');
        var r = confirm("Bạn có muốn xóa user này?");
        if (r == true) {
          $.ajax({
            url: './connectdatabase/Deleteuser.php',
            type: 'POST',
            data: {
              id: id
            },
            cache: false,
            success: function(dataResult) {
              admin.loadPage('user'); 
            },
            error: function(error) {
              console.log(error.responseText);
            },
            complete: function() {

            }
          })
        }
      })

      $("body").on('click', '.modifButton', function() {
        $(this).attr('data-toggle', 'modal');
        $(this).attr('data-target', '#myModal');
        let _parent = $(this).closest('tr');
        let id = _parent.data('id');
        $('#IDdept a').on('click', function() {
          // $('#btn_dept').text($(this).text());
          //alert($(this).text());
          $('#btn_deptUp').text($(this).text());

        });
        $('#IDtype a').on('click', function() {

          $('#btn_typeUp').text($(this).text());
        });
        $('#IDshop a').on('click', function() {
          $('#btn_shopUp').text($(this).text());
        })

        $('#Position a').on('click', function() {
          $('#btn_PositionUp').text($(this).text());
        })
        $('#Station a').on('click', function() {
          $('#btn_StationUp').text($(this).text());
        })

        $.ajax({
          url: './connectdatabase/viewmodifyuser.php',
          type: 'POST',
          dataType: 'json',
          cache: false,
          data: {
            IDuser: id
          },
          success: function(data) {
            $('#IDuserUp').val(data.ID);
            $('#FullnameUp').val(data.Fullname);
            $('#btn_deptUp').text(data.Dept);
            $('#btn_typeUp').text(data.Type);
            $('#btn_shopUp').text(data.Shop);
            $('#btn_PositionUp').text(data.Position);
            $('#btn_StationUp').text(data.Station);
          },
          error: function(error) {
            console.log(error.responseText);
          },
        });
        $('#Update').on('click', function(e) {
          $("#Save").attr("disbaled", "disbaled");
          var IDuser = $('#IDuserUp').val();
          var Fullname = $('#FullnameUp').val();
          var Dept = $('#btn_deptUp').text();
          var Type = $('#btn_typeUp').text();
          var Shop = $('#btn_shopUp').text();
          var Position = $('#btn_PositionUp').text();
          var Station = $('#btn_StationUp').text();
          //console.log(IDuser, Fullname, Dept);

          if (IDuser != "" && Fullname != "" & Dept != "" && Type != "") {
            $.ajax({
              url: "./connectdatabase/updateuser.php",
              type: "POST",
              cache: false,
              data: {
                IDuser: IDuser,
                Fullname: Fullname,
                Dept: Dept,
                Type: Type,
                Shop: Shop,
                Position: Position,
                Station: Station
              },

              success: function(dataResult) {
                // alert(IDuser + Fullname + Dept + Type + Shop);
                alert("Đã cập nhật thành công");
                admin.loadPage('user'); 

              },
              error: function(error) {
                console.log(error.responseText);
              },
              complete: function() {

              }
            });
          } else {
            
            alert("Vui lòng nhập đầy đủ thông tin");
            e.preventDefault();
          }

        })
      })
      
  })
</script>