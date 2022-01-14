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
                  <p class="card-category">Xưởng Hàn</p>
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