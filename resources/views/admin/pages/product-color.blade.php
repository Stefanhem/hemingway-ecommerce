@extends('layouts.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="row">
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">{{$product->name}}</h4>
                {{ Form::open(['url' => '/admin/products/color', 'method' => 'POST', 'class' => 'needs-validation', 'files' => true]) }}
                {{-- <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="type">Color of this product</label>
                        <select class="custom-select d-block w-100" id="type" name="idColor" required>
                            <option value="">Choose...</option>
                            @foreach($colors as $color)
                                <option value="{{$color->id}}">{{$color->name}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid type.
                        </div>
                    </div>
                </div>--}}
                <input type="hidden" id="idProduct" name="idProduct" value="{{$product->id}}">
                <div class="row">
                    <div class="col-md-8 order-md-1">
                        <div class="mb-3">
                            <label for="name">Product image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="mainImage" name="image">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Insert new Product Color</button>
                {{Form::close()}}
            </div>
        </div>
    </main>

    <!-- Bootstrap core JavaScript
        ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';

            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');

                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
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
