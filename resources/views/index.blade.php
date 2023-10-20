<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.5.1/axios.min.js"
        integrity="sha512-emSwuKiMyYedRwflbZB2ghzX8Cw8fmNVgZ6yQNNXXagFzFOaQmbvQ1vmDkddHjm5AITcBIZfC7k4ShQSjgPAmQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div id="app">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card py-2" style="border: 2px solid rgb(102,16,242);">
                        <div class="card-header">
                            <b class="fs-5">Thêm mới danh mục</b>
                        </div>
                        <div class="card-body">
                            <label for=""><b>Tên danh mục</b></label>
                            <input type="text" name="" class="form-control my-2"
                                v-model="danhMuc.ten_danh_muc" placeholder="Nhập tên danh mục">
                            <label for=""><b>Slug danh mục</b></label>
                            <input type="text" name="" id="" v-model="danhMuc.slug_danh_muc"
                                class="form-control my-2" placeholder="Nhập số lượng danh mục">
                            <label for=""><b>Tình trạng</b></label>
                            <select class="form-select mt-2" v-model="danhMuc.tinh_trang"
                                aria-label="Default select example">
                                <option value="1" selected>Yes</option>
                                <option value="0">No</option>
                                <option value="2">Another</option>
                            </select>
                        </div>
                        <div class="card-footer">
                            {{-- <a href="#"> --}}
                            <div class="btn text-light" v-on:click="abc()" style="background-color: rgb(102,16,242);">
                                <b>Thêm mới</b>
                            </div>
                            {{-- </a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card" style="border: 2px solid rgb(102,16,242);">
                        <div class="card-header">
                            <b class="fs-5">Danh sách danh mục</b>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="100%">
                                            <div class="input-group">
                                                <input type="text" class="form-control"
                                                    placeholder="Nhập vào tìm kiếm !" v-model="TTtimkiem"
                                                    v-on:keyup.enter="timkiem()">
                                                <span class="input-group-text">
                                                    <div class="btn btn-primary" v-on:click="timkiem()">Tìm kiếm!</div>
                                                </span>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="align-middle text-center">#</th>
                                        <th class="align-middle text-center">Tên danh mục</th>
                                        <th class="align-middle text-center">Sluong danh mục</th>
                                        <th class="align-middle text-center">Tình trạng</th>
                                        <th class="align-middle text-center" colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-for="(value,key) in list_san_pham">
                                        <tr>
                                            <th class="align-middle text-center">@{{ key + 1 }}</th>
                                            <td class="align-middle text-center">@{{ value.ten_danh_muc }}</td>
                                            <td class="align-middle text-center">@{{ value.slug_danh_muc }}</td>
                                            <td class="align-middle text-center">
                                                    <button class="btn btn-success" v-on:click="xyz(value , key)"
                                                        v-if="value.tinh_trang == 1" style="min-width: 100px">
                                                        <b>Hiển thị</b>
                                                    </button>
                                                    <button class="btn btn-warning" v-on:click="xyz(value , key)"
                                                        v-else style="min-width: 100px">
                                                        <b>Tạm tắt</b>
                                                    </button>
                                            </td>
                                            <td class="align-middle text-center"><a href="">
                                                    <div class="btn btn-info text-light" style="min-width: 100px"><b>Cập
                                                            nhật</b></div>
                                                </a></td>
                                            <td class="align-middle text-center"><a href="">
                                                    <div class="btn btn-danger" style="min-width: 100px"><b>Xoá</b>
                                                    </div>
                                                </a></td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

<script>
    new Vue({
        el: '#app',
        data: {
            danhMuc: {
                // tự tạo value = v-model
            },
            list_san_pham: [{
                    'ten_danh_muc': 'Balo',
                    'slug_danh_muc': 'balo',
                    'tinh_trang': 1
                },
                {
                    'ten_danh_muc': 'Máy Tính Bảng',
                    'slug_danh_muc': 'may-tinh-bang',
                    'tinh_trang': 0
                },
            ],
            TTtimkiem: [],
        },
        created() {},
        methods: {
            abc() {
                this.list_san_pham.push(this.danhMuc);
                this.danhMuc = {};
            },

            timkiem() {
                var x = this.TTtimkiem;
                this.list_san_pham = this.list_san_pham.filter(function(item) {
                    return item.ten_danh_muc.includes(x) || item.slug_danh_muc.includes(x);
                });
            },
            xyz(v,k){
                if(this.list_san_pham[k].tinh_trang == 1){
                  this.list_san_pham[k].tinh_trang = 0 ;
                }else{
                  this.list_san_pham[k].tinh_trang = 1 ;
                }
            },
        }
    });
</script>

</html>
