function handleAdminSelection() {
    var insertionTracker = document.getElementById("insertionTracker");
    console.log(insertionTracker);
    console.log(insertionTracker.value);
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
    console.log(insertionTracker);
    console.log(insertionTracker.value);
    insertionTracker.value = '1';
    var insertionForm = document.getElementById('insertionForm');
    console.log(insertionForm.name);
    insertionForm.submit();
}