<div>
    @section('css')
        <link rel="stylesheet" type="text/css" href="../assets/extra-libs/multicheck/multicheck.css">
        <link href="../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    @endsection

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Изображение товара</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body d-flex flex-column align-items-center">
                    <div>
                        <img class="product-image" src="{{ asset('storage/'.$img) }}" alt="ast">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Таблица товаров</h5>
                    <div class="table-responsive">
                        <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="zero_config" class="table table-striped table-bordered dataTable"
                                           role="grid" aria-describedby="zero_config_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="zero_config" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 166.609px;">ID
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 267.818px;">Картинка
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 126.845px;">Название
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                                style="width: 55.05px;">Цена
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: 105.873px;">Действия
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{ $product->id }}</td>
                                                <td><button onclick="changeImage('{{ $product->img_path }}')" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Открыть</button></td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ number_format((int)$product->price, 0, '.', ' ') }} руб.</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <a href="{{ route('admin.products.edit', ['id' => $product->id]) }}" class="btn btn-primary btn-sm">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <button wire:click="deleteProduct('{{ $product->id }}')" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">ID</th>
                                            <th rowspan="1" colspan="1">Картинка</th>
                                            <th rowspan="1" colspan="1">Название</th>
                                            <th rowspan="1" colspan="1">Цена</th>
                                            <th rowspan="1" colspan="1">Действия</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('js')
        <script src="{{ asset('assets/extra-libs/multicheck/datatable-checkbox-init.js') }}"></script>
        <script src="{{ asset('assets/extra-libs/DataTables/datatables.min.js') }}"></script>
        <script>
            /****************************************
             *       Basic Table                   *
             ****************************************/
            $("#zero_config").DataTable();
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script>
            function changeImage(image){
                $('.product-image').attr('src', '{{ asset('storage/') }}' + '/' + image)
            }
        </script>
        <script>
            document.addEventListener('livewire:load', function () {
                function deleteProd(id){
                    @this.deleteProduct(id)
                }
            })
        </script>
    @endsection
</div>
