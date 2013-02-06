$(document).ready(function() {
    $('#project-show-modal').on('hidden', function() {
        $(this).data('modal').$element.removeData();
    });
});