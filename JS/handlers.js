function handleAdminSelection() {
    var insertionTracker = document.getElementById("insertionTracker");
    insertionTracker.value = '0';
    var fields = document.getElementsByClassName('field');
    for (var i = 0; i < fields.length; i++) {
        fields[i].value = ''
    }
    var form = document.getElementById('insertionForm');
    form.submit();
}

function handleAdminInsertion() {
    var insertionTracker = document.getElementById("insertionTracker");
    insertionTracker.value = '1';
    var insertionForm = document.getElementById('insertionForm');
    insertionForm.submit();
}

function handleSelection() {
    var form = document.getElementById('headerSelectionForm');
    console.log(form);
    form.submit();
}