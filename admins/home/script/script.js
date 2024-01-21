function showAlert(message) {
    alert(dateString() + '\n' + message);
}

function dateString() {
    var now = new Date();
    var hours = now.getHours().toString().padStart(2, '0');
    var minutes = now.getMinutes().toString().padStart(2, '0');
    var seconds = now.getSeconds().toString().padStart(2, '0');
    return hours + ':' + minutes + ':' + seconds;
}

function validateFormAndSubmit() {
    if (validateForm()) {
        document.getElementById('studentForm').submit();
    }
}

function validateForm() {
    var requiredFields = [
        'first_name', 'father_name', 'last_name', 'mother_name', 'birthday_date',
        'place_of_birth', 'nationality', 'gender', 'civil_number', 'phone_number2',
        'place_of_occupation', 'place_of_registration', 'governorate', 'judiciary',
        'university_id', 'university_year', 'major'
    ];

    for (var i = 0; i < requiredFields.length; i++) {
        var fieldName = requiredFields[i];
        var fieldValue = document.getElementById(fieldName).value.trim();

        if (fieldValue === '') {
            showAlert('Please enter your ' + fieldName.replace(/_/g, ' '));
            return false;
        }
    }

    // If all fields are filled, return true
    return true;
}
