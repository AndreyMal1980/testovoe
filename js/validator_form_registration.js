            var checkL;
            var checkE;
            var checkB;
            var checkS;
            var checkF;
            $(function() {
                validation = function() {
                    if (checkL && checkE && checkB && checkS && checkF)
                        return true;
                    else
                        return false;
                }

                $('.login').on('change', function() {
                    $('.errorRegistrationLogin').empty();
                    checkL = validateLoginForm($('.login').val());

                });
                $('.email').on('change', function() {
                    $('.errorRegistrationEmail').empty();
                    checkE = validateEmailForm($('.email').val());
                });

                $('.sex').on('click', function() {
                    $('.errorRegistrationSex').empty();
                    checkS = validateSexForm($('input[name="sex"]:checked').val());
                    //sex = $('input[name="sex"]:checked').val();

                });

                $('.birthday').on('change', function() {
                    $('.errorRegistrationBirthday').empty();
                    checkB = validateBirthdayForm($('.birthday').val());
                });

                $('.foto').on('change', function() {
                    $('.errorRegistrationFoto').empty();
                    checkF = validateFotoForm($('.foto').val());
                });

                function validateLoginForm(login) {

                    var par_pattern_login = /^[a-zA-Zа-яА-ЯёЁ]+$/;
                    if (login === '') {
                        $('.errorRegistrationLogin').append('Необходимо заполнить поле логин');
                        checkL = false;
                    }
                    else if (par_pattern_login.test(login) === false) {
                        $('.errorRegistrationLogin').append('некорректное имя');
                        checkL = false;
                    }
                    else if (login.length < 3) {
                        $('.errorRegistrationLogin').append('Слишком короткое имя.Для безопасности имя должно содержать не менее 3 символов');
                        checkL = false;
                    }
                    else {
                        $('.errorRegistrationLogin').empty();
                        checkL = true;
                    }
                    return checkL;
                }

                function validateEmailForm(email) {
                    var par_pattern_email = /^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/;
                    if (email === '') {
                        $('.errorRegistrationEmail').append('Необходимо заполнить поле email');
                        checkE = false;
                    }
                    else if (par_pattern_email.test(email) === false) {
                        $('.errorRegistrationEmail').append('Введен некорректный email');
                        checkE = false;
                    }
                    else {
                        $('.errorRegistrationEmail').empty();
                        checkE = true;
                    }
                    return checkE;
                }

                function validateSexForm(sex) {

                    if (sex !== undefined) {
                        $('.errorRegistrationSex').empty();
                        checkS = true;
                    }
                    else {
                        $('.errorRegistrationSex').append('Необходимо указать Ваш пол');
                        checkS = false;
                    }
                    return checkS;
                }

                function validateBirthdayForm(birthday) {
                    if (birthday === '') {
                        $('.errorRegistrationBirthday').append('Необходимо выбрать дату Вашего рождения');
                        checkB = false;
                    }
                    else {
                        $('.errorRegistrationBirthday').empty();
                        checkB = true;
                    }
                    return checkB;
                }

                function validateFotoForm(foto) {
                    if (foto === '') {
                        $('.errorRegistrationFoto').append('Необходимо выбрать фото');
                        checkF = false;
                    }
                    else {
                        $('.errorRegistrationFoto').empty();
                        checkF = true;
                    }
                    return checkF;
                }
                $('.sendRegistration').on('click', function() {
                    $('.errorRegistrationLogin').empty();
                    $('.errorRegistrationEmail').empty();
                    $('.errorRegistrationSex').empty();
                    $('.errorRegistrationBirthday').empty();
                    $('.errorRegistrationFoto').empty();
                    validateLoginForm($('.login').val());
                    validateEmailForm($('.email').val());
                    validateSexForm($('input[name="sex"]:checked').val());
                    validateBirthdayForm($('.birthday').val());
                    validateFotoForm($('.foto').val());

                });
            });