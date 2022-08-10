<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/6d3c048c3c.js"></script>
    <title>Modals</title>
</head>

<body>
    <!-- ***************ADD ENGLISH MODAL************** -->
    <div class="modal" tabindex="-1" id='addEng'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Bastard(ENG)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="first-name" class="col-form-label"> Name:</label>
                        <input type="text" name="pok_name" id="pok_name" class="form-control" value="" maxlength="50">
                    </div>
                    <div class="form-group">
                        <label for="first-name" class="col-form-label"> Surname:</label>
                        <input type="text" name="pok_surname" id="pok_surname" class="form-control" value="" maxlength="50">
                    </div>
                    <div class="form-group">
                        <label for="first-name" class="col-form-label"> Description:</label>
                        <textarea rows="" cols="" type="text" name="description" id="description" class="description" value=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="first-name" class="col-form-label"> Category_id:</label>
                        <input type="number" name="category_id" id="category_id" class="form-control" value="" maxlength="50">
                    </div>
                    <div class="form-group">
                        <label for="first-name" class="col-form-label"> photo:</label>
                        <input type="text" name="photo" id="photo" class="form-control" value="" maxlength="50">
                    </div>
                    <div class="form-group">
                        <label for="first-name" class="col-form-label"> files:</label>
                        <input type="text" name="files" id="files" class="form-control" value="" maxlength="50">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id='saveEng' name='saveEng'>Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ***************ADD UKRAINE MODAL************** -->
    <div class="modal" tabindex="-1" id='addUkr'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Додати покидька(UKR)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="first-name" class="col-form-label"> Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="" maxlength="50">
                    </div>
                    <div class="form-group">
                        <label for="first-name" class="col-form-label"> Surname:</label>
                        <input type="text" name="surname" id="surname" class="form-control" value="" maxlength="50">
                    </div>
                    <div class="form-group">
                        <label for="first-name" class="col-form-label"> Description:</label>
                        <textarea rows="" cols="" type="text" name="description_ukr"  id="description_ukr" class="description" value=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="first-name" class="col-form-label"> Category_id:</label>
                        <input type="number" name="category_id_ukr" id="category_id_ukr" class="form-control" value="" maxlength="50">
                    </div>
                    <div class="form-group">
                        <label for="first-name" class="col-form-label"> photo:</label>
                        <input type="text" name="photo_ukr" id="photo_ukr" class="form-control" value="" maxlength="50">
                    </div>
                    <div class="form-group">
                        <label for="first-name" class="col-form-label"> files:</label>
                        <input type="text" name="files_ukr" id="files_ukr" class="form-control" value="" maxlength="50">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                    <button type="button" class="btn btn-primary" id='saveUkr' name='saveUkr'>Зберегти зміни</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ***************EDIT UKRAINE MODAL************** -->
    <div class="modal" tabindex="-1" id='editUkr'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Змінити покидька(UKR)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <input type="text" id='ukrId' name='ukrId'>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="first-name" class="col-form-label"> Name:</label>
                        <input type="text" name="name_ukr" id="name_ukr" class="form-control" value="" maxlength="50">

                    </div>
                    <div class="form-group">
                        <label for="first-name" class="col-form-label"> Surname:</label>
                        <input type="text" name="surname_ukr" id="surname_ukr" class="form-control" value="" maxlength="50">
                    </div>
                    <div class="form-group">
                        <label for="first-name" class="col-form-label"> Description:</label>
                        <textarea rows="" cols="" type="text" name="descr_ukr" id="descr_ukr" class="description" value=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="first-name" class="col-form-label"> Category_id:</label>
                        <input type="text" name="cat_id_ukr" id="cat_id_ukr" class="form-control" value="" maxlength="50">
                    </div>
                    <div class="form-group">
                        <label for="first-name" class="col-form-label"> photo:</label>
                        <input type="text" name="pho_ukr" id="pho_ukr" class="form-control" value="" maxlength="50">
                    </div>
                    <div class="form-group">
                        <label for="first-name" class="col-form-label"> files:</label>
                        <input type="text" name="file_ukr" id="file_ukr" class="form-control" value="" maxlength="50">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                    <button type="button" class="btn btn-primary" id='updateUkr' name='updateUkr'>Зберегти зміни</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ****************EDIT ENGLISH MODAL********** -->
    <div class="modal" tabindex="-1" id='editEng'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Bastard(ENG)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <input type="text" id='engId' name='engId'>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="first-name" class="col-form-label"> Name:</label>
                        <input type="text" name="name_ukr" id="name_eng" class="form-control" value="" maxlength="50">

                    </div>
                    <div class="form-group">
                        <label for="first-name" class="col-form-label"> Surname:</label>
                        <input type="text" name="surname_eng" id="surname_eng" class="form-control" value="" maxlength="50">
                    </div>
                    <div class="form-group">
                        <label for="first-name" class="col-form-label"> Description:</label>
                        <textarea rows="" cols="" type="text" name="descr_eng" id="descr_eng" class="description" value=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="first-name" class="col-form-label"> Category_id:</label>
                        <input type="text" name="cat_id_eng" id="cat_id_eng" class="form-control" value="" maxlength="50">
                    </div>
                    <div class="form-group">
                        <label for="first-name" class="col-form-label"> photo:</label>
                        <input type="text" name="pho_eng" id="pho_eng" class="form-control" value="" maxlength="50">
                    </div>
                    <div class="form-group">
                        <label for="first-name" class="col-form-label"> files:</label>
                        <input type="text" name="file_eng" id="file_eng" class="form-control" value="" maxlength="50">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id='updateEng' name='updateUkr'>Save</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
      tinymce.init({
        selector: '.description'
        
      });

      
    </script>
</html>