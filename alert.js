/**
 * Created by Delia on 09.06.2016.
 */
document.getElementById('login').addEventListener('submit',

    function (event) {

        var kasutajanimi = document.getElementById('username-id').value;
        var parool = (document.getElementById('password-id').value);

        // kontrollime väärtuseid
        if (kasutajanimi == '' || parool == '') {
            alert('Vigased väärtused!');
            // Katkestame tavalise submit tegevuse, vastasel korral navigeeriks brauser mujale
            event.preventDefault();
            return;
        }
    });