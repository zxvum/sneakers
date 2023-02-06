<div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <form wire:submit.prevent="submit" class="form-horizontal">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Редактирование товара</h4>
                        <div class="form-group row">
                            <label class="col-sm-3 text-end control-label col-form-label">Превью</label>
                            <div class="col-sm-9">
                                <img id="imgPreview" style="width: 200px; height: 200px; object-fit: contain;" src="" alt="Пусто">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="img" class="col-sm-3 text-end control-label col-form-label">Изображение</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="img">
                                @error('img') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 text-end control-label col-form-label">Название</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ old($name) }}" class="form-control" id="name" placeholder="Название товара">
                                @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-3 text-end control-label col-form-label">Цена</label>
                            <div class="col-sm-9">
                                <input type="number" value="{{ old($price) }}" class="form-control" id="price" placeholder="Цена товара">
                                @error('price') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <button type="button" class="btn btn-primary">
                                Сохранить
                            </button>
                            <a href="{{ route('admin.products.table') }}" type="button" class="btn btn-secondary">
                                Назад
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @section('js')
        <script>
            $('#img').change(function (){
                const file = this.files[0];
                console.log(file);
                if (file){
                    let reader = new FileReader();
                    reader.onload = function(event){
                        console.log(event.target.result);
                        $('#imgPreview').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            })
        </script>
    @endsection
</div>
