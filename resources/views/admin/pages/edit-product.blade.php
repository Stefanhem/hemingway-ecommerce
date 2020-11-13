@extends('layouts.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="row">
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Product</h4>
                {{ Form::open(['url' => '/admin/products/update/' . $product->id, 'method' => 'POST', 'class' => 'needs-validation', 'files' => true]) }}
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="name">Product name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder=""
                               value="{{$product->name}}" required>
                        <div class="invalid-feedback">
                            Valid product name is required.
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="code">Product code</label>
                        <input type="text" class="form-control" id="code" name="code" placeholder=""
                               value="{{$product->code}}" required>
                        <div class="invalid-feedback">
                            Valid code are required.
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="dimensions">Product dimensions</label>
                        <input type="text" class="form-control" id="dimensions" name="dimensions" placeholder=""
                               value="{{$product->dimensions}}">
                        <div class="invalid-feedback">
                            Valid dimensions are required.
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" name="price" value="{{$product->price}}" required/>
                        <div class="invalid-feedback">
                            Please select a valid price.
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="priceOnSpecialOffer">Price on special offer</label>
                        <input type="number" class="form-control" value="{{$product->priceOnSpecialOffer}}" name="priceOnSpecialOffer"/>
                        <div class="invalid-feedback">
                            Please select a valid price.
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="quantityInStock">Quantity in stock</label>
                        <input type="number" class="form-control" name="quantityInStock"
                               value="{{$product->quantityInStock}}" required/>
                        <div class="invalid-feedback">
                            Please select a valid number.
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description"
                                  rows="3">{{$product->description}}</textarea>
                        <div class="invalid-feedback">
                            Please insert a description.
                        </div>
                    </div>
                </div>

                <label for="description" style="margin-bottom: 20px">Product Types</label>
                @foreach($types as $type)
                    <div class="row">
                        <div class="col-md-5 mb-3" style="padding-left: 35px">
                            <input type="checkbox" class="form-check-input" name="productTypes[]" value="{{$type->id}}" {{(in_array($type->id, $checkedTypes) ? 'checked' : '')}}/>
                            <label class="form-check-label" for="labels">{{$type->name}}</label>
                        </div>
                    </div>
                @endforeach

                <div class="row">
                    <div class="col-md-8 order-md-1">
                        <div class="mb-3">
                            <label for="name">Main product image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="mainImage" name="image">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <input type="checkbox" id="isOnSpecialOffer" name="isOnSpecialOffer"
                               value="1" {{ ($product->isOnSpecialOffer) ? 'checked' : '' }}>
                        <label for="isOnSpecialOffer">Is on special offer</label>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Update product</button>
                {{Form::close()}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </main>

    <!-- Bootstrap core JavaScript
        ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
        $(".custom-file-input").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';

            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');

                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection
