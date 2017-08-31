$(document).ready(function () {
    $("#taskForm-image").change(function(){
        readURL(this);
    });

    $("#taskForm-username").change(function () {
        var usernameContainer = $("#task-username-preview");
        usernameContainer.text($(this).val());
    });

    $("#taskForm-email").change(function () {
        var emailContainer = $("#task-email-preview");
        emailContainer.text($(this).val());
    });

    $("#taskForm-task").change(function () {
        var taskContainer = $("#task-task-preview");
        taskContainer.text($(this).val());
    });

    $("#toggle-task-preview").click(function (e) {
        e.preventDefault();
        $("#task-preview-container").toggle();

        var button = $(this);
        if (button.text() === 'Предпросмотр') {
            button.text('Скрыть');
        } else {
            button.text('Предпросмотр');
        }

        console.log($(this).text());
    });
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#task-image-preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
