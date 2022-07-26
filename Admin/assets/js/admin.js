function adminControl() {
    var self = this;
    var path = './';
    var loading = false;
    var menuLoad = $('.content main');
    this.ajax = (url, data, succFunc, doneFunc) => {
        $.ajax({
            url: path + url,
            type: 'POST',
            dataType: 'json',
            data: data,
            success: function(result) {

                succFunc(result);
            },
            error: function(error) {
                console.log(error.responseText);
            },
            complete: function() {
                if (typeof doneFunc != 'undefined') {
                    doneFunc();
                } else {
                    loading = false;
                }
            }
        })
    }
    this.loadPage = (page, el = '.areaAdmin') => {
        if (loading) {
            alert('There is another action being taken');
            return false;
        }
        loading = true;
        self.ajax(
            'load.php', { 'page': page, },
            function(result) {
                $(".areaAdmin").removeClass('active');
                $(el + '[page=' + page + ']').addClass('active');
                $('.tittle').text(page);
                menuLoad.empty().append(result.content);
            },
            function() {
                loading = false;
            });
    }
    this.showListError = (startDate, endDate, lstError) => {
        $.ajax({
            url: './loadtableListError.php',
            type: 'post',
            cache: false,
            data: {
                startDate: startDate,
                endDate: endDate,
                listError: lstError
            },
            dataType: 'json',
            success: function(result) {
                console.log(result);
                self.tableListError(result.data, result.title);
            },
            error: function(error) {
                console.log(error.responseText);
            }

        })
    }
    this.tableListError = (result, title) => {
        let stt = 1;
        let html = `<thead class="lstError">
        <th>
        STT
        </th>
        <th>
        Ngày tháng
        </th>
        <th>
        Loại Body
        </th>
        <th>
        VinCode
        </th>
        <th>
        Màu
        </th>
        <th>
        Loại Lỗi
        </th>
        `;
        for (let i = 0; i < title.length; i++) {
            var position = title[i];
            html += `<th>
             ` +
                position +
                `
            </th>
          `
        }
        html += `</thead> <tbody>`;
        for (let i = 0; i < result.length; i++) {

            html +=
                `<tr>
            <td>
             ` + stt + `
            </td>
            <td>
            ` + result[i]['time_currnet'] + `
            </td>
            <td>
            ` + result[i]['bodyType'] + `
            </td>
            <td>
            ` + result[i]['vincode'] + `
            </td>
            <td>
            ` + result[i]['color'] + `
            </td>
            <td>
            ` + result[i]['error_type'] + `
            </td>`;

            for (let j = 0; j < title.length; j++) {
                if (result[i]['error_position'] === title[j]) {
                    html += ` <td>
                    ` + result[i]['total'] + `
                    </td>`;
                } else {
                    html += ` <td>
                   
                    </td>`;
                }

            }
            stt++;
        }

        html += `</tr> </tbody>`;
        $('.listError').empty();
        $('.listError').append(html);

    }
    this.export = (idTable) => {
        var row = $(idTable.children()[1]).children().length;
        var col = $($(idTable.children()[0]).children()[0]).children().length;
        var dataTableExport = [];

        var flag = false;
        for (let i = 0; i < row; i++) {

            var arrayadd = [];
            for (let j = 0; j < col; j++) {
                var key = $($(idTable.children()[0]).children()[0]).children()[j].innerText;
                var value = $($(idTable).children()[1].rows[i]).children()[j].innerText;
                arrayadd.push({
                    [key]: value
                });
            }
            dataTableExport.push(arrayadd);
            if (i == row - 1)
                flag = true;

        }
        if (flag == true) {
            var example = Object.assign(dataTableExport)
            self.createExcel(example, "DANH SÁCH THEO LOẠI LỖI");
        }

    }
    this.createExcel = (data1, title) => {
        $.ajax({
            url: './exportExcel.php',
            type: 'post',
            cache: false,
            dataType: 'json',
            data: {
                data1: JSON.stringify(data1),
                title: title,
            },
            //processData: false,
            //contentType: false,
            success: function(result) {
                console.log(result.url);
                if (result.code == 200) {
                    window.location.href = result.url;
                    console.log("xuất excel thành công");
                } else if (result) {
                    alert("Xuất Excel thất bại")
                }
            },
            error: function(error) {
                error.responseText;
            }
        })
    }
}

var admin = new adminControl();