@extends('layouts.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="row">
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Inserting new color</h4>
                {{ Form::open(['url' => '/admin/color', 'method' => 'POST', 'class' => 'needs-validation']) }}
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="name">Color name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid color name is required.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="price">Hexadecimal Color Code</label>
                        <input type="text" class="form-control" id="hexCode" name="hexCode" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid hex code name is required.
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Insert Color</button>
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
