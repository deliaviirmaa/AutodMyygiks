/**
 * Created by Delia on 09.06.2016.
 */
document.getElementById('login').addEventListener('submit',

    function (event) {

        var kasutajanimi = document.getElementById('username-id').value;
        var parool = (document.getElementById('password-id').value);

        if (kasutajanimi == '' || parool == '') {
            alert('Täida kõik väljad!');
            event.preventDefault();
            return;
        }
    });
document.getElementById('registration').addEventListener('submit',

    function (event) {

        var kasutajanimi = document.getElementById('username-id').value;
        var isikukood = (document.getElementById('code-id').value);
        var parool1 = (document.getElementById('password-id').value);
        var parool2 = (document.getElementById('password2-id').value);

        if (kasutajanimi == '' || isikukood == '' || parool1 == '' || parool2 == '') {
            alert('Täida kõik väljad!');
            event.preventDefault();
            return;
        }
    });